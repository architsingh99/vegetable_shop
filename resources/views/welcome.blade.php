@include('header')
<!-- banner -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <!-- <li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li> -->
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption">
                    <h3>Fresh
                        <span>Vegetables</span>
                    </h3>
                    <p>Order
                        <span>Now</span> </p>
                    <a class="button2" href="{{url('categories/2')}}">Shop Now </a>
                </div>
            </div>
        </div>
        <div class="item item2">
            <div class="container">
                <div class="carousel-caption">
                    <h3>Healthy
                        <span>Fruits</span>
                    </h3>
                    <p>Order
                        <span>Now</p>
                    <a class="button2" href="{{url('categories/1')}}">Shop Now </a>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- //banner -->

<!-- top Products -->
<div class="ads-grid">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">{{$msg}}
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <!-- product left -->
        <!-- <div class="search-hotel">
					<h3 class="agileits-sear-head">Search Here..</h3>
					<form action="#" method="post">
						<input type="search" placeholder="Product name..." name="search" required="">
						<input type="submit" value=" ">
					</form>
				</div> -->
        <!-- //product left -->
        <!-- product right -->
        <div class="agileinfo-ads-display col-md-12">
            <div class="wrapper">
                <!-- first section (nuts) -->
                <!-- <div class="product-sec1"> -->
                    <!-- <h3 class="heading-tittle">Nuts</h3> -->
                  
                        <?php $done = 0; ?>
                    <?php $skip = 0; ?>
                    @foreach($categories2 as $key => $cat)
                    
                        <div class="col-md-4 men-thumb-item-sale product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="front-item">
                                    <a href="{{url('categories', $cat->id)}}">
                                    <img  src="{{ Storage::disk(config('voyager.storage.disk'))->url($cat->image) }}"
                                        alt="">
                                        </a>
                                    <!-- <div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="single.html" class="link-product-add-cart">Quick View</a>
										</div>
									</div> -->
                                    <!-- <span class="product-new-top">New</span> -->
                                </div>
                                <div style="height: 100px;" class="item-info-product ">
                                    <h4 class="h4-design">
                                        <!-- <a href="single.html">Almonds, 100g</a> -->
                                        {{$cat->name}}
                                    </h4>
                                    <br>
                                    <!-- <div class="info-product-price">
                                        <span class="item_price">₹{{$cat->price_per_kg}} per kg</span>
                                        <del>₹{{($cat->price_per_kg * 1.2)}} per kg</del>
                                    </div> -->
                                    <div
                                        class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        
                                        <a href="{{url('categories', $cat->id)}}"><input type="button"
                                            value="View Products" class="button" /></a>
<!--                                         
                                        <a href="{{url('coming_soon')}}"><input type="button"
                                            value="View Products" class="button" /></a> -->

                                       
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach
                        @if($msg != "RESTURANT")
                        <div class="col-md-4 men-thumb-item-sale product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="front-item">
                                    <a href="{{url('resturant')}}">
                                    <img  src="{{ asset('images/about.jpg') }}"
                                        alt="">
                                        </a>
                                </div>
                                <div style="height: 100px;" class="item-info-product ">
                                    <h4 class="h4-design">
                                        <!-- <a href="single.html">Almonds, 100g</a> -->
                                        RESTURANT FOODS
                                    </h4>
                                    <br>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">                                        
                                        <a href="{{url('resturant')}}"><input type="button"
                                            value="View Resturants" class="button" /></a>                                       
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="clearfix"></div>
                    <!-- </div> -->
                    <!-- //first section (nuts) -->
                   
                    <div class="product-sec1 product-sec2">
                        <div class="col-xs-7 effect-bg">
                            <h3 class="">Bazaar 24x7</h3>
                            <h6>Enjoy our all healthy Products</h6>
                            <!-- <p>Get Extra 10% Off</p> -->
                        </div>
                        <h3 class="w3l-nut-middle">Same day Delivery</h3>
                        <div class="col-xs-5 bg-right-nut">
                            <img class="welcome-img-banner" src="{{ asset('images/fruit_veg.png')}}" alt="" >
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- //fourth section (noodles) -->
                </div>
            </div>
            <!-- //product right -->
        </div>
    </div>
    <!-- //top products -->
    <!-- special offers -->
    <div class="featured-section" id="projects">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">Our Products
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3>
            <!-- //tittle heading -->
            <div class="content-bottom-in">
                <ul id="flexiselDemo1">
                    @foreach($products as $key => $cat)
                    <li>
                        <div class="w3l-specilamk">
                            <div class="speioffer-agile">
                                <!-- <a href="single.html"> -->
                                <img style="width: 240px; height: 240px;"
                                    src="{{ Storage::disk(config('voyager.storage.disk'))->url($cat->main_image) }}"
                                    alt="">
                                <!-- </a> -->
                            </div>
                            <div class="product-name-w3l">
                                <h4 class="h4-design">
                                        <!-- <a href="single.html">Almonds, 100g</a> -->
                                        {{$cat->name}}
                                    </h4>
                                <div class="w3l-pricehkj">
                                    <h6>₹{{$cat->price_per_kg}} {{($cat->quantity_in_grams == 1) ? "per kg" : "" }}</h6>
                                    <!-- <img class="offer-image" src="{{ asset('images/offer.png') }}"> -->
                                    <!-- <h3 class="offer-image offer-p">Save <br>&nbsp ₹{{($cat->price_per_kg * 1.2) - $cat->price_per_kg}}</h3> -->
                                </div>
                                <div class="info-product-price">
                                        <span class="item_price">Quantity <select name="quantity{{$key}}"
                                                id="quantity{{$key}}">
                                                @for($i=1;$i<=100;$i++) <option
                                                    value="{{($cat->minimum_quantity * $i)}}">
                                                    <?php
                                                    if($cat->quantity_in_grams == 1)
                                                        $valueForDisplay = ($cat->minimum_quantity * $i) < 1000 ? ($cat->minimum_quantity * $i) . " g" : ($cat->minimum_quantity * $i)/1000 . " kg";
                                                    else
                                                        $valueForDisplay = $cat->minimum_quantity * $i;
                                                    ?>
                                                    {{$valueForDisplay}}
                                                    </option>
                                                    @endfor
                                            </select></span>
                                    </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">

								<input type="hidden" id="product_id{{$key}}" value="{{$cat->id}}" />
                                    <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
                                    @if($cat->out_of_stock == 1)
                                   <input style="background: #ff7919;" type="button" value="Out Of Stock" class="button" />
                                @else
                                    @if (!Auth::check())
                                    <a href="{{url('login')}}"><input type="button" name="submit" value="Login Required"
                                            class="button" /></a>
                                    @else
                                    <img src="{{asset('images/25.gif')}}" id="preloader{{$key}}"
                                        style="display: none; height: 30px;">
                                    <input type="button" id="addToCartButton{{$key}}" onclick="addToCart({{$key}})"
                                        value="Add to cart" class="button" />
                                    @endif
                                    @endif
                                    <input type="hidden" name="cmd" value="_cart" />
                                    <input type="hidden" name="add" value="1" />
                                    <input type="hidden" name="business" value=" " />
                                    <input type="hidden" name="item_name" value="Aashirvaad, 5g" />
                                    <input type="hidden" name="amount" value="220.00" />
                                    <input type="hidden" name="discount_amount" value="1.00" />
                                    <input type="hidden" name="currency_code" value="USD" />
                                    <input type="hidden" name="return" value=" " />
                                    <input type="hidden" name="cancel_return" value=" " />
                                   
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- //special offers -->
    <script>
    async function addToCart(index) {
        document.getElementById('preloader' + index).style.display = 'block';
        document.getElementById('addToCartButton' + index).style.display = 'none';
        $.ajax({
            type: "POST",
            url: "http://localhost:8000/add_to_cart", // You add the id of the post and the update datetime to the url as well
            data: {
                _token: document.getElementById('token').value,
                product_id: document.getElementById('product_id' + index).value,
                quantity: document.getElementById('quantity' + index).value
            },
            success: function(response) {
                // If not false, update the post
                console.log(response);
                swal({
                    title: response.data.status,
                    text: response.data.message,
                    icon: response.data.status,
                });
                document.getElementById('addToCartButton' + index).style.display = 'block';
                document.getElementById('preloader' + index).style.display = 'none';
            }
        });
    }
    </script>
    @include('footer')