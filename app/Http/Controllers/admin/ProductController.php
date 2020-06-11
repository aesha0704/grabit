<?php

namespace App\Http\Controllers\admin;

use App\Product;
use App\Product_image;
use App\ProductPrice;
use App\Shop;
use Faker\Provider\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Product = Product::with('images','categories','prices')->get();
//        dd($Product);
        return view('admin.products.products',compact('Product'));

    }

    /**++++++++++++++++++++++++
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function addcreate($id)
    {
        return view('admin.products.add_products',compact('id'));
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
            'url' => 'required',
            'food_type' => 'required',
            'price' => 'required',
            //'position' => 'required'
        ]);
        try {


            if($request->has('discount')) {

                if($request->discount_type=='percentage'){
                    $orignal_price = $request->price-($request->price*($request->discount/100));
                }else{
                    $orignal_price = $request->price-$request->discount;
                }

            }else{
                $orignal_price = $request->price;
            }

            $Product = Product::create([
                'shop_id' => $request->shop_id,
                'name' => $request->name,
                'description' => $request->description,
                'featured' => $request->featured?$request->featured_position:0,
                'food_type' => $request->food_type,
                'parent_id'=>$request->parent_id,
            ]);

            $Product->categories()->attach($request->parent_id);
            $productImage=new Product_image();
            $productImage->product_id=$Product->id;
            $productImage->position=0;
            if($request->hasFile('url'))
            {
                $file=$request->file('url');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('uploads/product',$filename);
                $productImage->url=$filename;
            }
            $productImage->save();

//            foreach($request->image as $key =>$img){
////                dd($finename);
//
//                Product_image::create([
//                    'product_id' => $Product->id,
//                    'url' =>$img->store('storage/app/public/products'),
////                'url'=>$request->url->store('products','public'),
//                    'position' => 0,
//                ]);
           // }




            ProductPrice::create([
                'product_id' => $Product->id,
                'price' => $request->price,
                'currency' => 0,

                'discount' => $request->discount,
                'discount_type' => $request->discount_type,
                'orignal_price' => $orignal_price
            ]);

            return redirect()->route('product.show',$request->shop_id)->with('success', 'Product added!');
        } catch (Exception $e) {
            return back()->with('flash_error', trans('form.whoops'));
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
        $Product = Product::with('images','categories','prices')->where('shop_id',$id)->get();
        if ($Product->isEmpty())
        {
            $sid=Shop::latest()->first();
            $id=$sid->id;
            return view('admin.products.add_products',compact('id'));

        }
        return view('admin.products.products',compact('Product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $Products = Product::find($id);
        return view('admin.products.edit_products',compact('Products'));
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
        $data=$request->validate([
            'name' => 'required|string|max:255',
//            'url' => 'required',
            'food_type' => 'required',
            'price' => 'required',
        ]);

        $Product=Product::where('id',$id)->first();
        $product_price=ProductPrice::where('product_id',$id)->first();
        $product_image=Product_image::where('product_id',$id)->first();
//dd($product_image);

        $Product->name = $request->get('name');
        $Product->description = $request->get('description');
//        $Product->position= $request->get('position');
        $Product->status= $request->get('status');
        $Product->food_type= $request->get('food_type');
//        $Product->parent_id= $request->get('parent_id');
//        $Product->categories()->attach($request->parent_id);


        $product_price->price=$request->get('price');
        $product_price->discount=$request->get('discount');
        $product_price->discount_type=$request->get('discount_type');

        if($request->has('discount')) {

            if($request->discount_type=='percentage'){
                $orignal_price = $request->price-($request->price*($request->discount/100));
            }else{
                $orignal_price = $request->price-$request->discount;
            }

        }else{
            $orignal_price = $request->price;
        }
        $product_price->orignal_price=$orignal_price;



        if ($request->hasFile('url'))
        {
            $file=$request->file('url');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/product',$filename);
            $product_image->url=$filename;
        }

       $Product->save();
        $product_price->save();
        $product_image->save();





        return redirect()->route('product.show',$Product->shop_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Product = Product::with('images','categories','prices')->where('id',$id)->first();

        $product=Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.show',$Product->shop_id);
    }
}
