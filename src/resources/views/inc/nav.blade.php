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
                <li class="nav-item dropdown">
                    <a href="{{route('about')}}" class="nav-link nav-item dropdown-toggle {{route('about')==url()->full() ? 'active' : '' }}" data-bs-toggle="dropdown">About Us</a>
                    <ul class="dropdown-menu m-0">
                        @if( $about_us_menus != null )
                        @foreach($about_us_menus as $menu)
                            <li><a href="{{route('about_us_menu', $menu->menu_slug)}}" class="dropdown-item">{{$menu->menu_name}}</a></li>
                        @endforeach
                        @endif
                        <li><a href="{{route('testimonials')}}" class="dropdown-item">Testimonials</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a href="{{route('courses')}}" class="nav-link nav-item dropdown-toggle {{route('courses')==url()->full() ? 'active' : '' }}" data-bs-toggle="dropdown">Courses</a>
                    <ul class="dropdown-menu m-0">
                        @foreach($courses as $course)
                            @if($course->is_category)
                            <li>
                                <a href="#" class="dropdown-item">
                                    <span>{{$course->course_title}}</span>&nbsp; &nbsp;<span style="position:absolute; right: 7px;">&raquo;</span>
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

                <li class="nav-item dropdown">
                    <a href="" class="nav-link nav-item dropdown-toggle" data-bs-toggle="dropdown">Class Schedule</a>
                    <ul class="dropdown-menu m-0">
                        @if( $class_schedule_menus && $class_schedule_menus != null )
                        @foreach($class_schedule_menus as $cs_menu)
                            <li><a href="{{route('class_schedule_menu', $cs_menu->menu_slug)}}" class="dropdown-item">{{$cs_menu->menu_name}}</a></li>
                        @endforeach
                        @endif
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a href="" class="nav-link nav-item dropdown-toggle" data-bs-toggle="dropdown">Corporate Trainings</a>
                    <ul class="dropdown-menu m-0">
                        @if( $corp_training_categories && $corp_training_categories != null )
                        @foreach($corp_training_categories as $training_category)
                            <li>
                                <a href="#" class="dropdown-item">
                                    <span>{{$training_category->training_title}}</span>&nbsp; &nbsp;<span style="position:absolute; right: 7px;">&raquo;</span>
                                </a>
                                <ul class="dropdown-menu dropdown-submenu">
                                    @foreach($training_category->trainings as $training)
                                    <li>
                                        <a href="{{route('training_details', [$training->id,])}}" class="dropdown-item">
                                            <span>{{$training->training_title}}</span> 
                                        </a>
                                    </li>
                                    @endforeach
                                </ul> 
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a href="" class="nav-link nav-item dropdown-toggle" data-bs-toggle="dropdown">Fee</a>
                    <ul class="dropdown-menu m-0">
                        @if( $fee_menus != null )
                        @foreach($fee_menus as $fee_menu)
                            <li><a href="{{route('fee_menu', $fee_menu->menu_slug)}}" class="dropdown-item">{{$fee_menu->menu_name}}</a></li>
                        @endforeach
                        @endif
                    </ul>
                </li>

                {{-- <a href="{{route('team')}}" class="nav-item nav-link {{route('team')==url()->full() ? 'active' : '' }}">Our Team</a> --}}
                {{-- <a href="{{route('quote')}}" class="nav-item nav-link {{route('quote')==url()->full() ? 'active' : '' }}">Free Quote</a> --}}
                <div class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle {{route('gallery')==url()->full() ? 'active' : '' }}" data-bs-toggle="dropdown">Gallery</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{route('gallery')}}" class="dropdown-item">Events</a> 
                    </div>
                </div>
            </div>
            <a href="{{route('contact')}}" class="btn btn-sm btn-primary py-2 px-4 ms-3" style="border-radius: 4px;">Contact Us</a>
        </div>
    </div>
</nav>