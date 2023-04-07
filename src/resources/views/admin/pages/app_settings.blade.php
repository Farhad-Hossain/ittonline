@extends('layouts.admin_master', ['title'=>'App Setting'])
@push('custom_styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@section('contents')
<div class="row">
    <div class="col col-lg-9 mx-auto">
        <div class="card radius-10">
            <div class="card-body">
                <div>
                    <h5 class="card-title">Basic Informations</h5>
                </div>
                <hr/>
                <form action="{{route('admin.app_setup')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Application Name</label>
                            <input type="text" class="form-control form-control-sm" name='app_name' value="{{$basicInfo ? $basicInfo['app_name'] : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Mobile number</label>
                            <input type="text" class="form-control form-control-sm" name='mobile_no' value="{{$basicInfo ? $basicInfo['mobile_number'] : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control form-control-sm" name='email' value="{{$basicInfo ? $basicInfo['email'] : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Logo (3x2 image ratio preferrable)</label>
                            <input type="file" class="form-control form-control-sm" name='logo'>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="form-label">Short Address</label>
                            <input type="text" class="form-control form-control-sm" name='short_address' value="{{$basicInfo ? $basicInfo->short_address : ''}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="" class="form-label">Opening Hours Text</label>
                            <input type="text" class="form-control form-control-sm" name="opening_hours_text" value="{{$basicInfo ? $basicInfo['opening_hours_text'] : ''}}">
                        </div>
                        {{--
                        <div class="form-group col-md-4">
                            <label for="" class="form-label">Number of Students </label>
                            <input type="number" class="form-control form-control-sm" name="number_of_happy_students" value="{{$basicInfo ? $basicInfo['number_of_happy_students'] : ''}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="" class="form-label">Number of Courses Done  </label>
                            <input type="number" class="form-control form-control-sm" name="number_of_done_projects" value="{{$basicInfo ? $basicInfo['number_of_done_projects'] : ''}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="" class="form-label">Number of Awards  </label>
                            <input type="number" class="form-control form-control-sm" name="number_of_awards" value="{{$basicInfo ? $basicInfo['number_of_awards'] : ''}}">
                        </div>
                        --}}
                    </div>
                    <div>
                        <h5 class="card-title mt-4">Social Links</h5>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Facebook <small class="text-danger">*( Full url )</small></label>
                            <input type="text" class="form-control form-control-sm" name="facebook" value="{{$basicInfo ? $basicInfo['facebook'] : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Twitter <small class="text-danger">*( Full url )</small></label>
                            <input type="text" class="form-control form-control-sm" name="twitter" value="{{$basicInfo ? $basicInfo['twitter'] : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Instagram <small class="text-danger">*( Full url )</small></label>
                            <input type="text" class="form-control form-control-sm" name="instagram" value="{{$basicInfo ? $basicInfo['instagram'] : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Linkedin <small class="text-danger">*( Full url )</small></label>
                            <input type="text" class="form-control" name="linkedin" value="{{$basicInfo ? $basicInfo['linkedin'] : ''}}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="form-label">Youtube <small class="text-danger">*( Full url )</small></label>
                            <input type="text" class="form-control form-control-sm" name="youtube" value="{{$basicInfo ? $basicInfo['youtube'] : ''}}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="form-label">Paste here Google Map location (Embedded Link)  
                                <span class="text-danger">
                                    <a href="https://youtu.be/_QZA1GLGd08" target="_blank"> [ See How to get embedded link ]</a> 
                                </span>    
                            </label>
                            <textarea class="form-control" name="location_google_map_embedded_link" >
                                {{$basicInfo ? $basicInfo['location_google_map_embedded_link'] : ''}}
                            </textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="form-label">Latest Offers Content 
                            </label>
                            <textarea class="form-control" name="offers_content" id="summernote"></textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-sm btn-primary" style="min-width: 100px;">Save</button>
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
        let html = `{{$basicInfo ? $basicInfo->offers_content : '' }}`;
        $('#summernote').html(html);
        $('#summernote').summernote({
            height: 150,
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