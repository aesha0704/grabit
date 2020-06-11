<?php

namespace App;

//use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Shop extends Authenticatable
{

    use Notifiable,SoftDeletes;

    protected $guard = 'shop';

    protected $fillable=[
        'shop_unique_id',
        'name',
        'email',
        'password',
        'phone',
        'country_code',
        'avatar',
        'photo',
        'default_banner',
        'description',
        'offer_min_amount',
        'offer_percent',
        'commission',
        'commission_type',
        'estimated_delivery_time',
        'otp',
        'address',
        'maps_address',
        'latitude',
        'longitude',
        'pure_veg',
        'status',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function shoptiming()
    {
        return $this->hasOne('App\Shop_timing');
    }
    public function products()
    {
        return $this->hasMany('App\Product');
    }
    public function category()
    {
        return $this->hasMany('App\Category');
    }
    public  function  cuisines()
    {
        return $this->belongsToMany('App\Cuisine');
    }
    public function parent()
    {
        return $this->hasOne('App\Shop', 'id', 'shop_id')->withTrashed();
    }
    public function order()
    {
        return $this->hasMany('App\Order');
    }

}
