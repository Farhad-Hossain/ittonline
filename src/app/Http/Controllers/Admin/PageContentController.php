<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PageContentAboutUs;
use App\Models\PageContentQuote;
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
            $content = PageContentAboutUs::first() != null ? PageContentAboutUs::first() : new PageContentAboutUs() ;
            $content->heading_line = $request->heading_line ? $request->heading_line : '';
            
            $content->short_description = $request->short_description ?? '';
            if ($request->right_side_photo) {
                $extension = $request->right_side_photo->extension();
                if ( !in_array($extension, $this->extensions) ) {
                    return redirect()->back('danger', 'Only image file are allowed');
                }
                $fileName = time().$extension;
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
            $content = PageContentAboutUs::first() or null;
            return view('admin.pages.page_content.about_us', ['content'=>$content]);
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
}
