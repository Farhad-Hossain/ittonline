<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function __construct() 
    {
        $this->extensions = ['jpg', 'jpeg', 'png', 'bmp', 'webp'];
    }
    public function getList(Request $request)
    {
        $testimonials = Testimonial::all();
        return view('admin.pages.testimonials', ['testimonials'=>$testimonials]);
    }

    public function addTestimonial(Request $request)
    {
        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->profession = $request->profession;
        $testimonial->speech = $request->speech;

        if ( $request->photo ) {
            if ( $request->photo->extension()  ) {
                if ( !in_array($request->photo->extension(), $this->extensions) ) {
                    return redirect()->back()->with('danger', 'Invalid file extention, Only image file will be acceptable.');
                }
            }
        }

        $fileName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('images'), $fileName);
        $photoPath = 'images/'.$fileName;

        $testimonial->photo = $photoPath;

        $testimonial->save();

        return back()->with('success', 'Testimonial added successfully.');
    }

    public function editTestimonial(Request $request)
    {
        $testimonial = Testimonial::findOrFail($request->id);
        $testimonial->name = $request->name;
        $testimonial->profession = $request->profession;
        $testimonial->speech = $request->speech;

        if ( $request->photo ) {
            if ( $request->photo->extension()  ) {
                if ( !in_array($request->photo->extension(), $this->extensions) ) {
                    return redirect()->back()->with('danger', 'Invalid file extention, Only image file will be acceptable.');
                }
            }
            $fileName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images'), $fileName);
            $photoPath = 'images/'.$fileName;
        } else {
            $photoPath = $testimonial->photo;
        }
        $testimonial->photo = $photoPath;
        $testimonial->save();
        return back()->with('success', 'Testimonial updated successfully.');
    }

    public function deleteTestimonial(Request $request)
    {
        $testimonial = Testimonial::findOrFail($request->id);
        $testimonial->delete();

        return back()->with('success', 'Testimonial deleted successfully');
    }
}
