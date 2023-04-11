<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMeController extends Controller
{
    public function me(Request $request)
    {
        return auth()->guard('admin')->user();
    }
}