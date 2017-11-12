<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FarmInvest extends Model
{
    //
    use SoftDeletes;

    public $table = 'farm_invest';

    protected $fillable = [
        'user_id',
        'farm_id',
        'quantity',
        'status',
        'payRef'
    ];
}
