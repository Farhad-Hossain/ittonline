@extends('layouts.admin_master',['title'=>'Page Content - Why Choose Us'])
@push('custom_styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
@section('contents')
<div class="row">
    <div class="col col-lg-9 mx-auto">
        <div class="card radius-10">
            <div class="card-body">
                <div>
                    <h5 class="card-title">Why Choose Us Page</h5>
                </div>
                <hr/>
                <form action="{{route('admin.page_content.why_choose_us')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$content ? $content->id : ''}}">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">Content of (Best In Training Industry)</label>
                            <input type="text" name="content_best_it_training_industry" class="form-control form-control-sm" value="{{$content ? $content->content_best_it_training_industry : ''}}" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">Content of (Professional Trainers)</label>
                            <input type="text" name="content_professional_trainers" class="form-control form-control-sm" value="{{$content ? $content->content_professional_trainers : ''}}" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">Content of (Award Winning)</label>
                            <input type="text" name="content_award_winning" class="form-control form-control-sm" value="{{$content ? $content->content_award_winning : ''}}" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">Content of (24/7 Support)</label>
                            <input type="text" name="content_support" class="form-control form-control-sm" value="{{$content ? $content->content_support : ''}}" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="" class="form-label">Middle Photo (.jpg, .jpeg, .png, .bmp)</label>
                            <input type="file" name="middle_photo" class="form-control form-control-sm" value="{{$content ? $content->middle_photo : ''}}" 
                                {{$content ? '' : 'required'}}
                            >
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
<script type="text/javascript">
    $(document).ready(function () {
        
    })
</script>
@endpush