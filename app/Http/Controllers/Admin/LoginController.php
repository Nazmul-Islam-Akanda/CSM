<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function loginpage(){
        return view('admin.login.login');
    }


    public function doLogin(Request $request){
        // dd($request->all());
        $userInfo=$request->except('_token');
// dd($userInfo);
// dd(Auth::attempt($userInfo));
        if(Auth::attempt($userInfo)){

            Toastr::success(' Login successfully.');
            return redirect()->route('admin.dashboard');
        }

        else{
            Toastr::warning('Invalid credential.');
            return redirect()->back();
        }
        
    }


    public function logout(){
        Auth::logout();
        Toastr::success(' Logout Successful');
        return redirect()->route('login.page');
    }
}
