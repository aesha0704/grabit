<?php

namespace App\Http\Controllers\admin;

use App\Shop;
use App\Shop_timing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $Shops=Shop::with('shoptiming','cuisines','category','products')->get();
//        dd($Shops);
        return view('admin.shop.view_shop',compact('Shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shop.add_shop');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'name' => 'required|string|max:255',
            'password' => 'required|min:8',
//            'confirm_password' => 'required_with:password|same:password|min:8',
            'phone'=> 'required|max:13',
            'address'=> 'required',
            'status' => 'required|in:pending,active,inactive',
            'avatar'=>'required',
            'shop_unique_id'=>'required',


        ]);


        try {

            $file=$request->file('avatar');
            $filename=rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/shop/logo'),$filename);


            $file2=$request->file('photo');
            $filename2=time().'.'.$file2->getClientOriginalExtension();
            $file2->move(public_path('uploads/shop/shop_photo'),$filename2);
               $shop= Shop::create([
                    'name'=>$request->name,
                    'password' => $request->password,
                    'phone'=> $request->phone,
                   'email'=> $request->email,
                   'address'=> $request->address,
                    'status' => $request->status,
                    'commission_type'=>$request->commission_type,
                    'shop_unique_id'=>$request->shop_unique_id,
                    'maps_address'=>$request->maps_address,
                    'latitude'=>$request->latitude,
                    'longitude'=>$request->longitude,
                    'device_type'=>$request->device_type,
                    'avatar'=>$filename,
                   'photo'=>$filename2,
                   'description'=>$request->description,
                   'offer_min_amount'=>$request->offer_min_amount,
                   'offer_percent'=>$request->offer_percent,
                   'commission'=>$request->commission,
                   'estimated_delivery_time'=>$request->estimated_delivery_time,
                ]);

//            }
            $shop->cuisines()->attach($request->shop_unique_id);

//            $shop->cuisine()->attach($request->shop_id);
            //insert into cuisine_shop
            //$shop->cuisines()->attach($request->cuisine);

            //insert into shop_timing table
            Shop_timing::create([
                'shop_id' => $shop->id,
                'start_time'=>$request->start_time,
                'end_time'=>$request->end_time,
                'day'=>$request->day
            ]);

            return redirect()->route('shop.index')->with('flash_success', 'Shop added!');

        }
        catch (Exception $e)
        {
            return redirect()->route('shop.index')->with('flash_error', trans('form.whoops'));
        }
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

        $shop=Shop::find($id);
        return view('admin.shop.edit_shop',compact('shop'));

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
        $this->validate($request, [
            'name' => 'required|string|max:255',
//            'confirm_password' => 'required_with:password|same:password|min:8',
            'phone'=> 'required|max:13',
            'address'=> 'required',
            'status' => 'required|in:pending,active,inactive',
            'avatar'=>'required',
        ]);
        $shop=Shop::where('id',$id)->first();
        $shop_time=Shop_timing::where('shop_id',$id)->first();
        $shop->name=$request->get('name');
        $shop->email=$request->get('email');
        $shop->address=$request->get('address');
        $shop->status=$request->get('status');
//        $shop->maps_address=$request->get('maps_address');
        $shop->phone=$request->get('phone');
        $shop_time->day=$request->get('day');
        $shop_time->start_time=$request->get('start_time');
        $shop_time->end_time=$request->get('end_time');
        $shop->pure_veg=$request->get('pure_veg');
        $shop->offer_min_amount=$request->get('offer_min_amount');
        $shop->offer_percent=$request->get('offer_percent');
        $shop->commission=$request->get('commission');
        $shop->commission_type=$request->get('commission_type');
        $shop->estimated_delivery_time=$request->get('estimated_delivery_time');
        $shop->description=$request->get('description');

        if($request->file('avatar')!=null)
        {
            $file=$request->file('avatar');
            $filename=rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/shop/logo'),$filename);
            $shop->avatar=$filename;

        }
//        else{
//        }

        if ($request->file('photo')!=null)
        {

            $file2=$request->file('photo');
            $filename2=rand().'.'.$file2->getClientOriginalExtension();
            $file2->move(public_path('uploads/shop/shop_photo'),$filename2);
            $shop->photo=$filename2;

        }
//        else{}


        $shop->save();
        $shop_time->save();
        return redirect()->route('shop.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Shop::destroy($id);
//        $shop=Shop::findOrFail($id);
//        $shop->delete();
        return redirect()->route('shop.index');
        //->with('success','Shop deleted successfully');



    }





}
