<?php

namespace App\Http\Controllers\front;

use App\Order;
use App\Product;
use App\Shop;
use App\User_address;
use App\User_cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Null_;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd('hi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User_cart::whereNull('user_id')->update(['user_id'=>$request->user_id]);
//        dd($request->user_id);
        $shop=Shop::where('id',$request->shop_id)->get();
       $cart=User_cart::with('users','products','orders')->where('user_id',$request->user_id)->get();
//dd($cart);
        return view('front.payment',compact('shop','cart'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop=Shop::with('shoptiming','cuisines','category','products')->where('id',$id)->get();
        $cart=User_cart::with('users','products','orders')->get();

        return view('front.checkout',compact('shop','cart'));
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
        User_address::create([
            'user_id'=> $id,
            'building'=> $request->get('building'),
            'street'=> $request->get('street'),
            'city'=> $request->get('city'),
            'pincode' => $request->get('pincode'),
            'state' => 'gujarat',
            'country' => 'India',

        ]);

        $shopid=$request->shop_id;
//        dd($shopid);

        User_cart::whereNull('user_id')->update(['user_id'=>$id]);

        $shop=Shop::where('id',$shopid)->get();
//        dd($shop);
        $cart=User_cart::with('users','products','orders')->where('user_id',$id)->get();

        return view('front.payment',compact('shop','cart'));
//        dd($cart);

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
