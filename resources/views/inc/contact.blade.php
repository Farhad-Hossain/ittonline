<!-- Contact Start -->
<div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-2">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                {{-- <h5 class="fw-bold text-primary text-uppercase">Contact Us</h5> --}}
                <h4 class="mb-0">Let's Help You Become the Best Version of Yourself</h4>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h6 class="mb-2">Call to ask question</h6>
                            <h6 class="text-primary mb-0">{{$appInfo ? $appInfo->mobile_number : ''}}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h6 class="mb-2">Email for free quote</h6>
                            <h6 class="text-primary mb-0">{{$appInfo ? $appInfo->email : ''}}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h6 class="mb-2">Visit our office</h6>
                            <h6 class="text-primary mb-0">{{$appInfo ? $appInfo->short_address : ''}}</h6>
                        </div>
                    </div>
                </div>
            </div>
            @include('inc.quote_in_contact')
            <div class="row g-5">
                {{--
                <div class="alert alert-info d-none" id="contact-msg"></div>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form action="{{route('contact_form')}}" method="POST" id="contact-form">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" placeholder="Your Name" style="height: 55px;" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control border-0 bg-light px-4" placeholder="Your Email" style="height: 55px;" name="email" required>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control border-0 bg-light px-4" placeholder="Subject" style="height: 55px;" name="subject" required>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="Message" name="message" required></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                --}}
                <div id="hidden-iframe-container" class="d-none">
                    {!!$appInfo ? $appInfo->location_google_map_embedded_link : ''!!}
                </div>
                <div class="col-12 wow slideInUp" data-wow-delay="0.6s">
                    <iframe class="position-relative rounded w-100 h-100" id="original-iframe"
                        src=""
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    @push('custom_scripts')
    <script>
        $(document).ready(function (){
            let hidden_iframe = $("#hidden-iframe-container > iframe")[0]
            src = hidden_iframe.attributes.src.value
            $("#original-iframe").attr('src', src)
        });    
    </script>
    @endpush