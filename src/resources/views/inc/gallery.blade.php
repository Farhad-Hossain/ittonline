<!-- Gallery Start -->
<div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-2">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Gallery</h5>
            <h1 class="mb-0">Our Significant Moments</h1>
        </div>
        <div class="row g-5">
            @foreach($galleryImages as $galleryImage)
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <div class="blog-item bg-light rounded overflow-hidden">
                    
                    <div class="blog-img position-relative overflow-hidden">
                        <img class="img-fluid" src="{{asset($galleryImage->img_url)}}" alt="">
                        {{--
                        <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Web Design and Development</a>
                        --}}
                    </div>
                    <div class="p-4">
                        {{--
                        <div class="d-flex mb-3">
                            <small class="me-3"><i class="far fa-user text-primary me-2"></i>John Doe</small>
                            <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Jan, 2045</small>
                        </div>
                        --}}
                        <h4 class="mb-3">{{ $galleryImage->title }}</h4>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- gallery Start -->