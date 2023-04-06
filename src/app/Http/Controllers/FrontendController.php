<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppBasicInfo;
use App\Models\SliderImage;
use App\Models\PageContentAboutUs;
use App\Models\PageContentQuote;
use App\Models\Quote;
use App\Models\Contact;
use App\Models\Stuff;
use App\Models\Course;
use App\Models\Gallery;
use App\Models\GalleryEvent;
use App\Models\Testimonial;
use App\Models\PageContentWhyChooseUs;
use App\Models\ServiceCategory;
use Mail;
use App\Mail\ContactMail;
use App\Models\ClassScheduleMenu;

class FrontendController extends Controller
{
    public function welcome(Request $req)
    {
        $sliders = SliderImage::all();
        $contentAbout = PageContentAboutUs::where('is_menu', '!=', 1)->first();
        $contentQuote = PageContentQuote::first();
        $stuffs = Stuff::where('is_active', 1)->get();
        // $courses = Course::orderBy('id', 'desc')->get();
        $testimonials = Testimonial::all();
        $whyChooseUs = PageContentWhyChooseUs::first();
        return view('welcome', [
            'sliders'=>$sliders, 
            'contentAbout'=>$contentAbout,
            'contentQuote'=>$contentQuote,
            'stuffs'=>$stuffs,
            // 'courses'=>$courses,
            'testimonials'=>$testimonials,
            'whyChooseUs'=>$whyChooseUs,
        ]);
    }

    public function about(Request $request) 
    {
        $content = PageContentAboutUs::first();
        $stuffs = Stuff::where('is_active', 1)->get();
        $testimonials = Testimonial::all();
        return view('pages.about', ['contentAbout'=>$content, 'stuffs'=>$stuffs, 'testimonials'=>$testimonials]);
    }

    public function aboutUsMenu(Request $request, $menu_slug)
    {
        $aboutUsMenu = PageContentAboutUs::where('menu_slug', $menu_slug)->first();
        return view('pages.about_us_content', ['aboutUsMenu'=>$aboutUsMenu]);
    }

    public function classScheduleMenu(Request $request, $menu_slug)
    {
        $classScheduleMenu = ClassScheduleMenu::where('menu_slug', $menu_slug)->first();
        return view('pages.class_schedule_content', ['classScheduleMenu'=>$classScheduleMenu]);
    }

    public function courses (Request $request)
    {
        if ( $request->category_id ) {
            $courses = Course::where('category_id', $request->category_id)->get();
        } else {
            $courses = Course::all();
        }
        $testimonials = Testimonial::all();
        return view('pages.courses', ['courses'=>$courses, 'testimonials'=>$testimonials]);
    }
    public function courseDetails(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);
        $stuffs = Stuff::where('is_active', 1)->get();
        $contentQuote = PageContentQuote::first();
        return view('pages.course_details', ['course'=>$course, 'stuffs'=>$stuffs, 'contentQuote'=>$contentQuote]);
    }

    public function getQuote (Request $request)
    {
        $content = PageContentQuote::first();
        $stuffs = Stuff::where('is_active', 1)->get();
        return view('pages.quote', ['contentQuote'=>$content, 'stuffs'=>$stuffs]);
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
            $data['message'] = 'Something went wrong. Try later';
        }
        return response()->json($data, 200);
    }

    public function contactForm(Request $request)
    {
        $data = [
            'status'=>false,
            'message'=>'',
        ];
        

        $contact = new Contact();
        try {
            $contact->name = $request->name ?? '';
            $contact->email = $request->email ?? '';
            $contact->subject = $request->subject ?? '';
            $contact->message = $request->message ?? '';
            $contact->ip_address = $request->ip();
            $contact->save();

            $mailData = [
                'title' => '',
                'body' => 'This is for testing email using smtp.'
            ];
            try {
                Mail::to($contact->email)->send(new ContactMail($mailData));
            } catch (\Exception $e) {}
            

            $data['status'] = true;
            $data['message'] = 'Thank you, Your request submitted.';

        } catch(\Exception $e) {
            $data['message'] = 'Something went wrong. Try later';
        }

        return response()->json($data, 200);
    }

    public function inqueryForm(Request $request)
    {
        return view('pages.inquery_form');
    }

    public function gallery(Request $request)
    {   
        $galleryImages = Gallery::all();
        $galleryEvents = GalleryEvent::orderBy('id', 'desc')->get();

        if ( $request->event && GalleryEvent::where('event_name', $request->event)->exists() ) {
            $galleryEvent = GalleryEvent::where('event_name', $request->event)->with('images')->first();
            return view('pages.gallery_event_photos', ['galleryEvent'=>$galleryEvent]);
        }
        return view('pages.gallery', ['galleryImages'=>$galleryImages, 'galleryEvents'=>$galleryEvents]);
    }

    public function team(Request $request)
    {
        $stuffs = Stuff::where('is_active', 1)->get();
        return view('pages.team', ['stuffs'=>$stuffs ]);
    }

    public function executeCommand(Request $request)
    {
        $result = \Artisan::call($request->command);
        dd($result);
    }
}
