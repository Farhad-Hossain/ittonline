@extends('layouts.admin_master',['title'=>'Admin - Contact'])

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
                        <th>Mobile No</th>
                        <th>Service</th>
                        <th>Message</th>    
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->name ?? ''}}</td>
                        <td>{{$contact->email ?? ''}}</td>
                        <td>{{$contact->mobile_no}}</td>
                        <td>{{$contact->subject}}</td>
                        <td title="{{$contact->message}}">
                            <button data-message="{{$contact->message}}" class="btn btn-sm btn-info td-content-details-btn">See Message</button>
                        </td>
                        <td>{{$contact->created_at->format('Y-m-d, H:i:s')}}</td>
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