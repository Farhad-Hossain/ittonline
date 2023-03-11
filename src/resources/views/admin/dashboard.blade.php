@extends('layouts.admin_master', ['title'=>'Dashboard'])

@section('contents')
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 border-primary border-start border-0 border-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Total Contacts</p>
                            <h4 class="my-1 text-primary">845</h4>
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
                        <div>
                            <p class="mb-0">Total Quote</p>
                            <h4 class="my-1 text-success">45</h4>
                        </div>
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
                        <div>
                            <p class="mb-0">Total Courses</p>
                            <h4 class="my-1 text-success">25</h4>
                        </div>
                        <div class="text-success ms-auto font-35">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection