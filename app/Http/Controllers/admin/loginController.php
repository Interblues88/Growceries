<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Backtrace\Arguments\ReducedArgument\ReducedArgument;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class loginController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    // authnticate admin user
    public function authenticate(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
            if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                if(Auth::guard('admin')->user()->utype != 'admin'){
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error', 'You are not authorized to access this page.');
                }
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('admin.login')->with('error', 'either email or password incorect.');
            }

        }else{
            return redirect()->route('admin.login')->withInput()->withErrors($validator);
        }
    }


    public function logout(){
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

}
