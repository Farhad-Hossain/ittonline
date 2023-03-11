<nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="{{route('welcome')}}" class="navbar-brand p-0">
                <h1 class="m-0">{{$appInfo ? $appInfo->app_name : ''}}</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{route('welcome')}}" class="nav-item nav-link {{route('welcome')==url()->full() ? 'active' : '' }}">Home</a>
                    <a href="{{route('about')}}" class="nav-item nav-link {{route('about')==url()->full() ? 'active' : '' }}" >About</a>
                    <a href="{{route('courses')}}" class="nav-item nav-link {{route('courses')==url()->full() ? 'active' : '' }}">Courses</a>
                    <a href="{{route('quote')}}" class="nav-item nav-link {{route('quote')==url()->full() ? 'active' : '' }}">Free Quote</a>
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
                    <a href="{{route('contact')}}" class="nav-item nav-link {{route('contact')==url()->full() ? 'active' : '' }}">Contact</a>
                </div>
                <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                <a href="{{route('quote')}}" class="btn btn-primary py-2 px-4 ms-3">Free Quote</a>
            </div>
        </nav>