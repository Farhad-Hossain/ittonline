<!-- Gallery Start -->
<div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-2">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Gallery</h5>
            <h1 class="mb-0">Our Significant Moments</h1>
        </div>
        <div class="row g-5">
            @foreach($galleryEvents as $galleryEvent)
           
            
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <a href="{{route('gallery')}}?event={{$galleryEvent->event_name}}">
                <div class="blog-item bg-light rounded overflow-hidden">
                    
                    <div class="blog-img position-relative overflow-hidden">
                        <img class="img-fluid" src="{{asset($galleryEvent->feature_photo)}}" alt="">
                        <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4">
                            {{$galleryEvent->event_name}}
                        </a>
                    </div>
                </div>
                </a>
            </div>
            
            @endforeach
        </div>
    </div>
</div>
<!-- gallery Start -->