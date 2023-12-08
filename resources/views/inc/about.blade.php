<!-- About Start -->

<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">About Us</h5>
                        <h2 class="mb-0">{{$contentAbout ? $contentAbout->heading_line : ''}}</h2>
                    </div>
                    <p class="mb-4 mt-0 pt-0">
                        @if ( route('about')==url()->full() )
                        {!! $contentAbout ? $contentAbout->short_description : '' !!}
                        @else
                        {{ mb_substr(strip_tags($contentAbout ? $contentAbout->short_description : ''), 0, 250) }} . . .
                        <br class="m-0 p-0" />
                        <a class="text-uppercase" href="{{route('about')}}">Read More <i class="bi bi-arrow-right"></i></a>
                        @endif
                        
                        
                    </p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Award Winning</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Professional Trainers</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>24/7 Support</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Fair Prices</h5>
                        </div>
                    </div>
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
                <div class="col-lg-5 ml-0" style="max-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="w-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{asset($contentAbout ? $contentAbout->right_side_photo : '')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->