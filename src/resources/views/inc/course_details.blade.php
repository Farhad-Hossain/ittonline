<!-- Course details Start -->
<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-title position-relative pb-3 mb-5">
                    <h5 class="fw-bold text-primary text-uppercase">Course Details</h5>
                    {{-- <h1 class="mb-0">{{$course ? $course->course_title : ''}}</h1> --}}
                </div>
                <p class="mb-4">
                    {!! $course ? $course->course_details : '' !!}
                </p>
                <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2">Call to ask any question</h5>
                        <h4 class="text-primary mb-0">{{$appInfo ? $appInfo->mobile_number : ''}}</h4>
                    </div>
                </div>
                <a href="{{route('quote')}}" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Request A Quote</a>
            </div>
            <div class="col-lg-5" >
                <h4>Duration : {{$course->total_hours}} Months</h4>
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{asset($course ? $course->thumbnail : '')}}" style="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Course Details End -->