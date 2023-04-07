<!-- Quote Start -->
<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
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
                <img src="data:image/jpeg;base64,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" alt=""  style="height: 100%; width: 100%; border-radius: 5px;">
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