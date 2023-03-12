<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;

class QuotesController extends Controller
{
    public function quotes(Request $request)
    {
        $quotes = Quote::orderBy('id', 'desc')->get();
        return view('admin.pages.quotes', ['quotes'=>$quotes]);
    }
}
