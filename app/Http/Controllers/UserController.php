<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function verify(Request $request, $email, $token){

        $user = User::where('email',$email)->first();
        if(empty($user)){
            return view('verify')->withErrors( "User not found");
        }
        if($user->confirmed == 1){
            //implies user is already confirmed
            return view('verify')->withErrors( "User already confirmed");
        }
        $user->confirmed = 1;
        $user->save();

        return redirect()->to('/home');


    }

}
