<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function index(){
        //Fetch all farms
        $items = DB::select("select a.id as produce_id, a.produce as produce, a.cost as cost, a.returns as returns, a.duration as duration,
        b.link as link from farms as a, farm_photos as b where a.id = b.farm_id");
        return view('welcome', compact('items'));
    }

    public function farm_details($id){
        $items = DB::select("select a.id as produce_id, a.produce as produce, a.cost as cost, a.returns as returns, a.duration as duration,
        b.link as link from farms as a, farm_photos as b where a.id = b.farm_id and a.id = '$id'");

        //Fetch other similar farms aside the present farm
        $details = DB::select("select a.id as produce_id, a.produce as produce, a.cost as cost, a.returns as returns, a.duration as duration,
        b.link as link from farms as a, farm_photos as b where a.id = b.farm_id and a.id != '$id'");
        return view('farm_details', compact('items', 'details'));
    }
}
