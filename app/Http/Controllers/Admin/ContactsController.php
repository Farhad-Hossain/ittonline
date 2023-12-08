<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    public function contacts(Request $request)
    {
        $contacts = Contact::orderBy('id','desc')->get();

        return view('admin.pages.contacts', ['contacts'=>$contacts]);
    }
}
