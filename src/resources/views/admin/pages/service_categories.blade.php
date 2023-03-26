@extends('layouts.admin_master',['title'=>'Admin - Course Categories'])

@push('custom_styles')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endpush

@section('contents')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <span>Course Categories</span>
        <button type="button" class="btn btn-sm btn-primary" style="font-weight: bold;" data-bs-toggle="modal" data-bs-target="#category-add-modal">Add Category</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Parent Category</th>
                        <th>Total Courses</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name ?? ''}}</td>
                        <td>{{$category->parentCategory ? $category->parentCategory->name : '-'}}</td>
                        <th>{{ $category->services()->count() }}</th>
                        <td>
                            <button type="button" class="edit-btn btn btn-primary btn-sm" data-id="{{$category->id}}" data-name="{{$category->name}}" 
                            data-parent_id="{{$category->parentCategory ? $category->parentCategory->id : 0}}">
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

<!-- Category Add / Edit modal -->
<div class="modal fade" id="category-add-modal" tabindex="-1" role="dialog" aria-labelledby="categoryAddModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="categoryAddModalLabel">Create Category</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('admin.course.add_category')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" class="form-control" id="fi-id" value="0" required>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12 form-group">
                <label for="" class="form-label" title="For main Category, Dont change value">Sub Category of <span class="text-danger">(Optional)</span></label>
                <select name="parent_id" id="form-sub-category" class="form-control">
                  <option value="0">--Select a category--</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
            </div>
            <div class="col-md-12 form-group">
                <label for="" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" id="fi-name" required>
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

<!-- Category Edit modal -->
<div class="modal fade" id="category-edit-modal" tabindex="-1" role="dialog" aria-labelledby="categoryEditModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="categoryEditModalLabel">Edit Category</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('admin.course.edit_category')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" class="form-control" id="fi-edit-id" value="0" required>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12 form-group d-none">
                <label for="" class="form-label" title="For main Category, Dont change value">Sub Category of <span class="text-danger">(Optional)</span></label>
                <select name="parent_id" id="fi-edit-parent-category" class="form-control">
                  <option value="" selected>--Select a category--</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
            </div>
            <div class="col-md-12 form-group">
                <label for="" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" id="fi-edit-name" required>
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
@endsection

@push('custom_scripts')
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();

        $(document).on('click', '.edit-btn', function (){
            $("#fi-edit-id").val($(this).data('id'));
            $("#fi-edit-name").val($(this).data('name'));
            $("#fi-edit-parent-category").val($(this).data('parent_id')).change();

            $("#category-edit-modal").modal('show');
        });
    } );
</script>
@endpush