
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Online Vegetable Shop</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Online Vegetable Shop" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
	<!--pop-up-box-->
	<link href="{{ asset('css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui1.css') }}">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<!-- top-header -->
	<div class="header-most-top">
		<p>We Deliver Fresh Vegetables</p>
	</div>
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-3 logo_agile">
				
					<a href="{{url('/')}}">
						<img style="width: 125px" src="{{ asset('images/logo2.png') }}" alt=" ">
					</a>
				
			</div>
			<!-- header-bot -->
			<div class="col-md-9 header">
				<!-- header lists -->
				<ul>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-truck" aria-hidden="true"></span>Track Order</a>
					</li>
					@if (Auth::user())
					<li>
							<span class="fa fa-user-circle-o" aria-hidden="true"></span>Hi, {{Auth::user()-> name}} </a>
					</li>
					<li>
					<a href="{{url('logout')}}">
							<span class="fa fa-sign-out" aria-hidden="true"></span>Signout </a>
					</li>
					<li>
					<a href="{{url('account')}}">
							<span class="fa fa-user" aria-hidden="true"></span>Account </a>
					</li>
					@else
					<li>
						<span class="fa fa-whatsapp" aria-hidden="true"></span> 9957588417
					</li>
					<li>
						<a href="{{url('login')}}">
							<span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In </a>
					</li>
					<li>
						<a href="{{url('register')}}">
							<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up </a>
					</li>
					
					@endif
				</ul>
				<!-- //header lists -->
				<!-- search -->
				<div class="agileits_search">
					<form action="#" method="post">
						<input name="Search" type="search" placeholder="How can we help you today?" required="">
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<span class="fa fa-search" aria-hidden="true"> </span>
						</button>
					</form>
				</div>
				<!-- //search -->
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="wthreecartaits wthreecartaits2 cart cart box_1">
						<!-- <form action="#" method="post" class="last"> -->
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="display" value="1">
							<a href="{{url('check_out')}}"><button class="w3view-cart" name="submit" value="">
								<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
							</button></a>
						<!-- </form> -->
					</div>
				</div>
				<!-- //cart details -->
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //Modal2 -->
	<!-- //signup Model -->
	<!-- //header-bot -->
	<!-- navigation -->
	<div class="ban-top">
		<div class="container">
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							    aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list">
								<li>
									<a class="nav-stylehead" href="{{url('/')}}">Home
										<!-- <span class="sr-only">(current)</span> -->
									</a>
								</li>
								<li class="">
									<a class="nav-stylehead" href="about.html">About Us</a>
								</li>
								<li>
								<a class="nav-stylehead" href="about.html">Vegetables</a>
								</li>
								<li>
								<a class="nav-stylehead" href="about.html">Fruits</a>
								</li>
								<li class="">
									<a class="nav-stylehead" href="faqs.html">Faqs</a>
								</li>
								<li class="">
									<a class="nav-stylehead" href="contact.html">Contact</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->