<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::guard('admin')->attempt($request->only('email', 'password'))) {

            if( auth()->guard('admin')->user()->user_type === 0 ) {
                auth()->logout();
                return ['message'=>'管理者ユーザーでログインしてください'];
            }

            $request->session()->regenerate();
            return ['message'=>'ログインしました'];
        }

        return ['message'=>'ログインに失敗しました。'];
    }
}
