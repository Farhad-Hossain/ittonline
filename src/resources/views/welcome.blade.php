@extends('layouts.master')
@push('carousel')
@include('inc.carousel')
@endpush
@section('contents')
    <!-- Facts Start -->
    <div class="container-fluid facts pt-4 pt-lg-0">
        <div class="container mt-4 pt-lg-0">
            <div class="row gx-0">
                <div class="col-sm-12 col-md-9 wow zoomIn d-flex align-items-stretch home-facts-first-part" data-wow-delay="0.1s" >
                    <div class="bg-primary shadow p-5 text-light" style="border-radius: 11px;">
                        <h2>{{$appInfo ? $appInfo->app_name : ''}}</h2>
                        <p style="text-align: justify;">{{ mb_substr(strip_tags($contentAbout ? $contentAbout->short_description : ''), 0, 600) }}</p>
                        <br class="m-0 p-0" />
                        <p class="py-2">
                            <a class="btn btn-light text-dark" href="{{route('about')}}">
                                Read More
                            </a>
                            &nbsp; &nbsp;
                            <button type="button" class="btn btn-outline-light btn-rounded">
                                    {{$appInfo ? $appInfo->mobile_number : ''}}
                            </button>
                        </p>
                        <p><h3>Modes of Training</h3></p>
                        <p style="height: 43px;">
                            <span style="padding-right: 50px;" >
                            <img src="https://www.corvit.com/systems/wp-content/uploads/2023/03/class-room-mode.png" alt="" style="height: 100%;">Classroom
                            </span>

                            <span style="padding-right: 50px;">
                            <img src="https://www.corvit.com/systems/wp-content/uploads/2023/03/one-to-one.png" alt="" style="height: 100%;">One-To-One
                            </span>

                            {{--
                            <span style="padding-right: 50px;">
                                <img src="https://www.corvit.com/systems/wp-content/uploads/2023/03/on-site-mode.png" alt="" style="height: 100%;">Customer Premises
                            </span>
                            --}}

                            <span>
                                <img src="https://www.corvit.com/systems/wp-content/uploads/2023/03/15.png" alt="" style="height: 100%;">Online / E-Learning
                            </span>
                            
                        </p>

                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 wow zoomIn d-flex align-items-stretch order-sm-first order-md-last" data-wow-delay="0.3s">
                    <div class="bg-light shadow p-2 w-100" style="border-radius: 11px;">
                        <h3 class="pt-3 mt-3 underline"> || Latest Offers</h3>
                        <marquee onmouseover="this.start();" onmouseout="this.stop();" direction="up" scrolldelay="150" style="max-height: 250px;">
                            <strong>Free Microsoft Azure With CCNA</strong><br>
                            -Online / On-Campus<br>
                            -Schedule 29th Mar 5:00PM<br>
                            <strong>Free Cisco Firewall with CCNP</strong><br>
                            -Schedule 3rd Apr  5:00PM<br>
                            -Instructor : Haroon Malik<br>
                            <strong>Free Microsoft Azure With CCNA</strong><br>
                            -Online / On-Campus<br>
                            -Schedule 29th Mar 5:00PM<br>
                            <strong>Free Cisco Firewall with CCNP</strong><br>
                            -Schedule 3rd Apr  5:00PM<br>
                            -Instructor : Haroon Malik<br>
                            <strong>Free Microsoft Azure With CCNA</strong><br>
                            -Online / On-Campus<br>
                            -Schedule 29th Mar 5:00PM<br>
                            <strong>Free Cisco Firewall with CCNP</strong><br>
                            -Schedule 3rd Apr  5:00PM<br>
                            -Instructor : Haroon Malik<br>
                            <strong>Free Microsoft Azure With CCNA</strong><br>
                            -Online / On-Campus<br>
                            -Schedule 29th Mar 5:00PM<br>
                            <strong>Free Cisco Firewall with CCNP</strong><br>
                            -Schedule 3rd Apr  5:00PM<br>
                            -Instructor : Haroon Malik<br>
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts Start -->
    {{-- @include('inc.about') --}}
    <!-- Features Start -->
    <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Why Choose Us</h5>
                <h1 class="mb-0 d-sm-none">We Are Here to Grow Your Skills Exponentially</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-cubes text-white"></i>
                            </div>
                            <h4>Best In Training Industry</h4>
                            <p class="mb-0">{{$whyChooseUs ? $whyChooseUs->content_best_it_training_industry : ''}}</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.6s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-award text-white"></i>
                            </div>
                            <h4>Award Winning</h4>
                            <p class="mb-0">{{$whyChooseUs ? $whyChooseUs->content_award_winning : ''}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="{{asset($whyChooseUs ? $whyChooseUs->middle_photo : '')}}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.4s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-users-cog text-white"></i>
                            </div>
                            <h4>Professional Trainers</h4>
                            <p class="mb-0">{{$whyChooseUs ? $whyChooseUs->content_professional_trainers : ''}}</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.8s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <h4>24/7 Support</h4>
                            <p class="mb-0">{{$whyChooseUs ? $whyChooseUs->content_support : ''}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features Start -->
    @include('inc.courses')
    
    @include('inc.quote')
    @include('inc.team')
    @include('inc.testimonials')
    
    {{--
    <!-- Vendor Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 mb-5">
            <div class="bg-white">
                <div class="owl-carousel vendor-carousel">
                    <img src="{{asset('assets/img/vendor-1.jpg')}}" alt="">
                    <img src="img/vendor-2.jpg" alt="">
                    <img src="img/vendor-3.jpg" alt="">
                    <img src="img/vendor-4.jpg" alt="">
                    <img src="img/vendor-5.jpg" alt="">
                    <img src="img/vendor-6.jpg" alt="">
                    <img src="img/vendor-7.jpg" alt="">
                    <img src="img/vendor-8.jpg" alt="">
                    <img src="img/vendor-9.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
    --}}
@endsection