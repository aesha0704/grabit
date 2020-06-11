<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Category = Category::with('products')->get();
       return view('admin.categories.categories',compact('Category'));
    }
       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }
    public function addcreate($id)
    {
        return view('admin.categories.add_category',compact('id'));
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
            'category_name' => 'required|string|max:255',
            'category_description' => 'required|max:1000',
            'shop_id' => 'required',

        ]);

        try {
            $Category= Category::create([
                'category_name'=>$request->category_name,
                'category_description'=>$request->category_description,
                'shop_id'=>$request->shop_id,
                'position'=>1,
            ]);
            $Category = $request->all();
            if($request->has('parent_id')){
                if($Category['parent_id'] != 0) {
                    $this->validate($request, [
                        'parent_id' => 'required|exists:categories.id',
                    ]);
                } else {
                    $Category['parent_id'] = 0;
                }
            }



            return redirect()->route('categories.show',$request->shop_id)->with('flash_success', 'Category added!');

        } catch (Exception $e) {
            return redirect()->route('categories.show',$request->shop_id)->with('flash_error', trans('form.whoops'));
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
        $Category = Category::with('products')->where('shop_id',$id)->get();

        if ($Category->isEmpty())
        {
            $sid=Shop::latest()->first();
            $id=$sid->id;
            return view('admin.categories.add_category',compact('id'));

        }
        return view('admin.categories.categories',compact('Category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('admin.categories.edit_category',compact('category'));
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

        $category=Category::find($id);

        $category->category_name=$request->get('name');
        $category->category_description=$request->get('description');
        $category->save();
        return redirect()->route('categories.show',$category->shop_id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = Category::with('products')->where('id',$id)->first();
        Category::destroy($id);

        return redirect()->route('categories.show',$Category->shop_id);
    }

}
