@include('header')
<!-- banner -->

<div class="page-head_agile_info_w3l">

</div>
<!-- //banner-2 -->
<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="{{url('/')}}">Home</a>
                    <i>|</i>
                </li>
                <li>{{$categoryData[0]->name}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- //banner -->

<!-- top Products -->
<div class="ads-grid">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">{{$categoryData[0]->name}}
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
                @if(!$products->isEmpty())
                <?php $done = 0; ?>
                <?php $skip = 0; ?>
                @foreach($products as $key => $cat)

                <div class="col-md-4 men-thumb-item-sale product-men">
                    <div class="men-pro-item simpleCart_shelfItem">
                        <div class="front-item">
                            <a onclick="detailsModel({{$cat->id}})" href="#" data-toggle="modal" value="View Products"
                                class="button">
                                <img src="{{ Storage::disk(config('voyager.storage.disk'))->url($cat->main_image) }}"
                                    alt="">
                                <!-- <div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="single.html" class="link-product-add-cart">Quick View</a>
										</div>
									</div> -->
                                <!-- <span class="product-new-top">New</span> -->
                        </div>
                        <img class="offer-image" src="{{ asset('images/offer.png') }}">
                        <h3 class="offer-p">Our Price <br>{{$cat->price_per_kg}}
                            {{($cat->quantity_in_grams == 1) ? "/kg" : ""}}</h3>
                        <div class="item-info-product ">
                            <h4 class="h4-design">
                                <!-- <a href="single.html">Almonds, 100g</a> -->
                                {{$cat->name}}
                            </h4>
                            </a>
                            @if ($cat->mrp_per_kg)
                            <div class="info-product-price">
                                <span class="item_price">MRP ₹ <s>{{$cat->mrp_per_kg}}
                                        {{($cat->quantity_in_grams == 1) ? "per kg" : "" }}</s></span>
                                <!-- <del>₹{{($cat->price_per_kg * 1.2)}} per kg</del> -->
                            </div>
                            @endif
                            <div class="info-product-price">
                                <span class="item_price">Quantity <select name="quantity{{$key}}" id="quantity{{$key}}">
                                        @for($i=1;$i<=100;$i++) <option value="{{($cat->minimum_quantity * $i)}}">
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
                                <!-- <form action="#" method="post">
											<fieldset> -->
                                <input type="hidden" id="product_id{{$key}}" value="{{$cat->id}}" />
                                <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
                                @if (!Auth::check())
                                <a href="{{url('login')}}"><input type="button" name="submit" value="Login Required"
                                        class="button" /></a>
                                @else
                                <img src="{{asset('images/25.gif')}}" id="preloader{{$key}}"
                                    style="display: none; height: 30px;">
                                <input type="button" id="addToCartButton{{$key}}" onclick="addToCart({{$key}})"
                                    value="Add to cart" class="button" />
                                @endif

                                <!-- </fieldset>
										</form> -->
                            </div>

                        </div>
                    </div>

                </div>

                <div class="modal fade" id="productdetil{{$cat->id}}" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title product-title">{{$cat->name}} </h4>
                            </div>
                            <div class="banner-bootom-w3-agileits boot">
                                <table>
                                    <tr class="detilpupup">

                                        <div class="container">
                                            <td>

                                                <div class="mySlides{{($key + 1)}}">

                                                    <img src="{{ Storage::disk(config('voyager.storage.disk'))->url($cat->main_image) }}" style="width:100%">
                                                </div>
                                                @if($cat->other_images)
                                                @foreach (json_decode($cat->other_images) as $image)
                                                <div class="mySlides{{($key + 1)}}">

                                                    <img src="{{ Storage::disk(config('voyager.storage.disk'))->url($image) }}" style="width:100%">
                                                </div>
                                                @endforeach
                                                @endif
                                                <!-- <div class="mySlides">

                                                    <img src="{{ Storage::disk(config('voyager.storage.disk'))->url($cat->main_image) }}" style="width:100%">
                                                </div> -->
                                                
                                                

                                                <div class="row" style="margin: 0px;">
                                                    <div class="column">
                                                        <img class="demo cursor" src="{{ Storage::disk(config('voyager.storage.disk'))->url($cat->main_image) }}"
                                                            style="width:100%" onclick="currentSlide(1, {{($key + 1)}})">
                                                    </div>
                                                    @if($cat->other_images)
                                                @foreach (json_decode($cat->other_images) as $key1 => $image)
                                                    <div class="column">
                                                        <img class="demo cursor" src="{{ Storage::disk(config('voyager.storage.disk'))->url($image) }}"
                                                            style="width:100%" onclick="currentSlide({{($key1 + 2)}}, {{($key + 1)}})">
                                                    </div>@endforeach
                                                @endif
                                                </div>
                                            </td>
                                        </div>



                                        <div class="container">
                                            <td>
                                                <div class="single-right-left simpleCart_shelfItem">
                                                    <h3>{{$cat->name}} </h3>
                                                    <p>
                                                    {!!$cat->description!!}
                                                    </p>
                                                </div>
                                            </td>
                                        </div>

                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pupup-close"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>

                </div>



                @endforeach
                @else
                <h2> COMING SOON...</h2>
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
                        <img class="welcome-img-banner" src="{{ asset('images/fruit_veg.png')}}" alt="">
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
@if(!$products->isEmpty())
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
                @foreach($productsSlider as $key => $cat)
                <li>
                    <div class="w3l-specilamk">
                        <div class="speioffer-agile">
                            <!-- <a href="single.html"> -->
                            <img style="width: 240px; height: 240px;"
                                src="{{ Storage::disk(config('voyager.storage.disk'))->url($cat->main_image) }}" alt="">
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
                                <span class="item_price">Quantity <select name="quantity{{$key}}" id="quantity{{$key}}">
                                        @for($i=1;$i<=100;$i++) <option value="{{($cat->minimum_quantity * $i)}}">
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
                                @if (!Auth::check())
                                <a href="{{url('login')}}"><input type="button" name="submit" value="Login Required"
                                        class="button" /></a>
                                @else
                                <img src="{{asset('images/25.gif')}}" id="preloader{{$key}}"
                                    style="display: none; height: 30px;">
                                <input type="button" id="addToCartButton{{$key}}" onclick="addToCart({{$key}})"
                                    value="Add to cart" class="button" />
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
@endif

<!-- //special offers -->
<script>
function detailsModel(id) {
    $('#productdetil' + id).modal('show');
}
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

var slideIndex = 1;
showSlides(slideIndex, 1);

function plusSlides(n) {
    showSlides(slideIndex += n, 1);
}

function currentSlide(n, id) {
    showSlides(slideIndex = n, 1);
}

function showSlides(n, id) {
    var i;
    var slideName = "mySlides" + id;
    var slides = document.getElementsByClassName(slideName);
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    captionText.innerHTML = dots[slideIndex - 1].alt;
}
</script>
@include('footer')