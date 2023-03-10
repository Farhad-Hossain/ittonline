<!-- Navbar Start -->
<div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="{{route('welcome')}}" class="navbar-brand p-0">
                <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>{{$appInfo ? $appInfo->app_name : ''}}</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{route('welcome')}}" class="nav-item nav-link active">Home</a>
                    <a href="{{route('about')}}" class="nav-item nav-link">About</a>
                    <a href="{{route('courses')}}" class="nav-item nav-link">Courses</a>
                    <a href="service.html" class="nav-item nav-link">Free Quote</a>
                    {{--
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
                        <div class="dropdown-menu m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="price.html" class="dropdown-item">Pricing Plan</a>
                            <a href="feature.html" class="dropdown-item">Our features</a>
                            <a href="team.html" class="dropdown-item">Team Members</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="quote.html" class="dropdown-item">Free Quote</a>
                        </div>
                    </div>
                    --}}
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                <a href="" class="btn btn-primary py-2 px-4 ms-3">Free Quote</a>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">{{$navbar ? $navbar['title'] : ''}}</h1>
                    <a href="{{route('welcome')}}" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="{{$navbar ? $navbar['link']['link'] : ''}}" class="h5 text-white">{{$navbar ? $navbar['link']['text'] : ''}}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->