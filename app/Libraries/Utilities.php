<?php

namespace App\Libraries;

class Utilities{
    public static function generatePayRef(){
        $date = strtotime(date("d.m.y"));
        $reference = $date.mt_rand(10000000, 99000000);
        return $reference;
    }
}