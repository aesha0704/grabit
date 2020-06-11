<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable=['id','user_id','rating'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
