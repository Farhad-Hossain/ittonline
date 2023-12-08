<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ITTonline.com</title>
	<link rel="stylesheet" href="{{asset('assets/css/style_custom.css')}}">
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color: #e6e6e6">
	<div class="u-top-navigation-container">
		<div class="u-content-container d-flex justify-content-between">
			<div>
				<a class="u-top-navigation-link">Training Division</a>
				<a class="u-top-navigation-link">Solution Division</a>
			</div>
			<div>
				<a class="u-top-navigation-link">
					<i class="fa fa-phone" style="font-size: 90%;" aria-hidden="true"></i> {{$basicInfo ? $basicInfo['mobile_number'] : ''}}
				</a>
				<a class="u-top-navigation-link">
					<i class="fa fa-envelope" style="font-size: 90%;"></i> {{$basicInfo ? $basicInfo['email'] : ''}}
				</a>
				<a class="u-top-navigation-link">
					<i class="fa fa-file" style="font-size: 90%;"></i> Inquery Form
				</a>
			</div>
		</div>
	</div>

	<div class="u-content-container d-flex align-items-center justify-content-between align-middle" style="height: 90px;">
		<div class="company-logo">
			<img src="{{$basicInfo ? asset($basicInfo->logo_url) : ''}}" style="width: 90px; height: 100%" alt="">
		</div>

		<div class="u-menu-submenu-list">
			<a href="" class="u-menu-link">Home</a>
			<a href="" class="u-menu-link">About Us</a>
			<a href="" class="u-menu-link">Technologies</a>
			<a href="" class="u-menu-link">Vendor</a>
			<a href="" class="u-menu-link">Class Schedules</a>
			<a href="" class="u-menu-link">COrporate Training</a>
			<a href="" class="u-menu-link">Fee</a>
			<a href="" class="u-menu-link">E-Library</a>
			<a href="" class="u-menu-link">Contact Us</a>
		</div>
	</div>

	<!-- Slider -->
	<div class="u-content-container">
		<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach($sliders as $slider)
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$loop->index}}" class="{{$loop->index==0 ? 'active' : ''}}" aria-current="true" aria-label="Slide {{$loop->index}}"></button>
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach($sliders as $slider)
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$loop->index}}" class="{{$loop->index==0 ? 'active' : ''}}" aria-current="true" aria-label="Slide {{$loop->index}}"></button>
					<div class="carousel-item active">
						<img src="{{asset($slider->image_url)}}" class="d-block u-slider-image" alt="...">
					</div>
				@endforeach
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
	</div>

	<div class="u-footer-container">
		<div class="row">
			<div class="col-md-3">
				<div class="">
					<img src="{{$basicInfo ? asset($basicInfo->logo_url) : ''}}" style="width: 90px; height: 100%" alt="">
				</div>
			</div>
			<div class="col-md-3">
				<h3 class="mb-2">Quick Links</h3>
				<a href="">FAQS</a>
				<hr />
				<a href="">Admission</a>
			</div>
		</div>
		

	</div>
</body>

<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</html>