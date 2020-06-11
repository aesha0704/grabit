<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    protected $table = 'event_registration';


    protected $fillable = ['name','mobile_no','address','status','fee','order_id','transaction_id','order_invoice_id'];

    public function Order_invoice()
    {
        return $this->belongsTo('App\Order_invoice');
    }
}
