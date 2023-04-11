<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperLoginController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::guard('super_user')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            return ['message'=>'ログインしました'];
        }

        return ['message'=>'ログインに失敗しました。'];
    }
}