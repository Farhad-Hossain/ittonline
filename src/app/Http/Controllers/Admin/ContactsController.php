<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function contacts(Request $request)
    {
        dd( $request->all() );
    }
}
