<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Gallery;
use App\Models\GalleryEvent;

class GalleryController extends Controller
{
    public function __construct() 
    {
        $this->extensions = ['jpg', 'jpeg', 'png', 'bmp', 'webp'];
    }

    public function events(Request $request)
    {
        $events = GalleryEvent::all();
        return view('admin.pages.gallery_events', ['galleryEvents'=>$events]);
    }

    public function eventAddEdit(Request $request)
    {
        $action = "add";
        try {
            if ( $request->event_id && $request->event_id != null && $request->event_id > 0 ) {
                $galleryEvent = GalleryEvent::findOrFail($request->event_id);
                $action = 'edit';
            } else {
                $galleryEvent = new GalleryEvent();
            }

            $galleryEvent->event_name = $request->event_name ?? '';
            // $gallery->ip_address = $request->ip();
            
            if ($action == 'edit') {
                if ( $request->feature_photo ) {
                    $extension = $request->feature_photo->extension();
                    if ( !in_array($extension, $this->extensions) ) {
                        return redirect()->back()->with('danger', 'Invalid file extention, Only image file will be acceptable.');
                    }
                    $fileName = time().'.'.$extension;
                    $request->feature_photo->move(public_path('images/gallery'), $fileName);
                    $imgPath = 'images/gallery/'.$fileName;
                } else {
                    $imgPath = $galleryEvent->feature_photo;
                }
            } else {
                if ( $request->feature_photo ) {
                    $extension = $request->feature_photo->extension();
                    if ( !in_array($extension, $this->extensions) ) {
                        return redirect()->back()->with('danger', 'Invalid file extention, Only image file will be acceptable.');
                    }
                    $fileName = time().'.'.$extension;
                    $request->feature_photo->move(public_path('images/gallery'), $fileName);
                    $imgPath = 'images/gallery/'.$fileName;
                } else {
                    return redirect()->back()->with('danger', 'Image required.');
                }
            }
           
            $galleryEvent->feature_photo = $imgPath ?? '';
            $galleryEvent->save();
            return redirect()->back()->with('success', 'Event info updated successfully.');

        } catch(\Exception $ex) {
            dd($ex);
            return redirect()->back()->with('danger', 'Something went wrong.');
        }
    }

    public function eventDelete(Request $request)
    {
        try {
            $galleryEvent = GalleryEvent::findOrFail($request->event_id);
            $galleryEvent->delete();
            return redirect()->back()->with('success', 'Event deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Something went wrong.');
        }
    }

    public function gallery(Request $request)
    {
        $galleryImages = Gallery::all();
        $galleryEvents = GalleryEvent::all();
        return view('admin.pages.gallery', ['galleryImages'=>$galleryImages, 'galleryEvents'=>$galleryEvents]);
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
            if (!$request->title) return back()->with('danger', 'Image title is required');
            if (!$request->event_id) return back()->with('danger', 'Select an event.');

            $gallery->event_id = $request->event_id;
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
