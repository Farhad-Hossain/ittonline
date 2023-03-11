<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function services(Request $request)
    {
        dd($request->all());
    }

    public function addService(Request $request)
    {
        dd($request->all());
    }
}
