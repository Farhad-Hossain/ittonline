<!-- Contact Start -->
<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-3">
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
            <div class="row g-5">
                <div class="col-12 alert alert-info d-none" id="contact-msg"></div>
                <div class="col-12 wow slideInUp" data-wow-delay="0.3s">
                    <form action="{{route('contact_form')}}" method="POST" id="contact-form">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control border-1 bg-light px-4" placeholder="Your Full Name" style="height: 55px;" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control border-1 bg-light px-4" placeholder="Your Email" style="height: 55px;" name="email" required>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control border-1 bg-light px-4" placeholder="Subject" style="height: 55px;" name="subject" required>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-1 bg-light px-4 py-3" rows="4" placeholder="Message" name="message" required></textarea>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <button class="btn btn-primary w-100 py-3 contact-submit-btn" type="submit">Inquery Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    @push('custom_scripts')
    <script>
        $(document).ready(function (){
            
        });    
    </script>
    @endpush