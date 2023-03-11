@extends('layouts.admin_master',['title'=>'Page Content - Free Quote'])
@push('custom_styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@section('contents')
<div class="row">
    <div class="col col-lg-9 mx-auto">
        <div class="card radius-10">
            <div class="card-body">
                <div>
                    <h5 class="card-title">Quote Page</h5>
                </div>
                <hr/>
                <form action="{{route('admin.page_content.free_quote')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">Heading line</label>
                            <input type="text" name="heading_line" class="form-control" value="{{$content ? $content->heading_line : ''}}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">SHort Description</label>
                            <textarea class="form-control" name="short_description" id="summernote"></textarea>
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
        $('#summernote').html('{{$content ? $content->short_description : ""}}');
        $('#summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol']],
            ],
            placeholder: 'Write here . . .',
        });
    })
</script>
@endpush