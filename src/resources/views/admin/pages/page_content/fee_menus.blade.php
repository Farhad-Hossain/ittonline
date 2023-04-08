@extends('layouts.admin_master',['title'=>'Admin - Fee Menu Contents'])

@push('custom_styles')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endpush

@section('contents')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <span>Fee Menu List</span>
        <a href="{{route('admin.page_content.fee_menu_content_update')}}" class="btn btn-sm btn-primary" style="font-weight: bold;">Add Menu Content</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Menu Name</th>  
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                    <tr>
                        <td>{{$menu->menu_name ?? ''}}</td>
                        <td>
                            <button class="btn btn-sm btn-primary">
                                <a href="{{route('admin.page_content.fee_menu_content_update')}}?id={{$menu->id}}" style="color: white;">
                                    Edit Content
                                </a>
                            </button>
                            <button class="btn btn-sm btn-danger delete-btn" data-id="{{$menu->id}}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Course Delete modal -->
<div class="modal fade" id="course-delete-modal" tabindex="-1" role="dialog" aria-labelledby="courseDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="courseDeleteModalLabel">Delete Menu ?</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('admin.page_content.fee_menu_delete')}}" method="POST" enctype="multipart/form-data">
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
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
        $(document).on('click', '.delete-btn', function () {
            $("#fi-delete-id").val($(this).data('id'));
            $("#course-delete-modal").modal('show');
        })
    } );
</script>
@endpush