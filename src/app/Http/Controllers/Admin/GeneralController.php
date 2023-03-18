<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Contact;
use App\Models\Course;

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
}
