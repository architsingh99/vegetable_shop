<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Bazaar24x7</title>
    <link rel="icon" href="{{ asset('images/favicon.png')}}" type="image/png" sizes="16x16">
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
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
			<p style="line-height: 4px;" class="bazzar logo-name">
	        
				    Baazar24x7
				    <p class="tag-line logo-tag">
				       FRESH VEGETABLES
				    </p>
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
                                <li>
                                    <div class="dropdown nav-stylehead">
                                        <a class="nav-stylehead dropbtn ">Categories</a>
                                        <div class="dropdown-content">
                                            @if(isset($categories))
                                        @foreach($categories as $key => $cat)
                                            <a href="{{url('categories', $cat->id)}}">{{$cat->name}}</a>
                                            @endforeach

                                            @else
                                            <a href="{{url('categories/2')}}">Vegetables</a>
                                            <a href="{{url('categories/1')}}">Fruits</a>
                                            @endif
                                        </div>
                                    </div>
                                </li>
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
                                    <a class="nav-stylehead" href="{{url('logout')}}">Signout </a>
                                </li>
                                <li>
                                    <a class="nav-stylehead" href="{{url('account')}}">{{Auth::user()-> name}} </a>
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
                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                        </button></a>
                    <!-- </form> -->
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- //navigation -->