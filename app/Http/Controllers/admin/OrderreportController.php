<?php

namespace App\Http\Controllers\admin;

use App\Order;
use App\Report;
use App\Shop;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use PDF;

class OrderreportController extends Controller
{
    public $searchorder;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $res = $request->restaurant;
        $start = $request->startdate;
        $end = $request->enddate;
//            dd($res,$start,$end);
        $status='ORDERED';
        $request->session()->put('res',$res);
        $request->session()->put('start',$start);
        $request->session()->put('end',$end);

        $order = Order::with('cart', 'invoice', 'user_address', 'shop', 'user')->where('status',$status)
            ->where('shop_id', $res)->whereBetween('created_at', [$start, $end])->get();
//        $searchorder=$order;
//        dd($searchorder);
        return view('admin.transporter.transporter_delivery',compact('order'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transporter.transporter_delivery');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $res = $request->restaurant;
//        $start = $request->startdate;
//        $end = $request->enddate;
////            dd($res,$start,$end);
//        $status='ORDERED';
//
//        $order = Order::with('cart', 'order_time', 'invoice', 'user_address', 'shop', 'user')->where('status',$status)
//            ->where('shop_id', $res)->whereBetween('created_at', [$start, $end])->get();
//        dd($order);
////        return view('admin.transporter.transporter_delivery',compact('order'));

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
    public function rep(Request $request)
    {
        $data = $request->session()->all();
        $res=$data['res'];
        $start=$data['start'];
        $end=$data['end'];


        $status='ORDERED';


        $order = Order::with('cart', 'invoice', 'user_address', 'shop', 'user')->where('status',$status)
            ->where('shop_id', $res)->whereBetween('created_at', [$start, $end])->get();
        $pdf = PDF::loadView('admin.transporter.report',compact('order'));
        return $pdf->download('pdfview.pdf');

    }
}
