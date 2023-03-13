@extends('layouts.admin_master', ['title'=>'Quotes'])

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
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Mobile no.</th>
                        <th>Email</th>
                        <th>Twitter</th>
                        <th>Facebook</th>
                        <th>Instagram</th>
                        <th>Linkedin</th>
                        <th>Created at</th>
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