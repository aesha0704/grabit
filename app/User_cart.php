<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_cart extends Model
{
    use SoftDeletes;
    protected$fillable = [
        'user_id', 'product_id', 'promocode_id', 'order_id', 'quantity', 'note', 'savedforlater'

    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function users(){
        return $this->hasOne('App\User','id','user_id')->withTrashed();
    }

    public function products(){
        return $this->belongsTo('App\Product')->withTrashed();
    }

    public function orders()
    {
        return $this->hasOne('App\Order','id','order_id')->withTrashed();
    }

}
