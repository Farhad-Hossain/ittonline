<!-- Navbar Start -->
<div class="container-fluid position-relative p-0">
    @include('inc.nav')
    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">{{$title}}</h1>
                <a href="{{route('welcome')}}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="{{$currentUrl}}" class="h5 text-white">{{$nav_title}}</a>
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->