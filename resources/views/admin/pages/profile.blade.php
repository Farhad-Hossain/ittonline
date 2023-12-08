@extends('layouts.admin_master', ['title'=>'Profile Setting'])

@section('contents')
<div class="row">
    <div class="col col-lg-9 mx-auto">
        <div class="card radius-10">
            <div class="card-body">
                <div>
                    <h5 class="card-title">Profile Setting</h5>
                </div>
                <hr/>
                <form action="{{route('admin.profile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name='name' value="{{auth()->user() ? auth()->user()->name : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control" name='email' value="{{auth()->user()->email}}" readonly>
                        </div>
                        
                    </div>
                    
                    <div class="row mt-4">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary" style="min-width: 100px;">Save</button>
                        </div>
                    </div>
                </form>

                <hr />
                <div>
                    <h5 class="">Change Password</h5>
                </div>
                <hr/>
                <form action="{{route('admin.change_password')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="" class="form-label">Current Password</label>
                            <input type="password" class="form-control" name='current_password'>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="form-label">New Password</label>
                            <input type="password" class="form-control" name='new_password'>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-danger" style="min-width: 100px;">Change Password</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection