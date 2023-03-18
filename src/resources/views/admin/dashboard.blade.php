@extends('layouts.admin_master', ['title'=>'Dashboard'])

@section('contents')
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 border-primary border-start border-0 border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <a href="{{route('admin.contacts')}}" class="text-dark">
                                <p class="mb-0">Total Contacts</p>
                                <h4 class="my-1 text-primary">
                                {{sprintf("%02d",$totalContacts)}}
                                </h4>
                            </a>
                        </div>
                        <div class="text-primary ms-auto font-35">{{-- <i class="bx bx-cart-alt"></i> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-success border-start border-0 border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <a href="{{route('admin.quotes')}}" class="text-dark">
                            <div>
                                <p class="mb-0">Total Quotes</p>
                                <h4 class="my-1 text-success">{{sprintf("%02d", $totalQuotes)}}</h4>
                            </div>
                        </a>
                        <div class="text-success ms-auto font-35">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-success border-start border-0 border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <a href="{{route('admin.course.all')}}" class="text-dark">
                            <div>
                                <p class="mb-0">Total Courses</p>
                                <h4 class="my-1 text-success">{{ sprintf("%02d", $totalCourses) }}</h4>
                            </div>
                            <div class="text-success ms-auto font-35">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-success border-start border-0 border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <a href="{{route('admin.stuffs')}}" class="text-dark">
                            <div>
                                <p class="mb-0">Total Trainers</p>
                                <h4 class="my-1 text-success">{{ sprintf("%02d", $totalTrainers) }}</h4>
                            </div>
                            <div class="text-success ms-auto font-35">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection