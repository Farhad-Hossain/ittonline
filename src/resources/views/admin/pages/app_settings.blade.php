@extends('layouts.admin_master', ['title'=>'App Setting'])

@section('contents')
<div class="row">
    <div class="col col-lg-9 mx-auto">
        <div class="card radius-10">
            <div class="card-body">
                <div>
                    <h5 class="card-title">Basic Examples</h5>
                </div>
                <hr/>
                <form action="{{route('admin.app_setup')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Application Name</label>
                            <input type="text" class="form-control" name='app_name' value="{{$basicInfo ? $basicInfo['app_name'] : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Mobile number</label>
                            <input type="text" class="form-control" name='mobile_no' value="{{$basicInfo ? $basicInfo['mobile_number'] : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control" name='email' value="{{$basicInfo ? $basicInfo['email'] : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Logo</label>
                            <input type="file" class="form-control" name='logo'>
                        </div>
                    </div>
                    <div>
                        <h5 class="card-title mt-4">Social Links</h5>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Facebook</label>
                            <input type="text" class="form-control" name="facebook" value="{{$basicInfo ? $basicInfo['facebook'] : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Twitter</label>
                            <input type="text" class="form-control" name="twitter" value="{{$basicInfo ? $basicInfo['twitter'] : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Linkedin</label>
                            <input type="text" class="form-control" name="linkedin" value="{{$basicInfo ? $basicInfo['linkedin'] : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Youtube</label>
                            <input type="text" class="form-control" name="youtube" value="{{$basicInfo ? $basicInfo['youtube'] : ''}}">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary" style="min-width: 100px;">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection