<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stuff;
use Auth;

class StuffController extends Controller
{
    public function stuffs(Request $request)
    {
        $stuffs = Stuff::where('is_active', 1)->get();
        return view('admin.pages.stuffs', ['stuffs'=>$stuffs]);
    }

    public function addStuff(Request $request)
    {
        $stuff = new Stuff();
        $stuff->full_name = $request->name;
        $stuff->designation = $request->designation;
        $stuff->email = $request->email ?? '';
        $stuff->mobile_number = $request->mobile_no ?? '';
        $stuff->twitter = $request->twitter ?? '';
        $stuff->facebook = $request->facebook ?? '';
        $stuff->instagram = $request->instagram ?? '';
        $stuff->linkedin = $request->linkedin ?? '';
        $stuff->is_active = 1;
        $stuff->created_by = Auth::user()->id;
        $stuff->ip_address = $request->ip();
        if ( !$request->photo ) return redirect()->back()->with('danger', 'Stuff photo Required');
        $fileName = time().$request->photo->extension();
        $request->photo->move(public_path('images'), $fileName);
        $photoPath = 'images/'.$fileName;
        $stuff->photo = $photoPath;

        $stuff->save();
        return redirect()->back()->with('success', 'Stuff created successfully');
    }
}
