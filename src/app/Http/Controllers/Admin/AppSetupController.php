<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppBasicInfo;
use App\Models\SliderImage;
use Auth;

class AppSetupController extends Controller
{
    public function __construct() 
    {
        $this->extensions = ['jpg', 'jpeg', 'png', 'bmp', 'webp'];
    }
    public function appSettings(Request $req)
    {
        if ($req->method() == 'GET') {
            $basicInfo = AppBasicInfo::first() ? (object)AppBasicInfo::first() : null;
        } else if ($req->method() == 'POST') {
            $basicInfo = AppBasicInfo::first() or new AppBasicInfo();
            $basicInfo->app_name = $req->app_name or '';
            $basicInfo->short_address = $req->short_address or '';
            $basicInfo->mobile_number = $req->mobile_no or '';
            $basicInfo->email = $req->email or '';
            $basicInfo->facebook = $req->facebook or '';
            $basicInfo->twitter = $req->twitter or '';
            $basicInfo->instagram = $req->instagram or '';
            $basicInfo->youtube = $req->youtube or '';
            $basicInfo->linkedin = $req->linkedin or '';

            if ($req->logo) {
                $logoFileName = time().'.'.$req->logo->extension();
                $logo = $req->logo->move(public_path('images'), $logoFileName);
                $logoPath = 'images/'.$logoFileName;
            } else {
                $logoPath = $basicInfo ? $basicInfo['logo_url'] : '';
            }
            
            $basicInfo->logo_url = $logoPath;
            $basicInfo->created_by = 1;
            $basicInfo->updated_by = 1;
            $basicInfo->created_ip = $req->ip();
            $basicInfo->updated_ip = 1;

            $basicInfo->save();

            return redirect()->back()->with('success',"Information updated successfully");
        }
        // dd($basicInfo);
        return view('admin.pages.app_settings', ['basicInfo'=>$basicInfo]);
    }

    public function sliderSetup(Request $request)
    {
        $sliderImages = SliderImage::all();
        return view('admin.pages.slider_setup', ['sliderImages'=>$sliderImages]);
    }

    public function sliderAddEdit(Request $request)
    {
        if ($request->slider_id) {
            $slider = SliderImage::where('id', $request->slider_id)->first();
        } else {
            $slider = new SliderImage();
        }

        if ($request->slider_image) {
            $extension = $request->slider_image->extension();

            if ( !in_array($extension, $this->extensions) ) {
                return redirect()->back()->with('danger', 'Invalid file extention, Only image file will be acceptable.');
            }

            $fileName = time().'.'.$extension;
            $request->slider_image->move(public_path('images'), $fileName);
            $sliderPath = 'images/'.$fileName;
        } else {
            $sliderPath = $slider->image_url ?? '';
        }
        

        $slider->image_url = $sliderPath ?? '';
        $slider->secondary_title = $request->secondary_title ? strtoupper($request->secondary_title) : '';
        $slider->primary_title = $request->primary_title ?? '';
        $slider->created_by = $slider->created_by ? $slider->created_by : Auth::user()->id;
        $slider->updated_by = Auth::user()->id;
        $slider->created_ip = $slider->created_ip ? $slider->created_ip : $request->ip();
        $slider->updated_ip = $request->ip();

        $slider->save();
        return redirect()->back()->with('success', 'Slider Image updated successfully');   
    }

    public function sliderDelete(Request $request)
    {
        if ($request->slider_id) {
            $slider = SliderImage::where('id', $request->slider_id)->first();
            $slider->delete();
            return redirect()->back()->with('success', 'Slider Deleted successfully.');
        } else {
            return redirect()->back()->with('danger', 'Something went wrong.');
        }
    }
}
