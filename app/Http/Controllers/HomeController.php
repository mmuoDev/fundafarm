<?php

namespace App\Http\Controllers;

use App\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if($method){
            //Process the form
        }else{
            return view('dashboard.invest_farm', compact('farms'));
        }
    }
}
