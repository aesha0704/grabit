<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
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
        'name',
        'description',
        'food_type',
        'max_quantity',
        'out_of_stock',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at', 'parent_id', 'pivot'
    ];
    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    /*protected $with = [
        'images'
    ];
*/
    /**
     * Category Images
     */
    public function images()
    {
        return $this->hasMany('App\Product_Image')->where('position',0)->orderBy('position','DESC');
    }
    public function featured_images()
    {
        return $this->hasMany('App\Product_Image')->where('position',1)->orderBy('position','DESC');
    }

    /**
     * Parent product of a variant.
     */
    public function parent()
    {
        return $this->hasOne('App\Product', 'id', 'parent_id')->withTrashed();
    }

    /**
     * Parent product of a variant.
     */
    public function shop()
    {
        return $this->hasOne('App\Shop', 'id', 'shop_id')->withTrashed();
    }

    /**
     * Variants of the same products.
     */
    public function variants()
    {
        return $this->hasMany('App\Product', 'parent_id', 'id');
    }

    /**
     * Categories that the product belongs to.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    /**
     * Variants of the same products.
     */
    public function prices()
    {
        return $this->hasOne('App\ProductPrice');
    }

    /**
     * Get the list of all categories along with variants and images.
     */


    public function cart()
    {
        return $this->hasMany('App\User_Cart');
    }
    /**
     * Cuisines that the shop belongs to.
     */



    /**
     * Variants of the same products.
     *
     */
    public function productcuisines()
    {
        return $this->belongsTo('App\Cuisine', 'cuisine_id', 'id');
    }


}
