@extends('layouts.admin_master', ['title'=>'Slider Setup'])

@section('contents')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-sm-flex align-items-center mb-3">
        <div class="h4" style="color: rgb(80, 80, 80)">Slider Images</div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary" id="slider-img-add-btn" data-bs-toggle="modal" data-slider_secondary_title="" data-slider_primary_title="">
                    Add Image
                </button>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="row">
        @if($sliderImages)
        @foreach($sliderImages as $sliderImage)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{asset($sliderImage->image_url)}}" class="card-img-top" alt="...">
                    <div class="card-header">
                        <span>{{$sliderImage->secondary_title}}</span>
                    </div>
                    <div class="card-header">
                        <h4>{{$sliderImage->primary_title}}</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary slider-img-edit-btn" data-slider_id="{{$sliderImage->id}}" data-slider_secondary_title="{{$sliderImage->secondary_title}}" data-slider_primary_title="{{$sliderImage->primary_title}}">Edit</button>
                        <button class="btn btn-danger slider-img-delete-btn" data-slider_id="{{$sliderImage->id}}">Delete</button>
                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>

    <!-- Modal for adding / Editing slider -->
    <div class="modal fade" id="slider-add-edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Slider Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form action="{{route('admin.slider_add_edit')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="slider_id" id="form-slider-id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="" class="form-label">Select Image (jpg, jpeg, png, webp, bmp)</label>
                            <input type="file" class="form-control" name="slider_image">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="" class="form-label">Secondary Title</label>
                            <input type="text" class="form-control" name="secondary_title" id="form-slider-secondary-title">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="" class="form-label">Primary Title</label>
                            <input type="text" class="form-control" name="primary_title" id="form-slider-primary-title">
                        </div>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
    </div>

    <!-- Slider delete form -->
    <form action="{{route('admin.slider_img_delete')}}" method="POST" id="slider-delete-form">
        @csrf
        <input type="hidden" name="slider_id" id="form-slider-delete-id">
    </form>
@endsection

@push('custom_scripts')
<script>
    $(document).ready(function () {
        $(document).on('click', "#slider-img-add-btn, .slider-img-edit-btn", function () {
           if ( $(this).data('slider_id') ) {
              $("#form-slider-id").val($(this).data('slider_id'));
              $("#form-slider-secondary-title").val($(this).data('slider_secondary_title'));
              $("#form-slider-primary-title").val($(this).data('slider_primary_title'));
           }
           $("#slider-add-edit-modal").modal('show');
        })

        $(document).on('click', '.slider-img-delete-btn', function () {
            $("#form-slider-delete-id").val( $(this).data('slider_id') );
            if ( confirm('Are you want to delete ?') ) {
                $("#slider-delete-form").submit();
            }
        })
    });
</script>
@endpush