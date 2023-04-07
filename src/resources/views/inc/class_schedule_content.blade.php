<!-- About us menu details Start -->
<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="g-5">
            <div class="">
                <img src="{{asset($classScheduleMenu ? $classScheduleMenu->image : '')}}" alt="" style="width: 100%;">
                <p class="mb-4">
                    {!! $classScheduleMenu ? $classScheduleMenu->content : '' !!}
                </p>
            </div>
        </div>
    </div>
</div>
<!-- About us menu Details End -->