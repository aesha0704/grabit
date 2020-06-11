<?php

namespace App\Http\Controllers\front;

use App\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->input('sn'))
        {
            $sn=$request->input('sn');
            $Shops=Shop::with('shoptiming','cuisines','category','products');
            $Shops= $Shops->whereHas('cuisines',function($query) use ($request){
                $query->where('cuisines.name', $request->sn);
            })->orWhere('pure_veg', 'LIKE', $sn . '%')
                ->orWhere('name', 'LIKE', '%' . $sn . '%')->get();
//            $Shops=Shop::with('shoptiming','cuisines','category','products')->SearchName($sn)->get();



            return view('front.homepage',compact('Shops','sn'));
        }
        else
        {
            $Shops=Shop::with('shoptiming','cuisines','category','products')->get();
            return view('front.homepage',compact('Shops'));
        }
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
        $userid=0;
        $shop=Shop::with('shoptiming','cuisines','category','products')->where('id',$id)->first();
        return view('front.try',compact('shop','id','userid'));
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
    public function sort(Request $request)
    {
        $Shops=Shop::with('shoptiming','cuisines','category','products')->orderBy('offer_min_amount')->get();
        return view('front.homepage',compact('Shops'));
    }
    public function delivery(Request $request)
    {
        $Shops=Shop::with('shoptiming','cuisines','category','products')->orderBy('estimated_delivery_time')->get();
        return view('front.homepage',compact('Shops'));
    }
    public function recently(Request $request)
    {
        $Shops=Shop::with('shoptiming','cuisines','category','products')->orderBy('created_at','desc')->get();
        return view('front.homepage',compact('Shops'));
    }
}
