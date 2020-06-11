<?php

namespace App\Http\Controllers\front;

use App\User_cart;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddtocartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart=User_cart::with('users','products','orders')->get();
        if ($cart->isEmpty())
        {
            session()->flash("empty","No Iteams In Your Cart.");

            return view('front.addtocart',compact('cart'));
        }
        return view('front.addtocart',compact('cart'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  back();
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
//        if($id==0)
//        {
//            $cart=User_cart::where('user_id',0)->get();
//        }
//        else{
//            $cart=User_cart::with('users','products','orders')->where('user_id',$id)->get();
//        }
//       //dd($cart);
//        if($cart->isEmpty())
//        {
//           // dd('empty');
//            return view('front.addtocart',compact('cart'));
//        }
//        else{
//           // dd('notempty');
//            return view('front.addtocart',compact('cart'));
//        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        //dd($request->user_id);

        User_cart::create([

            'product_id'=> $id,
            'quantity'=>$request->quantity,
            'user_id'=>$request->user_id,
        ]);
        session()->flash("cart","Iteams Added In Your Cart.");

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cart=User_cart::findorFail($id);
        $cart->delete();
        session()->flash("success","Your Iteam is Removed successfully..!!");

        return redirect()->route('addtocart.index');
    }


}
