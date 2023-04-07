<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\ServiceCategory;
use App\Models\CorpTraining;
use Auth;

class ServiceController extends Controller
{
    public function services(Request $request)
    {
        $courses = Course::where('is_category', '!=', 1)->get();
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
        $categories = Course::where('is_category', 1)->get();
        return view('admin.pages.save_course', ['course'=>$course, 'title'=>$title, 'categories'=>$categories]);
    }

    public function serviceCategories(Request $request)
    {
        // $categories = ServiceCategory::with('services')->get();
        $categories = Course::where('is_category', 1)->get();
        return view('admin.pages.service_categories', ['categories'=>$categories]);
    }

    public function addServiceCategory(Request $request)
    {
        $name = $request->name;
        // $serviceCategory = new ServiceCategory();
        $serviceCategory = new Course();
        $serviceCategory->course_title = $name;
        $serviceCategory->starting_date = now();
        $serviceCategory->total_hours = 0;
        $serviceCategory->thumbnail = 'null';
        $serviceCategory->category_id = 0;
        $serviceCategory->is_category = 1;
        $serviceCategory->is_active = $request->is_active;
        $serviceCategory->created_by = Auth::user()->id;
        $serviceCategory->ip_address = $request->ip();
        $serviceCategory->save();

        session()->flash('success', 'Category addedd successfully.');
        return redirect()->route('admin.course.categories');
    }

    public function editServiceCategory(Request $request)
    {
        $id = $request->id;
        // $category = ServiceCategory::findOrFail($id);
        $category = Course::findOrFail($id);
        $category->course_title = $request->name;
        $category->is_active = $request->is_active;
        
        $category->save();
        session()->flash('success', 'Category updated successfully.');
        return redirect()->route('admin.course.categories');
    }

    public function deleteService(Request $request)
    {
        $service = Course::findOrFail($request->id);
        $service->delete();
        return back()->with('success', 'Course Deleted Successfully');
    }




    // Training
    public function trainingCategories(Request $request)
    {
        $categories = CorpTraining::where('is_category', 1)->get();
        return view('admin.pages.training_categories', ['categories'=>$categories]);
    }

    public function addTrainingCategory(Request $request)
    {
        $name = $request->name;
        $serviceCategory = new CorpTraining();
        $serviceCategory->training_title = $name;
        $serviceCategory->total_month = 0;
        $serviceCategory->thumbnail = 'null';
        $serviceCategory->category_id = 0;
        $serviceCategory->is_category = 1;
        $serviceCategory->is_active = $request->is_active;
        $serviceCategory->save();

        return redirect()->back()->with('success', 'Category Created successfully.');
    }

    public function editTrainingCategory(Request $request)
    {
        $id = $request->id;
        $category = CorpTraining::findOrFail($id);
        $category->training_title = $request->name;
        $category->is_active = $request->is_active;
        
        $category->save();
        session()->flash('success', 'Category updated successfully.');
        return redirect()->back()->with('success', 'Updated successfully.');
    }

    public function trainings(Request $request)
    {
        $trainings = CorpTraining::where('is_category', 0) ->get();
        return view('admin.pages.trainings', ['trainings'=>$trainings]);
    }

    public function saveTraining(Request $request)
    {
        $title = 'Add Training';
        $training = null;
        if ( $request->training_id && $request->training_id > 0 ) {
            $title = 'Edit Training';
            $training = CorpTraining::findOrFail($request->training_id);
        } else {
            $training = new CorpTraining();
        }

        if ( $request->method() == 'POST' ) {
            $training->training_title = $request->training_title;
            $training->total_month = 0;
            if ( $request->image && $request->image != null) {
                $fileName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $fileName);
                $fileName = 'images/'.$fileName;
            } else {
                $fileName = $training->image ?? '';
            }

            $training->thumbnail = $fileName;
            $training->training_details = $request->training_details;
            $training->category_id = $request->category_id;
            $training->save();

            return redirect()->back()->with('success', 'Training info updated successfully.');
        } 
        $categories = CorpTraining::where('is_category', 1)->get();
        return view('admin.pages.save_corp_training', ['training'=>$training, 'title'=>$title, 'categories'=>$categories]);
    }

    public function deleteTraining(Request $request)
    {
        $service = CorpTraining::findOrFail($request->id);
        $service->delete();
        return back()->with('success', 'Training Deleted Successfully');
    }

}
