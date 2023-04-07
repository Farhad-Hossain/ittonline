<!-- Start::Team -->
<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-3">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Team Members</h5>
            <h1 class="mb-0">Our Professional Trainers </h1>
        </div>
        <div class="row g-5">
            @foreach($stuffs as $stuff)
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{asset($stuff->photo)}}" alt="" style="max-height: 350px;">
                        <div class="team-social">
                            <a class="btn btn-primary  rounded" target="_blank" href="{{$stuff->twitter}}"><i class="fab fa-twitter fw-normal"></i></a>
                            <a class="btn btn-primary  rounded" target="_blank" href="{{$stuff->facebook}}"><i class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-primary  rounded" target="_blank" href="{{$stuff->instagram}}"><i class="fab fa-instagram fw-normal"></i></a>
                            <a class="btn btn-primary  rounded" target="_blank" href="{{$stuff->linkedin}}"><i class="fab fa-linkedin-in fw-normal"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4" style="border:1px solid lightgrey; border-top: 0px;">
                        <h4 class="text-primary">{{$stuff->full_name}}</h4>
                        <p class="text-uppercase m-0">{{$stuff->designation}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End::Team  -->