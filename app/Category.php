<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'shop_id',
        'category_name',
        'category_description',
        'position',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];


    /**
     * Category Images
     */


    /**
     * Category Images
     */

    /**
     * Products belonging to the category
     */
    public function products()
    {

        return $this->belongsToMany('App\Product')->where('status','enabled');
    }

}
