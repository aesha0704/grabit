<?php

namespace App\Http\Controllers\front;

use App\Notifications\OrderedSuccessfully;
use App\Order;
use App\Order_invoice;
use App\User;
use App\User_address;
use App\User_cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status='ORDERED';
        $order=Order::with('cart','invoice','user_address','shop','user')->where('status',$status)->get();
//dd($order[0]->invoice->quantity);

        return view('admin.order.order',compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user=User_address::where('user_id',$request->user_id)->get();
        $user_addid=$user[0]->id;
        Order::create([
            'order_invoice_id'=>0 ,
            'user_id'=>$request->user_id,
            'user_address_id'=>$user_addid,
            'shop_id'=>$request->shop_id,
        ]);

        $order=Order::with('cart','invoice','user_address','shop','user')
            ->where('user_id',$request->user_id)->latest()->first();
        $orderid=$order->id;
        User_cart::with('users','products','orders')
            ->where('user_id',$request->user_id)
            ->update(['order_id'=>$orderid]);

        Order_invoice::create([
            'order_id'=>$orderid,
            'quantity'=>$request->quantity,
            'total_pay'=>$request->total_pay,
        ]);
        $invoice=Order_invoice::with('order')
            ->where('order_id',$orderid)->latest()->first();
        $invoiceid=$invoice->id;
        Order::with('cart','invoice','user_address','shop','user')
            ->where('id',$orderid)->update(['order_invoice_id'=>$invoiceid]);

//        \Illuminate\Support\Facades\Notification::send($us,new OrderPlaced());
        $userid=User::find($user);
//        Notification::send($userid,new OrderedSuccessfully());

        User_cart::with('users','products','orders')
            ->where('user_id',$request->user_id)
            ->delete();
        $datau=$request->user_id;
        $datas=$request->shop_id;
        $oid=Order::where('user_id',$datau)->latest()->first();
        $oic=Order_invoice::where('order_id',$oid->id)->first();
        $oprice=$oic->total_pay;
        $oi=$oid->id;
        $oidc=$oic->id;


//        dd($oic->total_pay);
//        return Redirect::to('event-registration',compact('datau'));
        return view('register',compact('oprice','oidc','datau'));


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
