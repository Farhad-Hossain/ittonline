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
                    <h5 class="card-title">About Us Menu content ( <small>Which will be shown as menu content</small> )</h5>
                </div>
                <hr/>
                <form action="{{route('admin.page_content.about_us_menu_content_update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="menu_id" value="{{$content ? $content->id : 0}}">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">Menu Name</label>
                            <input type="text" name="menu_name" class="form-control form-control-sm" value="{{$content ? $content->menu_name : ''}}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">Content</label>
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