<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuisine_shop extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'cuisine_id',
        'shop_id'
    ];
}
