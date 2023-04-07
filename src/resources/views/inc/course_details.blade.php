<!-- Course details Start -->
<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-7 text-justify" style="text-align: justify;">
                <div class="section-title position-relative pb-3 mb-5">
                    <h5 class="fw-bold text-primary text-uppercase">Course Details</h5>
                    {{-- <h1 class="mb-0">{{$course ? $course->course_title : ''}}</h1> --}}
                </div>
                <p class="mb-4">
                    {!! $course ? $course->course_details : '' !!}
                </p>
            </div>
            <div class="col-lg-5" >
                <h4>Duration : {{$course->total_hours}} Months</h4>
                <div class="position-relative h-100">
                    <img class="w-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{asset($course ? $course->thumbnail : '')}}" style="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Course Details End -->