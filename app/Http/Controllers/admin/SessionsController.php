<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{

    public function login_page() {

        return view('admin.login');

    }

    public function login(Request $request){

        $data = $request->only(['email', 'password']);

        if(Auth::attempt($data)){

            return redirect(url('/admin/home'));

        }else {

            session()->flash('wrong_data', 'عفواً قم بالتحقق من بيانات تسجيل الدخول الخاصه بك');

            return redirect()->back();
        }

    }

    public function logout() {

        Auth::logout();

        return redirect(url('/admin'));

    }

}
