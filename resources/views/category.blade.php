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
            <div id="myBtnContainer" style="text-align: center;" class="snipcart-details">

                @if(isset($subcategory) && $subcategory->count() > 0)
                 <input style="width: 6em;background: #dc5562" onclick="filterSelection('all')" type="button" name="submit" value="All" class="button btn" />
               @foreach($subcategory as $key => $cat)
                <input style="    max-width: 17em;background: #dc5562" onclick="filterSelection('{{$cat->id}}')" type="button" name="submit" value="{{$cat->name}}" class="button btn" />
                @endforeach
            @endif
            </div>
            <div class="wrapper">
                <!-- first section (nuts) -->
                <!-- <div class="product-sec1"> -->
                <!-- <h3 class="heading-tittle">Nuts</h3> -->
                @if(!$products->isEmpty())
                <?php $done = 0; ?>
                <?php $skip = 0; ?>
                @foreach($products as $key => $cat)

                <div class="col-md-4 men-thumb-item-sale product-men filterDiv {{$cat->sub_category}}">
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
                        <h3 class="offer-p">Our Price <br>₹{{$cat->price_per_kg}}{{($cat->quantity_in_grams == 1)?"/kg":"/unit"}}</h3>
                        <div class="item-info-product ">
                            <h4 class="h4-design">
                                <!-- <a href="single.html">Almonds, 100g</a> -->
                                {{$cat->name}}
                            </h4>
                            </a>
                            @if ($cat->mrp_per_kg)
                            <div class="info-product-price">
                                <span class="item_price">MRP ₹ <s>{{$cat->mrp_per_kg}}
                                        {{($cat->quantity_in_grams == 1) ? "per kg" : "per unit" }}</s></span>
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
                                    @if($cat->subscription_available)
                                    <a href="{{url('subscribe', $cat->id)}}"><button class="button subsc-btn">Subscripe</button></a>
                                    @endif
                                @endif
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
                                <h4 class="modal-title product-title">{{$categoryData[0]->name}} </h4>
                            </div>
                            <div class="banner-bootom-w3-agileits boot">
                                <table>
                                    <tr class="detilpupup">

                                        <div class="container">
                                            <td style="width: 40%">
                                                <section id="slider">
                                                    <div class="container-fluid">
                                                        <div style="width: 16em;" class="slider-inner">
                                                            <div id="owl-demo" class="owl-carousel owl-theme"
                                                                style="margin-top: 20px;">
                                                                <div class="item">
                                                                    <img src="{{ Storage::disk(config('voyager.storage.disk'))->url($cat->main_image) }}" alt="sliderimg1">
                                                                </div>
                                                                @if($cat->other_images)
                                                                @foreach (json_decode($cat->other_images) as $image)
                                               
                                                                <div class="item">
                                                                    <img src="{{ Storage::disk(config('voyager.storage.disk'))->url($image) }}" alt="sliderimg1">
                                                                </div>
                                                                @endforeach                                                              
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </td>
                                        </div>



                                        <div class="container">
                                            <td>
                                                <div class="single-right-left simpleCart_shelfItem">
                                                    <h3>{{$cat->name}} </h3>
                                                    <p>
                                                        {!!$cat->description!!}
                                                    </p>
                                                    <p style="font-size: 7px; color: red;">
                                                        *Real product may not be same with the shown image. 
                                                    </p>
                                                </div>
                                            </td>
                                        </div>

                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                @if($cat->out_of_stock == 1)
                                   <input style="background: #ff7919;" type="button" value="Out Of Stock" class="button" class="btn btn-default pupup-close" />
                                @else
                                 @if (!Auth::check())
                                <a href="{{url('login')}}"><input type="button" name="submit" value="Login Required"
                                        class="btn btn-default pupup-close" /></a>
                                @else
                                <input type="button" id="addToCartButton{{$key}}" onclick="addToCart({{$key}})"
                                    value="Add to cart" class="btn btn-default pupup-close" />
                                @endif    
                                @endif
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
                                <h6>₹{{$cat->price_per_kg}} {{($cat->quantity_in_grams == 1) ? "per kg" : "per unit" }}</h6>
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
                                    @if($cat->subscription_available)
                                <a href="{{url('subscribe', $cat->id)}}"><input type="button" value="Subscripe" class="button" /></a>
                                @endif
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
@endif

<!-- //special offers -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" type="text/javascript">
</script>


<script>
$(function() {
    var count = 0;
    $('.owl-carousel').each(function() {
        $(this).attr('id', 'owl-demo' + count);
        $('#owl-demo' + count).owlCarousel({
            navigation: true,
            slideSpeed: 300,
            pagination: true,
            singleItem: true,
            autoPlay: 2000,
            autoHeight: true
        });
        count++;
    });
});

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
 <script>
filterSelection("all")
function filterSelection(c) {
    
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/filterizr/1.3.4/jquery.filterizr.min.js"></script>
 <style>
 
.filterDiv {
    display: none;
  }
  
  .show {
    display: block;
        -webkit-animation: slide-down .4s ease-out;
    -moz-animation: slide-down .4s ease-out;
  }
  @-webkit-keyframes slide-down {
      0% { opacity: 0; -webkit-transform: translateY(-100%); }   
    100% { opacity: 1; -webkit-transform: translateY(0); }
}
@-moz-keyframes slide-down {
      0% { opacity: 0; -moz-transform: translateY(-100%); }   
    100% { opacity: 1; -moz-transform: translateY(0); }
}
#slider .container-fluid {
    padding: 0 15px;
}

#slider .slider-inner {
    padding: 0;
}

.slider-inner .item img {
    display: block;
    width: 100%;
    height: auto;
}

.slider-inner h1 {
    color: purple;
}
    </style>
@include('footer')