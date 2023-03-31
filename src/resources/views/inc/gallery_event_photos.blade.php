<!-- Gallery Start -->
<div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-2">
        {{--
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">{{ $galleryEvent->event_name }}</h5>
        </div>
        --}}
        <div class="row g-5">
            @foreach($galleryEvent->images as $photo)
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <div class="blog-item bg-light rounded overflow-hidden gallery-img-container"  
                data-img_link="{{asset($photo->img_url)}}"  
                >
                    <div class="blog-img position-relative overflow-hidden">
                        <img class="img-fluid" src="{{asset($photo->img_url)}}" alt="" >
                    </div>
                    <div class="p-2">
                        <div class="d-flex">
                            <small class="me-3">{{$photo->title}}</small>
                        </div>  
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- gallery End -->