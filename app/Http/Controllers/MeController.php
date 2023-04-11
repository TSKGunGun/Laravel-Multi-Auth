<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeController extends Controller
{
    public function me(Request $request)
    {
        return auth()->guard('member')->user();
    }
}