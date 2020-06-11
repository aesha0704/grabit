<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User=User::all();
        return view('admin.user.user',compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add_user');
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
            'email' => 'required|max:1000',
            'password' => 'required|min:8',
            'confirm_password' => 'required_with:password|same:password|min:8',
            'phone' => 'required',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $user = $request->all();
//            if($request->has('parent_id')){
//                if($user['parent_id'] != 0) {
//                    $this->validate($request, [
//                        'parent_id' => 'required|exists:$transporter,id',
//                    ]);
//                } else {
//                    $user['parent_id'] = 0;
//                }
//            }


            $user =User::create($user);



            return redirect()->route('users.index')->with('flash_success', 'User added!');

        }catch (Exception $e) {
            return redirect()->route('users.index')->with('flash_error', trans('form.whoops'));
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
        $user=User::find($id);
        return view('admin.user.edit_user',compact('user','id'));
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
        $user=User::find($id);
        $data=$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|max:1000',
            'password' => 'required|min:8',
            'confirm_password' => 'required_with:password|same:password|min:8',
            'phone' => 'required',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user->update($data);
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users.index')->with('flash_success', 'User deleted!');

    }
}
