<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppBasicInfo;
use App\Models\SliderImage;

class FrontendController extends Controller
{
    public function welcome(Request $req)
    {
        $sliders = SliderImage::all();
        return view('welcome', ['sliders'=>$sliders]);
    }

    public function about(Request $request) 
    {
        return view('pages.about');
    }

    public function courses (Request $request)
    {
        return view('pages.courses');
    }

    public function getQuote (Request $request)
    {
        return view('pages.quote');
    }

    public function contact(Request $request)
    {
        return view('pages.contact');
    }
}
