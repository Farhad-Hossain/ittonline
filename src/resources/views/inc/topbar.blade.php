<!-- Topbar Start -->
<div class="container-fluid bg-dark px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>{{$appInfo ? $appInfo->short_address : ''}}</small>
                <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>{{$appInfo->mobile_number}}</small>
                <small class="text-light"><i class="fa fa-envelope-open me-2"></i>{{$appInfo->email}}</small>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="{{$appInfo ? $appInfo->twitter : ''}}"><i class="fab fa-twitter fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="{{$appInfo ? $appInfo->facebook : ''}}"><i class="fab fa-facebook-f fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="{{$appInfo ? $appInfo->linnkedin : ''}}"><i class="fab fa-linkedin-in fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="{{$appInfo ? $appInfo->youtube : ''}}"><i class="fab fa-youtube fw-normal"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->