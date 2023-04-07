<!-- Course details Start -->
<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-sm-12 text-justify" style="text-align: justify;">
                <div class="section-title position-relative pb-3 mb-5">
                    <h5 class="fw-bold text-primary text-uppercase">Training Details</h5>
                </div>
                <p class="mb-4">
                    {!! $training ? $training->training_details : '' !!}
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Course Details End -->