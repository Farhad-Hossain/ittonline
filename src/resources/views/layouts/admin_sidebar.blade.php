<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        {{--
        <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        --}}
        <div>
            <h4 class="logo-text">
                <a href="{{route('welcome')}}" class="text-light">{{$appInfo ? $appInfo->app_name : ''}}</a>
            </h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('admin.dashboard')}}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">App Setup</div>
            </a>
            <ul>
                <li> 
                    <a href="{{route('admin.app_setup')}}"><i class="bx bx-right-arrow-alt"></i>Basic</a>
                </li>
                <li> 
                    <a href="{{route('admin.slider_setup')}}"><i class="bx bx-right-arrow-alt"></i>Slider Setup</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-repeat"></i>
                </div>
                <div class="menu-title">Page Content</div>
            </a>
            <ul>
                <li> 
                    <a href="{{route('admin.page_content.about_us')}}"><i class="bx bx-right-arrow-alt"></i>About Us</a>
                </li>
                <li> 
                    <a href="{{route('admin.page_content.about_us_menus')}}"><i class="bx bx-right-arrow-alt"></i>About Us Menus</a>
                </li>
                <li> 
                    <a href="{{route('admin.page_content.class_schedule_menus')}}"><i class="bx bx-right-arrow-alt"></i>Class Schedule Menus</a>
                </li>
                <li> 
                    <a href="{{route('admin.page_content.free_quote')}}"><i class="bx bx-right-arrow-alt"></i>Quick Inquiry</a>
                </li>
                <li> 
                    <a href="{{route('admin.page_content.why_choose_us')}}"><i class="bx bx-right-arrow-alt"></i>Why Choose Us</a>
                </li>
            </ul>
        </li>
        
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-lock"></i>
                </div>
                <div class="menu-title">Course Setup</div>
            </a>
            <ul>
                <li> 
                    <a href="{{route('admin.course.categories')}}"><i class="bx bx-right-arrow-alt"></i>Course Categories</a>
                </li>
                <li> 
                    <a href="{{route('admin.course.all')}}"><i class="bx bx-right-arrow-alt"></i>All Courses</a>
                </li>
                <li> 
                    <a href="{{route('admin.course.save')}}"><i class="bx bx-right-arrow-alt"></i>Add Course</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-lock"></i>
                </div>
                <div class="menu-title">Corporate Training Setup</div>
            </a>
            <ul>
                <li> 
                    <a href="{{route('admin.corp_training.categories')}}"><i class="bx bx-right-arrow-alt"></i>Training Categories</a>
                </li>
                <li> 
                    <a href="{{route('admin.corp_training.all')}}"><i class="bx bx-right-arrow-alt"></i>All Trainings</a>
                </li>
                <li> 
                    <a href="{{route('admin.corp_training.save')}}"><i class="bx bx-right-arrow-alt"></i>Add Training</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('admin.quotes')}}">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Quotes</div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.contacts')}}">
                <div class="parent-icon"> <i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Inquery / Contacts</div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.stuffs')}}">
                <div class="parent-icon"> <i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Trainer</div>
            </a>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-video-recording"></i>
                </div>
                <div class="menu-title">Gallery</div>
            </a>
            <ul>
                <li> 
                    <a href="{{route('admin.gallery.events')}}"><i class="bx bx-right-arrow-alt"></i>Events</a>
                </li>
                <li> 
                    <a href="{{route('admin.gallery.list')}}"><i class="bx bx-right-arrow-alt"></i>Images</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('admin.testimonial.list')}}">
                <div class="parent-icon"> <i class="bx bx-comment"></i>
                </div>
                <div class="menu-title">Testimonials</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>