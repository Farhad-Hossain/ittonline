<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Contact;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;
use Auth;

class GeneralController extends Controller
{
    public function dashboard(Request $request)
    {
        $totalQuotes = Quote::orderBy('id', 'desc')->count();
        $totalContacts = Contact::orderBy('id', 'desc')->count();   
        $totalCourses = Course::orderBy('id', 'desc')->count();
        $totalTrainers = Course::orderBy('id', 'desc')->count();
        return view('admin/dashboard', ['totalQuotes'=>$totalQuotes, 
                                        'totalContacts'=>$totalContacts,
                                        'totalCourses'=>$totalCourses,
                                        'totalTrainers'=>$totalTrainers,
                                       ]);
    }

    public function profile(Request $request)
    {
        if ( $request->method() == 'POST' ) {
            $user = Auth::user();
            $user->name = $request->name;
            $user->save();
            return redirect()->back()->with('success', 'Data updated successfully.');
        }
        return view('admin.pages.profile');
    }

    public function changePassword(Request $request)
    {
        $currentPassword = $request->current_password;
        $hashOfCurrentPassword = Hash::make($currentPassword);

        $user = Auth::user();
        if ( !Hash::check($currentPassword, Auth::user()->password )) {
            return redirect()->back()->with('danger', "Current password doesn't matched");
        } else {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'Password changed successfully');
        }
    }
}
