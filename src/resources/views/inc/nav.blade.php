<nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
    <div class="container">
        <a href="{{route('welcome')}}" class="navbar-brand p-0">
            <img src="{{asset($appInfo ? $appInfo->logo_url : '')}}" style="width: 80px;" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{route('welcome')}}" class="nav-item nav-link {{route('welcome')==url()->full() ? 'active' : '' }}">Home</a>
                <a href="{{route('about')}}" class="nav-item nav-link {{route('about')==url()->full() ? 'active' : '' }}" >About</a>

                <li class="nav-item dropdown">
                    <a href="{{route('courses')}}" class="nav-link nav-item dropdown-main-item dropdown-toggle {{route('courses')==url()->full() ? 'active' : '' }}" data-bs-toggle="dropdown">Courses</a>
                    <ul class="dropdown-menu m-0">
                        @php $printedList = []; @endphp
                        @foreach($courseCategories as $courseCategory)
                        @php 
                            $subCategories = $courseCategory->subCategories()->get(); 
                            $hasSubCategories = $subCategories->count();
                        @endphp

                        @if (!in_array($courseCategory->id, $printedList)) 
                        <li>
                            <a href="{{route('courses')}}?category_id={{$courseCategory->id}}" class="dropdown-item">
                                <span>{{$courseCategory->name}}</span> 
                                @if($hasSubCategories) <span style="position:absolute; right: 7px;">&raquo;</span> @endif
                            </a>
                            @php $printedList[] = $courseCategory->id; @endphp

                            @if($hasSubCategories)
                            <ul class="dropdown-menu dropdown-submenu">
                                @foreach($subCategories as $subCategory)
                                @if(!in_array($subCategory->id, $printedList))
                                <li>
                                    <a href="{{route('courses')}}?category_id={{$subCategory->id}}" class="dropdown-item">
                                        <span>{{$subCategory->name}}</span> 
                                    </a>
                                    @php $printedList[] = $subCategory->id; @endphp
                                </li>

                                @endif

                                @endforeach
                            </ul>
                            @endif 
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </li>

                <a href="{{route('quote')}}" class="nav-item nav-link {{route('quote')==url()->full() ? 'active' : '' }}">Free Quote</a>
                <div class="nav-item dropdown">
                    <a href="" class="nav-link nav-item dropdown-toggle {{route('gallery')==url()->full() ? 'active' : '' }}" data-bs-toggle="dropdown">Gallery</a>
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
                <a href="{{route('contact')}}" class="nav-item nav-link {{route('contact')==url()->full() ? 'active' : '' }}">Contact</a>
            </div>
            <a href="{{route('quote')}}" class="btn btn-primary py-2 px-4 ms-3">Free Quote</a>
        </div>
    </div>
</nav>