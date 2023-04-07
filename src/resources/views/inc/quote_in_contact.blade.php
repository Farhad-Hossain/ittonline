<!-- Quote Start -->
<div class="wow fadeInUp" data-wow-delay="0.1s">
    <div class="py-5">
        <div class="row g-5">
            <div class="col-sm-12 col-lg-5 quick-inquiry-image">
                {{--
                <div class="section-title position-relative pb-3 mb-5">
                    <h5 class="fw-bold text-primary text-uppercase">Get a quote</h5>
                    <h1 class="mb-0">{{$contentQuote ? $contentQuote->heading_line : ''}}</h1>
                </div>
                <div class="row gx-3">
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                        <h5 class="mb-4"><i class="fa fa-reply text-primary me-3"></i>Reply within 24 hours</h5>
                    </div>
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                        <h5 class="mb-4"><i class="fa fa-phone-alt text-primary me-3"></i>24 hrs telephone support</h5>
                    </div>
                </div>
                <p class="mb-4">{!! $contentQuote ? $contentQuote->short_description : '' !!}</p>
                <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2">Call to ask any question</h5>
                        <h4 class="text-primary mb-0">{{$appInfo ? $appInfo->mobile_number : ''}}</h4>
                    </div>
                </div>
                --}}
                <img src="{{asset($contentQuote ? $contentQuote->image : '')}}" alt=""  style="height: 100%; width: 100%; border-radius: 5px;">
            </div>
            <div class="col-sm-12 col-lg-7">
            <div class="">
                <h3>Quick Inquiry</h3>
            </div>
                <div class="alert alert-info d-none" id="contact-msg"></div>
                <div class="col-12 wow slideInUp" data-wow-delay="0.3s">
                    <form action="{{route('contact_form')}}" method="POST" id="contact-form">
                        <div class="row g-3">
                            <div class="col-sm-12 col-md-6">
                                <input type="text" class="form-control border-1 bg-light px-4" placeholder="Your Full Name" style="height: 55px;" name="name" required>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <input type="email" class="form-control border-1 bg-light px-4" placeholder="Your Email" style="height: 55px;" name="email" required>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <input type="text" class="form-control border-1 bg-light px-4" placeholder="Contact No" style="height: 55px;" name="mobile_no" required>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <input type="text" class="form-control border-1 bg-light px-4" placeholder="Subject" style="height: 55px;" name="subject" required>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-1 bg-light px-4 py-3" rows="3" placeholder="Message" name="message" required></textarea>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <button class="btn btn-primary w-100 py-3 contact-submit-btn" type="submit">Inquire Now</button>
                            </div>
                        </div>
                    </form>
                </div>
                {{--
                <div class="bg-primary rounded h-100 d-flex align-items-top p-5 wow zoomIn" data-wow-delay="0.9s">
                    <form action="{{route('quote_form')}}" method="POST" id="quote-request-form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-xl-12">
                                <input type="text" class="form-control bg-light border-0" name="name" placeholder="Your Name" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <input type="email" class="form-control bg-light border-0" name="email" placeholder="Your Email" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control bg-light border-0" name="service_name" placeholder="Service name">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control bg-light border-0" rows="3" name="message" placeholder="Message"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-dark w-100 py-3" type="submit" id="quote-request-btn">Request A Quote</button>
                            </div>
                        </div>
                    </form>
                </div>
                --}}
            </div>
        </div>
    </div>
</div>
<!-- Quote End -->