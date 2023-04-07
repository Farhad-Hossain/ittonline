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
                        <div class="btn-group">
                            <a href="{{route('admin.corp_training.all')}}" class="btn btn-sm btn-primary pull-right">All Trainings</a>
                        </div>
                    </div>
                    
                </div>
                <hr/>
                <form action="{{route('admin.corp_training.save')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="training_id" value="{{request()->training_id ? request()->training_id : 0}}" />
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">Training Title</label>
                            <input type="text" name="training_title" class="form-control form-control-sm" value="{{$training ? $training->training_title : ''}}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="" class="form-label">Category</label>
                            <select name="category_id" id="" class="form-control form-control-sm" required>
                            <option value="0">-- Select Category --</option>
                                @foreach($categories as $category)
                                    @php 
                                        $isSelected = $training && $training->category_id==$category->id ? 'selected' : '';
                                    @endphp
                                    <option value="{{$category->id}}" {{ $isSelected }}>{{$category->training_title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="" class="form-label">Image <small class="text-danger">*(Optional)</small></label>
                            <input type="file" name="image" class="form-control form-control-sm" value="">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">Training Details <small class="text-danger">*(Optional)</small></label>
                            <textarea class="form-control form-control-sm" name="training_details" id="summernote" rows="10"></textarea>
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
        let html = `{{$training ? $training->training_details : '' }}`;
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