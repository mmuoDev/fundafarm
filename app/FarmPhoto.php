<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FarmPhoto extends Model
{
    //
    public $table = 'farm_photos';

    protected $fillable = [
        'farm_id',
        'link'
    ];
}
