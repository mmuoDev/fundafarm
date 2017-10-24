<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function index(){
        //Fetch all farms
        $items = DB::select("select a.produce as produce, a.cost as cost, a.returns as returns, a.duration as duration,
        b.link as link from farms as a, farm_photos as b where a.id = b.farm_id");
        return view('welcome', compact('items'));
    }
}
