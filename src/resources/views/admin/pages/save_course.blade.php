@extends('layouts.admin_master',['title'=>$title])
@push('custom_styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@section('contents')
<div class="row">
    <div class="col col-lg-9 mx-auto">
        <div class="card radius-10">
            <div class="card-body">
                <div class="page-breadcrumb d-sm-flex align-items-center mb-3">
                    <h5 class="card-title">{{$title}}</h5>
                    <div class="ms-auto">
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
                            <input type="text" name="course_title" class="form-control" value="{{$course ? $course->course_title : ''}}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">Thumbnail Photo (.jpg, .jpeg, .png, .bmp)</label>
                            <input type="file" name="thumbnail" class="form-control" value="{{$course ? $course->thumbnail : ''}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="" class="form-label">Starting Date</label>
                            <input type="date" name="starting_date" class="form-control" value="{{$course ? $course->starting_date : ''}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="" class="form-label">Total Hours</label>
                            <input type="text" name="total_hours" class="form-control" value="{{$course ? $course->total_hours : ''}}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">Course Details</label>
                            <textarea class="form-control" name="course_details" id="summernote"></textarea>
                        </div>
                        <div class="col-md-12 form-group mt-2">
                            <button class="btn btn-primary" style="min-width: 100px;" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom_scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        let html = `{{$course ? $course->course_details : '' }}`;
        $('#summernote').html(html);
        $('#summernote').summernote({
            height: 200,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol']],
            ],
            placeholder: 'Write here . . .',
        });
    })
</script>
@endpush