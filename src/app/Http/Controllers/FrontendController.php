<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppBasicInfo;
use App\Models\SliderImage;
use App\Models\PageContentAboutUs;
use App\Models\PageContentQuote;

class FrontendController extends Controller
{
    public function welcome(Request $req)
    {
        $sliders = SliderImage::all();
        $contentAbout = PageContentAboutUs::first();
        $contentQuote = PageContentQuote::first();
        return view('welcome', [
            'sliders'=>$sliders, 
            'contentAbout'=>$contentAbout,
            'contentQuote'=>$contentQuote,
        ]);
    }

    public function about(Request $request) 
    {
        $content = PageContentAboutUs::first();
        return view('pages.about', ['contentAbout'=>$content]);
    }

    public function courses (Request $request)
    {
        return view('pages.courses');
    }

    public function getQuote (Request $request)
    {
        $content = PageContentQuote::first();
        return view('pages.quote', ['contentQuote'=>$content]);
    }

    public function contact(Request $request)
    {
        return view('pages.contact');
    }

    public function quoteForm(Request $request)
    {
        dd($request->all());
    }
}
