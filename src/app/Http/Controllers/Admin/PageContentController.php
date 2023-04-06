<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PageContentAboutUs;
use App\Models\PageContentQuote;
use App\Models\PageContentWhyChooseUs;
use App\Models\ClassScheduleMenu;
use Auth;

class PageContentController extends Controller
{
    public function __construct() 
    {
        $this->extensions = ['jpg', 'jpeg', 'png', 'bmp', 'webp'];
    }
    public function aboutUs(Request $request)
    {
        if ($request->method() == 'POST') {
            $content = PageContentAboutUs::where('is_menu', '!=', 1)->first() != null ? PageContentAboutUs::where('is_menu', '!=', 1)->first() : new PageContentAboutUs() ;
            $content->heading_line = $request->heading_line ? $request->heading_line : '';
            
            $content->short_description = $request->short_description ?? '';
            if ($request->right_side_photo) {
                $extension = $request->right_side_photo->extension();
                if ( !in_array($extension, $this->extensions) ) {
                    return redirect()->back('danger', 'Only image file are allowed');
                }
                $fileName = time().'.'.$extension;
                $request->right_side_photo->move('images', $fileName);
                $filePath = 'images/'.$fileName;
            } else {
                $filePath = $content->right_side_photo ?? '';
            }
            $content->right_side_photo = $filePath;
            $content->ip = $request->ip();
            $content->created_by = !$content->created_by ? Auth::user()->id : $content->created_by;
            $content->updated_by = Auth::user()->id;
            $content->save();

            return redirect()->back()->with('success', 'Content updated successfully.');
        } else {
            $content = PageContentAboutUs::where('is_menu', '!=', 1)->first() or null;
            return view('admin.pages.page_content.about_us', ['content'=>$content]);
        }
    }

    public function aboutUsMenus(Request $request)
    {
        $menus = PageContentAboutUs::where('is_menu', 1)->get();
        return view('admin.pages.page_content.about_us_menus', ['menus'=>$menus]);
    }

    public function aboutUsMenuContentUpdate(Request $request)
    {
        if ($request->method() == "GET") {
            $content = null;
            if ( $request->id ) {
                $content = PageContentAboutUs::findOrFail($request->id);
            }
            return view('admin.pages.page_content.about_us_menu_content', ['content'=>$content]);
        }
        if ($request->method() == 'POST') {
            if ($request->menu_id && $request->menu_id > 0) {
                $content = PageContentAboutUs::findOrFail($request->menu_id);    
            } else {
                $content = new PageContentAboutUs();
            }
            $content->menu_name = $request->menu_name ?? '';
            $content->menu_slug = str_replace(' ', '-', $content->menu_name);
            $content->is_menu = 1;
            $content->short_description = $request->short_description ?? '';
            $content->ip = $request->ip();
            $content->created_by = !$content->created_by ? Auth::user()->id : $content->created_by;
            $content->updated_by = Auth::user()->id;
            $content->save();

            return redirect()->route('admin.page_content.about_us_menus')->with('success', 'About us Menu content saved successfully.');
        }
        
    }

    public function classScheduleMenus(Request $request)
    {
        $menus = ClassScheduleMenu::all();
        return view('admin.pages.page_content.class_schedule_menus', ['menus'=>$menus]);
    }

    public function classScheduleMenuContentUpdate(Request $request)
    {
        if ($request->method() == "GET") {
            $content = null;
            if ( $request->id ) {
                $content = ClassScheduleMenu::findOrFail($request->id);
            }
            return view('admin.pages.page_content.class_schedule_menu_content', ['content'=>$content]);
        }
        if ($request->method() == 'POST'){
            if ($request->menu_id && $request->menu_id > 0) {
                $content = ClassScheduleMenu::findOrFail($request->menu_id);    
            } else {
                $content = new ClassScheduleMenu();
            }
            $content->menu_name = $request->menu_name ?? '';
            $content->menu_slug = str_replace(' ', '-', strtolower($content->menu_name));
            if ($request->image) {
                $extension = $request->image->extension();
                if ( !in_array($extension, $this->extensions) ) {
                    return redirect()->back('danger', 'Only image file are allowed');
                }
                $fileName = time().'.'.$extension;
                $request->image->move('images', $fileName);
                $filePath = 'images/'.$fileName;
            } else {
                $filePath = $content->image ?? '';
            }
            $content->image = $filePath;
            $content->content = $request->content ?? '';

            $content->menu_name = strtoupper($content->menu_name);
            $content->save();

            return redirect()->route('admin.page_content.class_schedule_menus')->with('success', 'About us Menu content saved successfully.');
        }
    }

    public function freeQuote(Request $request)
    {
        if ($request->method() == 'POST') {
            $content = PageContentQuote::first() != null ? PageContentQuote::first() : new PageContentQuote() ;
            $content->heading_line = $request->heading_line ? $request->heading_line : '';
            
            $content->short_description = $request->short_description ?? '';
            $content->ip = $request->ip();
            $content->created_by = !$content->created_by ? Auth::user()->id : $content->created_by;
            $content->updated_by = Auth::user()->id;
            $content->save();

            return redirect()->back()->with('success', 'Content updated successfully.');
        } else {
            $content = PageContentQuote::first();
            return view('admin.pages.page_content.free_quote', ['content'=>$content]);
        }
    }

    public function contact(Request $request)
    {
        if ($request->method() == 'POST') {

        } else {
            return view('admin.pages.page_content.contact');
        }
    }

    public function whyChooseUs(Request $request)
    {
        if ($request->method() == 'GET') {
            $content = PageContentWhyChooseUs::first();
            return view('admin.pages.page_content.why_choose_us', ['content'=>$content]);
        } else {
            $content = PageContentWhyChooseUs::first();
            if ( !$content ) {
                $content = new PageContentWhyChooseUs();
            }
            $content->content_best_it_training_industry = $request->content_best_it_training_industry;
            $content->content_professional_trainers = $request->content_professional_trainers;
            $content->content_award_winning = $request->content_award_winning;
            $content->content_support = $request->content_support;

            if ( $request->middle_photo ) {
                $extension = $request->middle_photo->extension();
                if ( !in_array($extension, $this->extensions) ) {
                    return redirect()->back('danger', 'Only image file are allowed');
                }
                $fileName = time().'.'.$extension;
                $request->middle_photo->move(public_path('images'), $fileName);
                $photoPath = 'images/'.$fileName;
            } else {
                $photoPath = $content->middle_photo;
            }
            $content->middle_photo = $photoPath;

            $content->save();
            return back()->with('success', 'Saved successfully.');
        }
    }
}
