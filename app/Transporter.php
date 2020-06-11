<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transporter extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'email','phone','password','avatar','address','area','subarea','latitude','longitude','otp','rating','status','remember_token'
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
    public function transporter_shifts()
    {
        return $this->hasOne('App\Transporter_shift');
    }
    public function transporter_vehicles()
    {
        return $this->hasMany('App\Transporter_vehicle');
    }

}
