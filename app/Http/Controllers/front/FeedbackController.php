<?php

namespace App\Http\Controllers\front;

use App\Feedback;
use App\Notifications\OrderedSuccessfully;
use App\Order;
use App\Order_invoice;
use App\Product;
use App\User;
use App\User_cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use PDF;
class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $feed=Feedback::all();
        return view('admin.feedback',compact('feed'));

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
//        dd('hyy');
        Feedback::create([
            'user_id'=>$request->uid,
//            'shop_id'=>$request->shop_id,
            'rating'=>$request->rating,

        ]);

        return redirect()->route('front_home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {

//        dd($uid);
        $user=User::where('id',$uid)->first();
        Notification::send($user,new OrderedSuccessfully());
        return view('front.feedback',compact('uid'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        $order=Order::where('user_id',$uid)->latest()->first();
        $orderinc=Order_invoice::where('order_id',$order->id)->first();
        $usercart=User_cart::where('user_id',$uid)->where('order_id',$order->id)->withTrashed()->get();

        $pdf = PDF::loadView('front.pdfview',compact('orderinc','usercart'));
        return $pdf->download('pdfview.pdf');



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
        //
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
