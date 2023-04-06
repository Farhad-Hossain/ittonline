<!-- Navbar Start -->
<div class="container-fluid position-relative p-0">
    @include('inc.nav')
    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 50px;">
        <div class="row pb-2">
            <div class="col-12 pt-lg-2 mt-lg-2 text-center">
                <h4 class="display-6 text-white animated zoomIn">{{$title}}</h4>
                {{--
                <a href="{{route('welcome')}}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="{{$currentUrl}}" class="h5 text-white">{{$nav_title}}</a>
                --}}
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->