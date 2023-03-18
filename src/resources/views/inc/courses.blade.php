<!-- Blog Start -->
<div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-2">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Our Courses</h5>
            <h1 class="mb-0">Get your valuable course from us</h1>
        </div>
        <div class="row g-5">
            @foreach($courses as $course)
            @if($loop->index == 6) @break @endif

            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <div class="blog-item bg-light rounded overflow-hidden">
                    
                    <div class="blog-img position-relative overflow-hidden">
                        <img class="img-fluid" src="{{asset($course->thumbnail)}}" alt="">
                        {{--
                        <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Web Design and Development</a>
                        --}}
                    </div>
                    <div class="p-4">
                        {{--
                        <div class="d-flex mb-3">
                            <small class="me-3"><i class="far fa-user text-primary me-2"></i>John Doe</small>
                            <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Jan, 2045</small>
                        </div>
                        --}}
                        <h4 class="mb-3">{{ $course->course_title }}</h4>
                        <p>{{ mb_substr(strip_tags($course->course_details), 0, 80) }} . . .</p>
                        <a class="text-uppercase" href="{{route('course_details', [$course->id,])}}">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Blog Start -->