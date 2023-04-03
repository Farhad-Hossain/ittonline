<!-- Topbar Start -->
<div class="container-fluid bg-dark px-5 d-none d-lg-block">
    <div class="container">
    <div class="row gx-0">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <small class="me-3 text-light"><b>Opening Hours :</b> {{$appInfo ? $appInfo->opening_hours_text : ''}} </small>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>
                   <a href="tel:{{$appInfo ? $appInfo->mobile_number : ''}}" style="color: inherit;"> 
                        {{$appInfo ? $appInfo->mobile_number : ''}} 
                    </a>
                </small>
                <small class="text-light"><i class="fa fa-envelope-open me-2"></i>
                <a href="mailto:{{$appInfo ? $appInfo->email : ''}}" style="color: inherit;"> 
                    {{$appInfo ? $appInfo->email : ''}} 
                </a>
                </small>
                <small class="text-light">&nbsp; &nbsp;</small>
                {{-- <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="{{$appInfo ? $appInfo->twitter : ''}}"><i class="fab fa-twitter fw-normal"></i></a> --}}
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="{{$appInfo ? $appInfo->facebook : ''}}"><i class="fab fa-facebook-f fw-normal"></i></a>
                {{-- <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="{{$appInfo ? $appInfo->linnkedin : ''}}"><i class="fab fa-linkedin-in fw-normal"></i></a> --}}
                {{-- <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="{{$appInfo ? $appInfo->youtube : ''}}"><i class="fab fa-youtube fw-normal"></i></a> --}}
            </div>
        </div>
    </div>
    </div>
</div>
<!-- Topbar End -->