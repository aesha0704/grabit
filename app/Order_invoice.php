<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order_invoice extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'order_id',
        'quantity',
        'total_pay',
        'payment_mode',
        'paytm_payment_mode',
        'transaction_id',
        'status',
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function order(){
        return $this->hasOne('App\Order');
    }
    public function event_registration()
    {
        return $this->hasOne('App\EventRegistration');
    }
}
