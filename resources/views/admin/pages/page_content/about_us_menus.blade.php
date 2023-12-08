@extends('layouts.admin_master',['title'=>'Admin - About Us Menu Contents'])

@push('custom_styles')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endpush

@section('contents')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <span>About Us Menu List</span>
        <a href="{{route('admin.page_content.about_us_menu_content_update')}}" class="btn btn-sm btn-primary" style="font-weight: bold;">Add Menu Content</a>
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
                                <a href="{{route('admin.page_content.about_us_menu_content_update')}}?id={{$menu->id}}" style="color: white;">
                                    Edit Content
                                </a>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
        } );
</script>
@endpush