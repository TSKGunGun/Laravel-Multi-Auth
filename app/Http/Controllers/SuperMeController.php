<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperMeController extends Controller
{
    public function me(Request $request)
    {
        return auth()->guard('super_user')->user();
    }
}