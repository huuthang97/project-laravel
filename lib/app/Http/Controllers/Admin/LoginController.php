<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Auth;
class LoginController extends Controller
{
    public function getLogin(){
        return view('backend.login');
    }

    public function postLogin(LoginRequest $request){
        if($request->remember = 'Remember Me'){
            $remember = true;
        }else{
            $remember = false;
        }
        $arr = ['email' => $request->email, 'password' => $request->password];
        if(Auth::attempt($arr, $remember)){
            return redirect('admin/home');
        }else{
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không hợp lệ');
        }
    }
}
