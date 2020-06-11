<?php

namespace App\Http\Controllers\shop;

use App\Category;
use App\CategoryImage;
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
        $Category = Category::with('images','products')->get();
        return view('shop.categories.categories',compact('Category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.categories.add_category');

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
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'required|max:1000',
            'status' => 'required|in:enabled,disabled',
            'shop_id' => 'required'
        ]);

        try {
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

            $Category = Category::create($Category);
            if($request->hasFile('image')){
                CategoryImage::create([
                    'category_id' => $Category->id,
                    'url' => asset('storage/'.$request->image->store('categories')),
                    'position' => 0,
                ]);
            }


            return redirect()->route('categories.index')->with('flash_success', 'Category added!');

        } catch (Exception $e) {
            return redirect()->route('categories.index')->with('flash_error', trans('form.whoops'));
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
        $category=Category::find($id);
        return view('shop.categories.edit_category',compact('category','id'));
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
        $data=$request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'required|max:1000',
            'status' => 'required|in:enabled,disabled',
            'shop_id' => 'required'
        ]);
        $category->update($data);
        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('categories.index');
    }
}
