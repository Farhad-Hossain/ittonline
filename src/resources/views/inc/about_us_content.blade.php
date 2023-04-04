<!-- About us menu details Start -->
<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-12">
                <div class="section-title position-relative pb-3 mb-5">
                    <h5 class="fw-bold text-primary text-uppercase">{{$aboutUsMenu ? $aboutUsMenu->menu_name : ''}}</h5>
                </div>
                <p class="mb-4">
                    {!! $aboutUsMenu ? $aboutUsMenu->short_description : '' !!}
                </p>
            </div>
        </div>
    </div>
</div>
<!-- About us menu Details End -->