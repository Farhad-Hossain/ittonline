@extends('layouts.admin_master', ['title'=>'Gallery Events'])

@section('contents')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-sm-flex align-items-center mb-3">
        <div class="h4" style="color: rgb(80, 80, 80)">Gallery Images</div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-primary" id="gallery-event-add-btn" data-event_id="0" data-bs-toggle="modal" data-title="">
                    Add Event
                </button>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="row">
        @if($galleryEvents)
        @foreach($galleryEvents as $galleryEvent)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{asset($galleryEvent->feature_photo)}}" class="card-img-top" alt="..." style="width: 100%; height: 150px;">
                    <div class="card-header">
                        <h4>{{$galleryEvent->event_name}}</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-sm btn-primary gallery-event-edit-btn" data-event_id="{{$galleryEvent->id}}" data-title="{{$galleryEvent->event_name}}">Edit</button>
                        <button class="btn btn-sm btn-danger gallery-event-delete-btn" data-event_id="{{$galleryEvent->id}}">Delete</button>
                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>

    <!-- Modal for adding / Editing slider -->
    <div class="modal fade" id="gallery-event-add-edit-modal" tabindex="-1" aria-labelledby="addEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEditModalLabel">Add Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form action="{{route('admin.gallery.add_event')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="event_id" id="form-event-id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="" class="form-label">Select Image (jpg, jpeg, png, webp, bmp)</label>
                            <input type="file" class="form-control" name="feature_photo">
                        </div>
                        
                        <div class="col-sm-12 form-group">
                            <label for="" class="form-label">Event name</label>
                            <input type="text" class="form-control" name="event_name" id="form-event-title">
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
    <form action="{{route('admin.gallery.delete_event')}}" method="POST" id="gallery-event-delete-form">
        @csrf
        <input type="hidden" name="event_id" id="form-gallery-event-delete-id">
    </form>
@endsection

@push('custom_scripts')
<script>
    $(document).ready(function () {
        $(document).on('click', "#gallery-event-add-btn, .gallery-event-edit-btn", function () {
           if ( $(this).data('event_id') ) {
              $("#form-event-id").val($(this).data('event_id'));
              $("#form-event-title").val($(this).data('title'));

              if ( $(this).hasClass('gallery-event-edit-btn') ) {
                $("#addEditModalLabel").text('Edit event');
              }
           }
           $("#gallery-event-add-edit-modal").modal('show');
        })

        $(document).on('click', '.gallery-event-delete-btn', function () {
            $("#form-gallery-event-delete-id").val( $(this).data('event_id') );
            if ( confirm('Are you want to delete ?') ) {
                $("#gallery-event-delete-form").submit();
            }
        })
    });
</script>
@endpush