@extends('layouts.admin_master',['title'=>'Page Content - About us'])
@push('custom_styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@section('contents')
<div class="row">
    <div class="col col-lg-9 mx-auto">
        <div class="card radius-10">
            <div class="card-body">
                <div>
                    <h5 class="card-title">About Us Page</h5>
                </div>
                <hr/>
                <form action="{{route('admin.page_content.about_us')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">Heading line</label>
                            <input type="text" name="heading_line" class="form-control form-control-sm" value="{{$content ? $content->heading_line : ''}}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">Right Side Photo (.jpg, .jpeg, .png, .bmp)</label>
                            <input type="file" name="right_side_photo" class="form-control form-control-sm" value="{{$content ? $content->right_side_photo : ''}}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">Short Description</label>
                            <textarea class="form-control form-control-sm" name="short_description" id="summernote"></textarea>
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
        let html = `{{$content ? $content->short_description : ""}}`;
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