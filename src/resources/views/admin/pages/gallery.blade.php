@extends('layouts.admin_master', ['title'=>'Gallery Setup'])

@section('contents')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-sm-flex align-items-center mb-3">
        <div class="h4" style="color: rgb(80, 80, 80)">Gallery Images</div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary" id="gallery-img-add-btn" data-image_id="0" data-bs-toggle="modal" data-title="">
                    Add Image
                </button>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="row">
        @if($galleryImages)
        @foreach($galleryImages as $galleryImage)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{asset($galleryImage->img_url)}}" class="card-img-top" alt="...">
                    <div class="card-header">
                        <h4>{{$galleryImage->title}}</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary gallery-img-edit-btn" data-image_id="{{$galleryImage->id}}" data-title="{{$galleryImage->title}}">Edit</button>
                        <button class="btn btn-danger gallery-img-delete-btn" data-image_id="{{$galleryImage->id}}">Delete</button>
                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>

    <!-- Modal for adding / Editing slider -->
    <div class="modal fade" id="gallery-add-edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form action="{{route('admin.gallery.add_edit')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="image_id" id="form-image-id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="" class="form-label">Select Image (jpg, jpeg, png, webp, bmp)</label>
                            <input type="file" class="form-control" name="gallery_image">
                        </div>
                        
                        <div class="col-sm-12 form-group">
                            <label for="" class="form-label">Image Title</label>
                            <input type="text" class="form-control" name="title" id="form-image-title">
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
    <form action="{{route('admin.gallery.img_delete')}}" method="POST" id="gallery-delete-form">
        @csrf
        <input type="hidden" name="image_id" id="form-gallery-delete-id">
    </form>
@endsection

@push('custom_scripts')
<script>
    $(document).ready(function () {
        $(document).on('click', "#gallery-img-add-btn, .gallery-img-edit-btn", function () {
           if ( $(this).data('image_id') ) {
              $("#form-image-id").val($(this).data('image_id'));
              $("#form-image-title").val($(this).data('title'));
           }
           $("#gallery-add-edit-modal").modal('show');
        })

        $(document).on('click', '.gallery-img-delete-btn', function () {
            $("#form-gallery-delete-id").val( $(this).data('image_id') );
            if ( confirm('Are you want to delete ?') ) {
                $("#gallery-delete-form").submit();
            }
        })
    });
</script>
@endpush