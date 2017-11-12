<?php

namespace App\Http\Controllers;

use App\Farm;
use App\FarmInvest;
use App\FarmProgress;
use App\Libraries\Utilities;
use App\Notifications\NotifyInvestFarm;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function markAsRead($nofity_id)
    {
        //auth()->user()->unreadNotifications->markAsRead();
        //$res = auth()->user()->unreadNotifications->markEachNotificationAsRead('545abba8-4f66-4c29-ba68-b4956ef9f500');
        auth()->user()->unreadNotifications->map(function ($n) use ($nofity_id) {
            if ($n->id == $nofity_id) {
                $n->markAsRead();
            }
        });
    }
    //Fetch available farms
    public function available_farms(){
        $items = DB::select("select a.id as produce_id, a.produce as produce, a.cost as cost, 
        a.returns as returns, a.duration as duration,
        b.link as link from farms as a, farm_photos as b where a.id = b.farm_id");
        return view('dashboard.available_farms', compact('items'));
    }

    //Invest in farms
    public function invest_farm(Request $request){
        //Fetch available farms
        $farms = Farm::all();
        $method = $request->isMethod('post');
        $confirmed = Auth::user()->confirmed;
        if($method){
            //Process the form and show page to confirm details + make payment
            if($confirmed == 0){ //Please confirm your email address
                return back()->withErrors('Please confirm your email address')->withInput();
            }else {
                $validator = Validator::make($request->all(), [
                    'farm_id' => 'required',
                    'quantity' => 'required|integer'
                ], [
                    'farm_id.required' => 'Please select a farm',
                    'quantity.required' => 'Please specify the quantity'
                ]);
                if($request->quantity == 0){
                    return back()->withErrors('Enter a valid number')->withInput();
                }
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                //Insert into farm-invest table
                $user_id = Auth::user()->id;
                $farm_id = $request->farm_id;
                $quantity = $request->quantity;
                $status = 1; //Pending
                $payRef = Utilities::generatePayRef();

                $create = FarmInvest::create([
                    'user_id' => $user_id,
                    'farm_id' => $farm_id,
                    'quantity' => $quantity,
                    'status' => $status,
                    'payRef' => $payRef
                ]);
                //Once created, show details for confirmation
                if ($create) {
                    $invest_id = $create->id;
                    $farms = Farm::find($farm_id); //fetch details for the selected farm
                    $details = FarmInvest::find($invest_id); //fetch details for selected farm to be invested.
                    return view('dashboard.invest_farm_confirm', compact('farms', 'details'));
                }
            }

        }else{
            return view('dashboard.invest_farm', compact('farms'));
        }
    }

    public function farm_payment(Request $request){

        //Make a call to paystack to confirm payment
        $payRef = $request->payRef;
        $cost = $request->amount;
        $secret_key = env('PAY_STACK_TEST_SECRET_KEY');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$payRef,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . $secret_key,
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $new_response =  json_decode($response, true);
        $status = $new_response['status'];
        $code = $new_response['data']['status'];

        if ($err) {
            //Update status column
            //Show error message - use panel
            //Update status to 'issues with payment'
            DB::table('farm_invest')->where('payRef', $payRef)->update(['status' => 2]);
            return view('dashboard.invest_farm_finish')->with('message', 'Sorry, there was an issue processing your payment.
            Please contact us');


        }else if($status == true){
            //Update status column
            //Show success message
            //Send notification
            //Send SMS (optional)
            //Send email
            if($code == 'success'){
                //Transaction was successful
                //$details = FarmInvest::find($payRef)->first();
                $details = FarmInvest::where('payRef', '=', $payRef)->first();
                $user_id = $details->user_id;
                $farm_id = $details->farm_id;
                $farm = Farm::where('id', $farm_id)->first();
                $produce = $farm->produce;
                $user = User::where('id', $user_id)->first();
                $email = $user->email;
                $name = $user->name;
                //Update status to payment made and farm started
                DB::table('farm_invest')->where('payRef', $payRef)->update(['status' => 3]);
                //Send a mail to confirm payment and farm started
                Mail::send('email.farm_invest', ['email' => $email, 'name' => $name, 'produce' => $produce,
                    'cost' => $cost], function ($message) use ($email, $produce) {
                    $message->to($email);
                    $message->from('farms@fundafarm.ng', 'Fundafarm.NG Team');
                    $message->subject('Your '. $produce. ' farm has started!');
                });

                //Send notification to inform user farm has started.
                Notification::send($user, new NotifyInvestFarm($produce));

                //Insert into farm progress table
                //Check if farm is already started, else start
                return view('dashboard.invest_farm_finish')->with('message', 'Congratulations! Your payment went 
                through and your farm has started. Follow your farm from your dashboard');

            }else{
                //Transaction was unsuccessful
                return view('dashboard.invest_farm_finish')->with('message', 'Sorry! Your payment failed');
            }
        }else{
            //Something went wrong, please contact us.
        }

    }
    public function my_farms(){
        //Fetch farms invested on by this user
        $user_id = Auth::user()->id;
        $farms = DB::select("select a.produce as produce, b.quantity as quantity,  a.start_date as start_date, b.farm_id as farm_id, c.link as link from
        farms as a, farm_invest as b, farm_photos as c where a.id = c.farm_id and  a.id = b.farm_id and b.user_id = $user_id and b.status = 3");

        return view('dashboard.my_farms',  compact('farms'));
    }
}
