<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    //
    public $table = 'farms';

    protected $fillable = [
      'produce',
      'cost',
      'returns',
        'duration',
      'deadline'
    ];
}
