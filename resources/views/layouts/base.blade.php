<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>	
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flexslider.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css') }}">
    @livewireStyles
</head>
<body class="home-page home-01 ">

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu right-menu">
							<ul>
								@if(Route::has('login'))
									@auth
										@if(Auth::user()->utype === 'ADM')
											<li class="menu-item menu-item-has-children parent" >
												<a title="Mi cuenta" href="#">Mi cuenta ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
													<li class="menu-item" >
														<a title="Dashboard" href="{{ route('admin.dashboard') }}">Dashboard</a>
													</li>
													<li class="menu-item" >
														<a title="Categories" href="{{ route('admin.categories') }}">Categorías</a>
													</li>
													<li class="menu-item">
														<a title="Products" href="{{ route('admin.products') }}">Productos</a>
													</li>
													<li class="menu-item">
														<a title="Orders" href="{{ route('admin.orders') }}">Ver órdenes</a>
													</li>
													<li class="menu-item">
															<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
													</li>
													<form id="logout-form" method="POST" action="{{ route('logout')}}">
														@csrf
													</form>
												</ul>
											</li>
										@else
											<li class="menu-item menu-item-has-children parent" >
												<a title="Mi cuenta" href="#">Mi cuenta ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
													<li class="menu-item" >
														<a title="Dashboard" href="{{ route('user.dashboard') }}">Dashboard</a>
													</li>
													<li class="menu-item">
															<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
													</li>
													<form id="logout-form" method="POST" action="{{ route('logout')}}">
														@csrf
													</form>
												</ul>
											</li>
										@endif
									@else
										<li class="menu-item" ><a title="Register or Login" href="{{route('login')}}">Login</a></li>
										<li class="menu-item" ><a title="Register or Login" href="{{route('register')}}">Register</a></li>
									@endif
								@endif
							</ul>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="mid-section main-info-area">

						<div class="wrap-logo-top left-section">
							<a href="/" class="link-to-home"><img src="{{ asset('assets/images/logo-top-1.png')}}" alt="mercado"></a>
						</div>
						@livewire('header-search-component')
						<div class="wrap-icon right-section">							
							<div class="wrap-icon-section minicart">
								<a href="/cart" class="link-direction">
									<i class="fa fa-shopping-basket" aria-hidden="true"></i>
									<div class="left-info">
										@if(Cart::instance('cart')->count() > 0)
											<span class="title">Usted tiene </span>
											<span class="index">{{Cart::instance('cart')->count()}} productos</span>
											<span class="title">en el carrito</span>
										@endif
									</div>
								</a>
							</div>
							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="nav-section header-sticky">
					<div class="primary-nav-section">
						<div class="container">
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
								<li class="menu-item home-icon">
									<a href="/" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
								</li>
								<li class="menu-item">
									<a href="/shop" class="link-term mercado-item-title">Comprar</a>
								</li>
								<li class="menu-item">
									<a href="/cart" class="link-term mercado-item-title">Carrito</a>
								</li>
								<li class="menu-item">
									<a href="/checkout" class="link-term mercado-item-title">Pagar</a>
								</li>																
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
    {{$slot}}    
	<footer id="footer">
		<div class="wrap-footer-content footer-style-1"><div class="coppy-right-box">
				<div class="container">
					<div class="coppy-right-item item-left">
						<p class="coppy-right-text">Copyright © 2020 Surfside Media. All rights reserved</p>
					</div>
					<div class="coppy-right-item item-right">
						<div class="wrap-nav horizontal-nav">
							<ul>
								<li class="menu-item"><a href="about-us.html" class="link-term">About us</a></li>								
								<li class="menu-item"><a href="privacy-policy.html" class="link-term">Privacy Policy</a></li>
								<li class="menu-item"><a href="terms-conditions.html" class="link-term">Terms & Conditions</a></li>
								<li class="menu-item"><a href="return-policy.html" class="link-term">Return Policy</a></li>								
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</footer>
	<script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
	{{--<script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>--}}
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('assets/js/functions.js') }}"></script>
	<script src="https://cdn.tiny.cloud/1/fdl71k505okreqg1nk8s00ne9r5k94jgbhs4sqwu6xpssj2e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
	@livewireScripts

	@stack('scripts')
</body>
</html>