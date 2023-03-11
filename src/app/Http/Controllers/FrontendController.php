<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppBasicInfo;
use App\Models\SliderImage;
use App\Models\PageContentAboutUs;
use App\Models\PageContentQuote;
use App\Models\Quote;

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
        $data = [
            'status'=>false,
            'message'=>'',
        ];
        $quote = new Quote();
        try {
            $quote->name = $request->name ?? '';
            $quote->email = $request->email;
            $quote->service_name = $request->service_name;
            $quote->message = $request->message;
            $quote->ip = $request->ip();
            $quote->save();

            $data['status'] = true;
            $data['message'] = 'Thank you.Your request submitted.';
        } catch (\Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return response()->json($data, 200);
    }
}
