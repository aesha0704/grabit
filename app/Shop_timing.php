<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop_timing extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'shop_id',
        'start_time',
        'end_time',
        'day'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
