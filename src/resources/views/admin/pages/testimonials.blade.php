@extends('layouts.admin_master', ['title'=>'Testimonials'])

@push('custom_styles')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endpush

@section('contents')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <span>Testimonial List</span>
        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#testimonial-add-modal">Add Testimonial</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Proffesion</th>
                        <th>Avatar</th>
                        <th>Speech</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonials as $testimonial)
                    <tr class="align-middle">
                        <td>{{$testimonial->name ?? ''}}</td>
                        <td>{{$testimonial->profession ?? ''}}</td>
                        <td>
                            <img src="{{asset($testimonial->photo)}}" alt="" style="width:40px; height: 40px;"> 
                        </td>
                        <td style="text-wrap: wrap;">{{$testimonial->speech ?? ''}}</td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-btn" 
                                data-id="{{$testimonial->id}}"
                                data-name="{{$testimonial->name}}"
                                data-profession="{{$testimonial->profession}}"
                                data-speech="{{$testimonial->speech}}"
                            >Edit</button>
                            <button class="btn btn-sm btn-danger delete-btn" 
                                data-id="{{$testimonial->id}}"
                            >Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Testomonial Add modal -->
<div class="modal fade" id="testimonial-add-modal" tabindex="-1" role="dialog" aria-labelledby="stuffAddModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuffAddModalLabel">Create Testimonial</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('admin.testimonial.add')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" class="form-control" id="fi-id" value="0" required>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" id="fi-name" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="" class="form-label">Profession <span class="text-danger">*</span></label>
                <input type="text" name="profession" id="fi-profession" class="form-control" required>
            </div>
            <div class="col-md-12 form-group">
                <label for="" class="form-label">Photo <span class="text-danger" id="photo-help-text">*</span></label>
                <input type="file" name="photo" id="fi-photo" class="form-control" required>
            </div>
            <div class="col-md-12 form-group">
                <label for="" class="form-label">Speech</label>
                <textarea class="form-control" name="speech" id="fi-speech"></textarea>
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


<!-- Testomonial Edit modal -->
<div class="modal fade" id="testimonial-edit-modal" tabindex="-1" role="dialog" aria-labelledby="stuffEditModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuffEditModalLabel">Edit Testimonial</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('admin.testimonial.edit')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" class="form-control" id="fi-edit-id" value="0" required>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" id="fi-edit-name" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="" class="form-label">Profession <span class="text-danger">*</span></label>
                <input type="text" name="profession" id="fi-edit-profession" class="form-control" required>
            </div>
            <div class="col-md-12 form-group">
                <label for="" class="form-label">Photo <span class="text-danger" id="photo-help-text">*</span></label>
                <input type="file" name="photo" id="fi-edit-photo" class="form-control">
            </div>
            <div class="col-md-12 form-group">
                <label for="" class="form-label">Speech</label>
                <textarea class="form-control" name="speech" id="fi-edit-speech"></textarea>
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

<!-- Testomonial Delete modal -->
<div class="modal fade" id="testimonial-delete-modal" tabindex="-1" role="dialog" aria-labelledby="stuffModalModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuffModalModalLabel">Delete Testimonial</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('admin.testimonial.delete')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" class="form-control" id="fi-delete-id" value="0" required>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <p>Are sure want to delete ?</p>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection

@push('custom_scripts')
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();

        $(".edit-btn").click(function () {
            $("#fi-edit-id").val($(this).data('id'));
            $("#fi-edit-name").val($(this).data('name'));
            $("#fi-edit-profession").val($(this).data('profession'));
            $("#fi-edit-speech").val($(this).data('speech'));

            $("#testimonial-edit-modal").modal('show');
        });

        $(".delete-btn").click(function () {
            $("#fi-delete-id").val($(this).data('id'));

            $("#testimonial-delete-modal").modal('show');
        });
    } );

</script>
@endpush