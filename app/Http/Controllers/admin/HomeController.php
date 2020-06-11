<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Order;
use App\Order_invoice;
use App\Product;
use App\ProductPrice;
use App\Shop;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin=Admin::find(1);
        return view('admin.admin-profile',compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd(1);
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|max:191',
            'password'=> 'required',
            'phone'=> 'required|max:13',
        ]);
        try{
            $admin=Admin::find($id);
            $admin->name=$request->name;
            $admin->email=$request->email;
            $admin->phone=$request->phone;
            $admin->password=$request->password;
            $admin->save();
            return view('admin.admin-profile',compact('admin'));

        }
        catch (Exception $e){
            return view('admin.admin-profile',compact('admin'))->with('flash_error', trans('form.whoops'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

