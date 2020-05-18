<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Bazaar24x7</title>
    <link rel="icon" href="{{ asset('images/favicon.png')}}" type="image/png" sizes="16x16">
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Online Vegetable Shop" />
    <script>
    addEventListener("load", function() {
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
    <link rel="stylesheet" href="{{ asset('css/floating-wpp.css') }}">
    <!-- fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    
    <!-- <script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-
color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script> -->
   <script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    
    
<link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" rel="stylesheet" type="text/css"/>

    <style>
    .dataTables_wrapper .dt-buttons {
        float: none;
        text-align: center;
    }

    .dt-button {
        padding-right: 2%;
    }
    </style>
</head>

<body>
    <!-- top-header -->


    <!-- navigation -->
    <div class="ban-top">
        <div class="col-md-3 logo_agile">

            <a href="{{url('/')}}">
                <img class="logo-design" style="width: 125px" src="{{ asset('images/logo2.png') }}" alt=" ">
			</a>
			<p style="    line-height: 23px;
    font-family: berlin sans fb;
    font-weight: 600;
    font-size: 24px;" class="bazzar logo-name">
	        
				    Bazaar24x7
				    </p>
				    <p style="line-height: 14px; font-weight: 600;" class="tag-line logo-tag">
				       Bringing Bazaar to Home
				    </p>
				

        </div>
        <div class="col-md-8">
            <div class="top_nav_left">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="header-margin collapse navbar-collapse menu--shylock"
                            id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav menu__list">
                                <li>
                                    <a class="nav-stylehead" href="{{url('/')}}">Home
                                        <!-- <span class="sr-only">(current)</span> -->
                                    </a>
                                </li>
                                <li class="">
                                    <a class="nav-stylehead" href="#">About Us</a>
                                </li>
                                @if(isset($categories))
                                <li>
                                    <div class="dropdown nav-stylehead">
                                        <a class="nav-stylehead dropbtn ">Categories</a>
                                        <div class="dropdown-content">
                                         
                                        @foreach($categories as $key => $cat)
                                            <a href="{{url('categories', $cat->id)}}">{{$cat->name}}</a>
                                            @if(isset($cat->subcategories) && strlen($cat->subcategories))
                                            <div style="display: none;" class="dropdown-content ml-cat">
                                            @foreach($cat->subcategories as $key1 => $cat1)
                                            <a class="nav-stylehead">$cat1->name</a> 
                                            @endforeach
                                            </div>
                                            @endif
                                            <!-- <a href="{{url('coming_soon')}}">{{$cat->name}}</a> -->
                                            @endforeach
                                            <a class="nav-stylehead test">Test</a>
                                            <div style="    display: none ; " class="dropdown-content ml-cat">
                                            <a class="nav-stylehead">Male</a>    
                                        <a class="nav-stylehead">Female</a>    
                                    </div>
                                            @else
                                            
                                        </div>
                                    </div>
                                </li>
                                @endif
                                <!-- <li class="dropdown">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-4 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
                                                    <a href="{{url('categories/2')}}">Vegetables</a>
													</li>
													<li>
                                                        <a href="{{url('categories/1')}}">Fruits</a>
													</li>
												</ul>
											</div>
										</div>
									</ul>
								</li> -->
                                <li class="">
                                    <a class="nav-stylehead" href="#">Faqs</a>
                                </li>
                                <li class="">
                                    <a class="nav-stylehead" href="#">Contact</a>
                                </li>
                                @if (Auth::user())
                                <li>
                                     <div class="dropdown nav-stylehead">
                                        <a class="nav-stylehead dropbtn ">Hi,{{Auth::user()-> name}}</a>
                                        <div class="dropdown-content">
                                            <a href="{{url('account')}}">Your Account</a>
                                            <a href="{{url('logout')}}">Signout</a>
                                        </div>
                                    </div>
                                </li>
                                @else
                                <li>
                                    <a class="nav-stylehead" href="{{url('login')}}"> Login </a>
                                </li>
                                <li>
                                    <a class="nav-stylehead" href="{{url('register')}}"> Register </a>
                                </li>

                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="col-md-1 ">

            <div class="cart-padding top_nav_right">
                <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                    <!-- <form action="#" method="post" class="last"> -->
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="display" value="1">
                    <a href="{{url('check_out')}}"><button class="w3view-cart" name="submit" value="">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </button></a>
                    <!-- </form> -->
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- //navigation -->