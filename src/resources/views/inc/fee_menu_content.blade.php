<!-- About us menu details Start -->
<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-1">
        <div class="row g-5">
            <div class="col-sm-12 text-justify">
                @if($feeMenu->image)
                    <div class="text-center">
                        <img src="{{asset($feeMenu ? $feeMenu->image : '')}}" alt="" style="max-width: 100%;">
                    </div>
                @endif
                <p class="mb-4">
                    {!! $feeMenu ? $feeMenu->short_description : '' !!}
                </p>
            </div>
        </div>
    </div>
</div>
<!-- About us menu Details End -->