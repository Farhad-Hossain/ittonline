@extends('layouts.admin_master', ['title'=>'Trainers'])

@push('custom_styles')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endpush

@section('contents')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <span>Trainer List</span>
        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#stuff-add-modal">Add Trainer</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Mobile no.</th>
                        <th>Email</th>
                        <th>Twitter</th>
                        <th>Facebook</th>
                        <th>Instagram</th>
                        <th>Linkedin</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stuffs as $stuff)
                    <tr>
                        <td>{{$stuff->full_name ?? ''}}</td>
                        <td>{{$stuff->designation ?? ''}}</td>
                        <td>{{$stuff->mobile_number ?? ''}}</td>
                        <td>{{$stuff->email ?? ''}}</td>
                        <td>{{$stuff->twitter ?? ''}}</td>
                        <td>{{$stuff->facebook ?? ''}}</td>
                        <td>{{$stuff->instagram ?? ''}}</td>
                        <td>{{$stuff->linkedin ?? ''}}</td>
                        <td>{{$stuff->created_at->format('Y-m-d, H:i:s')}}</td>
                        <td>
                            <button class="edit-btn btn btn-primary btn-sm" data-full_name="{{$stuff->full_name}}"
                                       data-id="{{$stuff->id}}"
                                       data-designation="{{$stuff->designation}}"
                                       data-mobile_number="{{$stuff->mobile_number}}"
                                       data-email="{{$stuff->email}}"
                                       data-twitter="{{$stuff->twitter}}"
                                       data-facebook="{{$stuff->facebook}}"
                                       data-instagram="{{$stuff->instagram}}"
                                       data-linkedin="{{$stuff->linkedin}}">
                                Edit
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Stuff Add modal -->
<div class="modal fade" id="stuff-add-modal" tabindex="-1" role="dialog" aria-labelledby="stuffAddModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuffAddModalLabel">Create Trainer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('admin.stuff.add')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" class="form-control" id="fi-id" value="0" required>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" id="fi-name" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="" class="form-label">Designation <span class="text-danger">*</span></label>
                <input type="text" name="designation" id="fi-designation" class="form-control" required>
            </div>
            <div class="col-md-12 form-group">
                <label for="" class="form-label">Photo <span class="text-danger" id="photo-help-text">*</span></label>
                <input type="file" name="photo" id="fi-photo" class="form-control" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="" class="form-label">Mobile No.</label>
                <input type="text" name="mobile_no" id="fi-mobile_no" class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" id="fi-email" class="form-control" >
            </div>
            <div class="col-md-6 form-group">
                <label for="" class="form-label">Twitter <small>(Full url)</small></label>
                <input type="text" name="twitter" id="fi-twitter" class="form-control" >
            </div>
            <div class="col-md-6 form-group">
                <label for="" class="form-label">Facebook <small>(Full url)</small></label>
                <input type="text" name="facebook" id="fi-facebook" class="form-control" >
            </div>
            <div class="col-md-6 form-group">
                <label for="" class="form-label">Instagram <small>(Full url)</small></label>
                <input type="text" name="instagram" id="fi-instagram" class="form-control" >
            </div>
            <div class="col-md-6 form-group">
                <label for="" class="form-label">Linkedin <small>(Full url)</small></label>
                <input type="text" name="linkedin" id="fi-linkedin" class="form-control" >
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
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
            $("#fi-id").val($(this).data('id'));
            $("#fi-name").val($(this).data('full_name'));
            $("#fi-designation").val($(this).data('designation'));
            $("#fi-mobile_no").val($(this).data('mobile_number'));
            $("#fi-email").val($(this).data('email'));
            $("#fi-twitter").val($(this).data('twitter'));
            $("#fi-facebook").val($(this).data('facebook'));
            $("#fi-instagram").val($(this).data('instagram'));
            $("#fi-linkedin").val($(this).data('linkedin'));
            
            $("#fi-photo").attr('required', false);
            $("#photo-help-text").html('');
            $("#stuffAddModalLabel").text('Edit Stuff Info');

            $("#stuff-add-modal").modal('show');
        });
    } );

</script>
@endpush