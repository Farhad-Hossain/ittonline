@extends('layouts.admin_master',['title'=>'Admin - All Courses'])

@push('custom_styles')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endpush

@section('contents')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Course Title</th>
                        <th>Starting Date</th>
                        <th>Duration(In hours)</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{$course->course_title ?? ''}}</td>
                        <td>{{$course->starting_date ?? ''}}</td>
                        <td>{{$course->total_hour}}</td>
                        <td>{{$course->created_by}}</td>
                        <td>
                            <a href="{{route('admin.course.save')}}?course_id={{$course->id}}" class="btn btn-sm btn-primary">Edit</a>
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