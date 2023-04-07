@extends('layouts.admin_master',['title'=>$title])
@push('custom_styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@section('contents')
<div class="row">
    <div class="col col-lg-12 mx-auto">
        <div class="card radius-10">
            <div class="card-body">
                <div class="page-breadcrumb d-sm-flex align-items-center mb-3">
                    <h5 class="card-title">{{$title}}</h5>
                    <div class="ms-auto">
                        {{-- <button class="btn btn-sm btn-primary pull-right" id="add-category-btn">Add category</button> --}}
                        <div class="btn-group">
                            <a href="{{route('admin.course.all')}}" class="btn btn-sm btn-primary pull-right">All Courses</a>
                        </div>
                    </div>
                </div>
                <hr/>
                <form action="{{route('admin.course.save')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="course_id" value="{{request()->course_id ? request()->course_id : 0}}" />
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">Course Title</label>
                            <input type="text" name="course_title" class="form-control form-control-sm" value="{{$course ? $course->course_title : ''}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="" class="form-label">Thumbnail Photo (.jpg, .jpeg, .png, .bmp)</label>
                            <input type="file" name="thumbnail" class="form-control form-control-sm" value="{{$course ? $course->thumbnail : ''}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="" class="form-label">Category <span class="text-danger">(Optional)</span></label>
                            <select name="category_id" id="" class="form-control form-control-sm">
                            <option value="0">-- Select Category --</option>
                                @foreach($categories as $category)
                                    @php 
                                        $isSelected = $course && $course->category_id==$category->id ? 'selected' : '';
                                    @endphp
                                    <option value="{{$category->id}}" {{ $isSelected }}>{{$category->course_title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="" class="form-label">Starting Date</label>
                            <input type="date" name="starting_date" class="form-control" value="{{$course ? $course->starting_date : ''}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="" class="form-label">Duration <small class="text-danger">*(In Month)</small></label>
                            <input type="number" name="total_hours" class="form-control form-control-sm" value="{{$course ? $course->total_hours : ''}}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">Course Details</label>
                            <textarea class="form-control form-control-sm" name="course_details" id="summernote" rows="10"></textarea>
                        </div>
                        <div class="col-md-12 form-group mt-2">
                            <button class="btn btn-sm btn-primary" style="min-width: 100px;" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom_scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        let html = `{{$course ? $course->course_details : '' }}`;
        $('#summernote').html(html);
        $('#summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear','color','fontsize',]],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol']],
                ['table', ['table']],
                ['insert', ['link']],
            ],
            placeholder: 'Write here . . .',
        });
    })
</script>
@endpush