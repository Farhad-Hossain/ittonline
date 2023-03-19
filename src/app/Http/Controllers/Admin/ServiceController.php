<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\ServiceCategory;
use Auth;

class ServiceController extends Controller
{
    public function services(Request $request)
    {
        $courses = Course::get();
        return view('admin.pages.courses', ['courses'=>$courses]);
    }

    public function saveService(Request $request)
    {
        $title = 'Add Course';
        $course = null;
        if ( $request->course_id && $request->course_id > 0 ) {
            $title = 'Edit Course';
            $course = Course::findOrFail($request->course_id);
        } else {
            $course = new Course();
        }

        if ( $request->method() == 'POST' ) {
            $course->course_title = $request->course_title;
            $course->starting_date = $request->starting_date;
            $course->total_hours = $request->total_hours;
            if ( $request->thumbnail && $request->thumbnail != null) {
                $fileName = time().'.'.$request->thumbnail->extension();
                $request->thumbnail->move(public_path('images'), $fileName);
                $fileName = 'images/'.$fileName;
            } else {
                $fileName = $course->thumbnail ?? '';
            }

            $course->thumbnail = $fileName;
            $course->course_details = $request->course_details;
            $course->category_id = $request->category_id;
            $course->created_by = Auth::user()->id;
            $course->ip_address = $request->ip();
            $course->save();

            return redirect()->back()->with('success', 'Course updated successfully.');
        } 
        $categories = ServiceCategory::all();
        return view('admin.pages.save_course', ['course'=>$course, 'title'=>$title, 'categories'=>$categories]);
    }

    public function serviceCategories(Request $request)
    {
        $categories = ServiceCategory::with('services')->get();
        return view('admin.pages.service_categories', ['categories'=>$categories]);
    }

    public function addServiceCategory(Request $request)
    {
        $name = $request->name;
        $serviceCategory = new ServiceCategory();
        $serviceCategory->name = $name;
        $serviceCategory->save();

        session()->flash('success', 'Category addedd successfully.');
        return redirect()->route('admin.course.categories');
    }

    public function editServiceCategory(Request $request)
    {
        $id = $request->id;
        $category = ServiceCategory::findOrFail($id);
        $category->name = $request->name;

        session()->flash('success', 'Category updated successfully.');
        return redirect()->route('admin.course.categories');
    }
}
