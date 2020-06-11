<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShopLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:shop');
    }

    public function showLoginForm()
    {
        return view('auth.shop-login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('shop')->attempt(['email' => $request->email ,'password' => $request->password], $request->remember))
        {
            return redirect()->intended(route('shop.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));

    }

    public function logout()
    {
//       dd('ho');
        Auth::guard('shop')->logout();
   return redirect('/shop/login');
    }
}
