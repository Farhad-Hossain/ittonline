<!doctype html>
<html lang="en" class="semi-dark">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset($appInfo ? $appInfo->logo_url : '')}}" type="image/png" />
	<!--plugins-->
	<link href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	{{-- <link href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" /> --}}
	<link href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/semi-dark.css')}}" />
	<title>{{$title}}</title>
	@stack('custom_styles')
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('layouts.admin_sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						{{--
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
						--}}
					</div>

					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">	
							{{--
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
							--}}
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="row row-cols-3 g-3 p-3">
										<a href="{{route('admin.contacts')}}" class="text-dark">
										<div class="col text-center">
											<div class="app-box mx-auto text-primary"><i class='bx bx-group'></i>
											</div>
											<div class="app-title">Contacts</div>
										</div>
										</a>

										<a href="{{route('admin.course.all')}}" class="text-dark">
										<div class="col text-center">
											<div class="app-box mx-auto text-danger"><i class='bx bx-atom'></i>
											</div>
											<div class="app-title">Courses</div>
										</div>
										</a>
										<a href="{{route('admin.stuffs')}}" class="text-dark">
										<div class="col text-center">
											<div class="app-box mx-auto text-success"><i class='bx bx-shield'></i>
											</div>
											<div class="app-title">Stuffs</div>
										</div>
										</a>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{--<span class="alert-count">1</span>--}}
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									{{--
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Contacts</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Time Response 
														<span class="msg-time float-end">28 min ago</span>
													</h6>
													<p class="msg-info">5.1 min avarage time response</p>
												</div>
											</div>
										</a>
									</div>
									
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
									--}}
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{--<span class="alert-count">1</span>--}}
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									{{--
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="" class="msg-avatar" alt="">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson 
														<span class="msg-time float-end">5 sec ago</span>
													</h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
									--}}
								</div>
							</li>
						</ul>
					</div>

					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{asset('assets/images/avatars/user_avatar.png')}}" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">{{Auth::user()->name}}</p>
								{{-- <p class="designattion mb-0">Web Developer</p> --}}
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li>
								<a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li>
								<a class="dropdown-item" 
									href="{{ route('logout') }}" 
									onclick="event.preventDefault(); 
									document.getElementById('logout-form').submit();">
									<i class='bx bx-log-out-circle'></i>
									<span>Logout</span>
								</a>
							</li>
						</ul>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
							@csrf
						</form>
					</div>
				</nav>
			</div>
		</header>

        
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				@if( session()->has('success') )
					<div class="alert alert-success">
						{{ session()->get('success') }}
					</div>
				@elseif( session()->has('danger') )
					<div class="alert alert-danger">
						{{ session()->get('danger') }}
					</div>
				@endif
			   @yield('contents')
			</div>
		</div>

        <!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © {{date('Y')}}. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->

	<!-- Commomn Modal -->
	<div class="modal fade" id="commonModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-body" id="commomModalInfoContent">
			
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		</div>
		</div>
	</div>
	</div>
	
	<!-- Bootstrap JS -->
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	{{-- <script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script> --}}
	<!--app JS-->
	<script src="{{asset('assets/js/app.js')}}"></script>

	<script>
		function showMessage(message) {
			$("#commomModalInfoContent").text(message);
			$("#commonModal").modal('show');
		}
		$(".td-content-details-btn").click(function () {
            let message = $(this).data('message')
			showMessage(message);
        });
	</script>

	@stack('custom_scripts')
</body>

</html>