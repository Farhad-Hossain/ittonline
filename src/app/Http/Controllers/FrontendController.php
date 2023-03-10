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
        return view('welcome', ['sliders'=>$sliders, 'title'=>'Welcome :: ITTOnline.org']);
    }

    public function about(Request $request) 
    {
        $navbar = [
            'title'=>'About Us',
            'link'=> [
                'text'=>'About',
                'link'=>route('about')
            ]
        ];
        return view('pages.about', ['title'=>'About Us','navbar'=>$navbar]);
    }

    public function courses (Request $request)
    {
        $navbar = [
            'title'=>'Our Courses',
            'link'=> [
                'text'=>'Courses',
                'link'=>route('courses')
            ]
        ];
        return view('pages.courses', ['title'=>'Courses','navbar'=>$navbar]);
    }
}
