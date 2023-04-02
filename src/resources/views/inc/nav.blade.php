<nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
    <div class="container">
        <a href="{{route('welcome')}}" class="navbar-brand p-0">
            <img src="{{asset($appInfo ? $appInfo->logo_url : '')}}" style="max-height: 50px;" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{route('welcome')}}" class="nav-item nav-link {{route('welcome')==url()->full() ? 'active' : '' }}">Home</a>
                <a href="{{route('about')}}" class="nav-item nav-link {{route('about')==url()->full() ? 'active' : '' }}" >About Us</a>

                <li class="nav-item dropdown">
                    <a href="{{route('courses')}}" class="nav-link nav-item dropdown-toggle {{route('courses')==url()->full() ? 'active' : '' }}" data-bs-toggle="dropdown">Courses</a>
                    <ul class="dropdown-menu m-0">
                        @foreach($courses as $course)
                            @if($course->is_category)
                            <li>
                                <a href="#" class="dropdown-item">
                                    <span>{{$course->course_title}}</span><span style="position:absolute; right: 7px;">&raquo;</span>
                                </a>
                                <ul class="dropdown-menu dropdown-submenu">
                                    @foreach($course->courses as $subCourse)
                                    <li>
                                        <a href="{{route('course_details', [$subCourse->id,])}}" class="dropdown-item">
                                            <span>{{$subCourse->course_title}}</span> 
                                        </a>
                                    </li>
                                    @endforeach
                                </ul> 
                            </li>
                            @elseif($course->category_id < 1)
                                <li><a href="{{route('course_details', [$course->id,])}}" class="dropdown-item">{{$course->course_title}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                <a href="{{route('team')}}" class="nav-item nav-link {{route('team')==url()->full() ? 'active' : '' }}">Our Team</a>
                <a href="{{route('quote')}}" class="nav-item nav-link {{route('quote')==url()->full() ? 'active' : '' }}">Free Quote</a>
                <div class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle {{route('gallery')==url()->full() ? 'active' : '' }}" data-bs-toggle="dropdown">Gallery</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{route('gallery')}}" class="dropdown-item">Events</a> 
                    </div>
                </div>
                
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
                
            </div>
            <a href="{{route('contact')}}" class="btn btn-primary py-2 px-4 ms-3">Contact Us</a>
            {{-- <a href="{{route('quote')}}" class="btn btn-primary py-2 px-4 ms-3">Free Quote</a> --}}
        </div>
    </div>
</nav>