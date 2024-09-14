<?php

namespace App\Http\Controllers\courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    public function index()
    {
        return view('courier.login');
    }

    public function authenticate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
            if (Auth::guard('courier')->attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::guard('courier')->user()->utype != 'courier') {
                    Auth::guard('courier')->logout();
                    return redirect()->route('courier.login')->with('error', 'You are not authorized to access this page.');
                }
                return redirect()->route('courier.home');
            } else {
                return redirect()->route('courier.login')->with('error', 'either email or password incorect.');
            }
        } else {
            return redirect()->route('courier.login')->withInput()->withErrors($validator);
        }
    }

    public function logout(){
        Auth::guard('courier')->logout();

        return redirect()->route('courier.login');
    }
}
