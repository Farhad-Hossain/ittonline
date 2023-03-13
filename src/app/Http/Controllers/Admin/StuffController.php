<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stuff;

class StuffController extends Controller
{
    public function stuffs(Request $request)
    {
        $stuffs = Stuff::all();
        return view('admin.pages.stuffs', ['stuffs'=>$stuffs]);
    }
}
