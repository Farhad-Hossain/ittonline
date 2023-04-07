<!-- Course details Start -->
<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-1">
        <div class="row g-5">
            <div class="col-sm-12 text-justify">
                @if($training->thumbnail)
                    <div class="text-center">
                        <img src="{{asset($training ? $training->thumbnail : '')}}" alt="" style="max-width: 100%;">
                    </div>
                @endif
                <p class="mb-4">
                    {!! $training ? $training->training_details : '' !!}
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Course Details End -->