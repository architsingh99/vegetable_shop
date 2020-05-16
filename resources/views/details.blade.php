    @include('header')
    <!-- banner-2 -->
    <div class="page-head_agile_info_w3l">

    </div>
    <!-- //banner-2 -->
    <!-- page -->
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="index.html">Home</a>
                        <i>|</i>
                    </li>
                    <li>{{$product->name}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->
    <!-- Single Page -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <!-- tittle heading -->
            <!-- <h3 class="tittle-w3l">Single Page
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3> -->
            <!-- //tittle heading -->
            <div class="col-md-5 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider">
                        <ul class="slides">
                            <li
                                data-thumb="{{ Storage::disk(config('voyager.storage.disk'))->url($product->main_image) }}">
                                <div class="thumb-image">
                                    <img src="{{ Storage::disk(config('voyager.storage.disk'))->url($product->main_image) }}"
                                        data-imagezoom="true" class="img-responsive" alt=""> </div>
                            </li>
                            @if($product->other_images)
                            @foreach (json_decode($product->other_images) as $image)
                            <li data-thumb="images/se2.jpg">
                                <div class="thumb-image">
                                    <img src="images/se2.jpg" data-imagezoom="true" class="img-responsive" alt="">
                                </div>
                            </li>
                            <!-- <li data-thumb="images/se3.jpg">
								<div class="thumb-image">
									<img src="images/se3.jpg" data-imagezoom="true" class="img-responsive" alt=""> </div>
                            </li> -->
                            @endforeach
                            @endif
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 single-right-left simpleCart_shelfItem">
                <h3>{{$product->name}} </h3>
                <p>
                    @if($product->mrp_per_kg * 30 > $product->monthly_charge)
                        <span class="item_price">₹{{$product->monthly_charge}}</span>
                        @endif
                        <del>₹{{$product->mrp_per_kg * 30}}</del>
                        @if($product->discount_percentage_delivery_subscription == 100)
                        <label>Free delivery</label>
                        @endif
                </p>
                <div class="single-infoagile">
                    <ul>
                        <li>
                            Cash on Delivery Eligible.
                        </li>
                        <li>
                            Subcription Period: 30 days
                        </li>
                    </ul>
                </div>
                <div class="product-single-w3l">
                    <p>
                        <!-- <i class="fa fa-hand-o-right" aria-hidden="true"></i>Pantry Cashback Offer</p> -->
                    
                            {!! $product->description !!}
                        
                    <p>
                        <!-- <i class="fa fa-refresh" aria-hidden="true"></i>All food products are
                        <label>returnable.</label> -->
                        <label>Quantity Required Per Day: </label>
                        <select name="quantity" id="quantity">
                            @for($i=1;$i<=100;$i++) <option value="{{($product->minimum_quantity * $i)}}">
                                <?php
                                     if($product->quantity_in_grams == 1)
                                        $valueForDisplay = ($product->minimum_quantity * $i) < 1000 ? ($product->minimum_quantity * $i) . " g" : ($product->minimum_quantity * $i)/1000 . " kg";
                                     else
                                         $valueForDisplay = $product->minimum_quantity * $i;
                                 ?>
                                {{$valueForDisplay}}
                                </option>
                                @endfor
                        </select>
                    </p>
                </div>
                <div class="occasion-cart">
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                        <div class="pincode-div pincode-box ">
                            <h4 style="    margin-bottom: 8px;">Currently we are available in Jorhat area only</h4>

                            <input class="pincode-field" type="number" name="pincode" id="pincode"
                                placeholder="Enter your Jorhat area pincode" required="">

                            <button class="pincode-field-button" onclick="checkPincode()"
                                id="verifyPincodeButton">Verify</button>
                            <button class="pincode-field-button" onclick="editPincode()" id="editPincodeButton"
                                style="display: none;">Edit Pincode</button>
                            <img src="{{asset('images/25.gif')}}" id="preloaderPincode"
                                style="display: none; height: 30px;">

                            <p style="color: red; display:none;" id="pincodeStatus"></p>
                        </div>
                    </div>

                </div>

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //Single Page -->
    @include('footer')
