<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::guard('member')->attempt($request->only('email', 'password'))) {

            if( auth()->guard('member')->user()->user_type !== 0 ) {
                auth()->logout();
                return ['message'=>'一般ユーザーでログインしてください'];
            }

            $request->session()->regenerate();
            return ['message'=>'ログインしました'];
        }

        return ['message'=>'ログインに失敗しました。'];
    }
}
