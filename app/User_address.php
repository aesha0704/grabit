<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_address extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'building',
        'street',
        'city',
        'state',
        'country',
        'pincode',

   ];
    protected $hidden = [
        'created_at','updated_at', 'deleted_at',
    ];
}
