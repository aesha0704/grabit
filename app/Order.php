<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'order_invoice_id',
        'user_id',
        'user_address_id',
        'shop_id',
         'status',

    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
    public function user_address()
    {
        return $this->belongsTo('App\User_address');
    }
    public function invoice()
    {
        return $this->hasOne('App\Order_invoice');
    }

    public function cart()
    {
        return $this->hasMany('App\User_cart');
    }
}
