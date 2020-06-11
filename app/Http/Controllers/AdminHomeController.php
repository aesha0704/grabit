<?php

namespace App\Http\Controllers;

use App\Order;
use App\Order_invoice;
use App\Product;
use App\ProductPrice;
use App\Shop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count1=Order::count();
        $price=Order_invoice::sum('total_pay');
        $main=Order::all()->groupBy('shop_id');
        $sid=Shop::count();
        $user=User::count();

        $find_shop=DB::table('orders')->select('shop_id',DB::raw('count(*) as total'))
            ->groupBy('shop_id')->limit(1)->orderBy('total','desc')->get();
        $find_product=DB::table('user_carts')->select('product_id',DB::raw('count(*) as total1'))
            ->groupBy('product_id')->limit(1)->orderBy('total1','desc')->first();
        $pid=$find_product->product_id;
        $pname=Product::where('id',$pid)->first();
        $best_product=$pname->name;
        foreach ($find_shop as $value)
        {
            $max_order=Shop::where('id',$value->shop_id)->first();
        }
        $shopname=$max_order->name;


        return view('admin.dashboard',compact('count1','price','sid','user','shopname','best_product'));
    }
}
