<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function __construct() 
    {
        $this->extensions = ['jpg', 'jpeg', 'png', 'bmp', 'webp'];
    }

    public function gallery(Request $request)
    {
        $galleryImages = Gallery::all();
        return view('admin.pages.gallery', ['galleryImages'=>$galleryImages]);
    }


    public function galleryAddEdit(Request $request)
    {
        $action = "add";
        try {
            if ( $request->image_id && $request->image_id != null && $request->image_id > 0 ) {
                $gallery = Gallery::findOrFail($request->image_id);
                $action = 'edit';
            } else {
                $gallery = new Gallery();
            }

            $gallery->title = $request->title ?? '';
            $gallery->ip_address = $request->ip();
            
            if ($action == 'edit') {
                if ( $request->gallery_image ) {
                    $extension = $request->gallery_image->extension();
                    if ( !in_array($extension, $this->extensions) ) {
                        return redirect()->back()->with('danger', 'Invalid file extention, Only image file will be acceptable.');
                    }
                    $fileName = time().'.'.$extension;
                    $request->gallery_image->move(public_path('images/gallery'), $fileName);
                    $imgPath = 'images/gallery/'.$fileName;
                } else {
                    $imgPath = $gallery->img_url;
                }
            } else {
                if ( $request->gallery_image ) {
                    $extension = $request->gallery_image->extension();
                    if ( !in_array($extension, $this->extensions) ) {
                        return redirect()->back()->with('danger', 'Invalid file extention, Only image file will be acceptable.');
                    }
                    $fileName = time().'.'.$extension;
                    $request->gallery_image->move(public_path('images/gallery'), $fileName);
                    $imgPath = 'images/gallery/'.$fileName;
                } else {
                    return redirect()->back()->with('danger', 'Image required.');
                }
            }
            $gallery->img_url = $imgPath;
            $gallery->save();
            return redirect()->back()->with('success', 'Image uploaded successfully.');

        } catch(\Exception $ex) {
            return redirect()->back()->with('danger', 'Something went wrong.');
        }
    }

    public function galleryImageDelete(Request $request)
    {
        try {
            $gallery = Gallery::findOrFail($request->image_id);
            $gallery->delete();
            return redirect()->back()->with('success', 'Image deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Something went wrong.');
        }
        
        
    }
}
