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
                        <th>Email</th>
                        <th>Service</th>
                        <th>Message</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotes as $quote)
                    <tr>
                        <td>{{$quote->name ?? ''}}</td>
                        <td>{{$quote->email ?? ''}}</td>
                        <td>{{$quote->service_name}}</td>
                        <td>{{$quote->message}}</td>
                        <td>{{$quote->created_at->format('Y-m-d, H:i:s')}}</td>
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