<div class="container-fluid position-relative p-0">
    @include('inc.nav')
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" style="">
        <div class="container py-3">
        <div class="carousel-inner">
            @if ($sliders)
                @foreach($sliders as $slider)
                <div class="carousel-item {{$loop->index==0 ? 'active' : ''}}">
                    <img class="w-100" src="{{asset($slider->image_url)}}" style="max-height: 480px; border-radius: 2px;" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        
                        <div class="p-3" style="max-width: 100%;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">{{$slider->secondary_title ?? ''}}</h5>
                            <h3 class="display-4 text-white mb-md-4 animated zoomIn">{{$slider->primary_title ?? ''}}</h3>
                            {{--
                            <a href="{{route('quote')}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free Quote</a>
                            <a href="{{route('contact')}}" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                            --}}
                        </div>
                    </div>
                </div>        
                @endforeach
            @else
            <div class="carousel-item {{'active'}}">
                <img class="w-100" src="https://picsum.photos/200/300.jpg" style="max-height: 480px;" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">{{$appInfo?$appInfo->app_name:'Slider picture needed'}}</h5>
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">Add some slider pictures please</h1>
                        <a href="{{route('quote')}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free Quote</a>
                        <a href="{{route('contact')}}" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    </div>
</div>