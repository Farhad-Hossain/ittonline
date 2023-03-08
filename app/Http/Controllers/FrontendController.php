<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppBasicInfo;
use App\Models\SliderImage;

class FrontendController extends Controller
{
    public function welcome(Request $req)
    {
        $basicInfo = AppBasicInfo::first() ? AppBasicInfo::first() : null;
        $sliders = SliderImage::all();
        return view('welcome', ['basicInfo'=>$basicInfo, 'sliders'=>$sliders]);
    }
}
