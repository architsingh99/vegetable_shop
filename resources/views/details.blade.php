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
                    <a href="{{url('/')}}">Home</a>
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

                    <section id="slider">
                        <div class="container-fluid">
                            <div style="width: 16em;    margin: auto;" class="slider-inner">
                                <div id="owl-demo" class="owl-carousel owl-theme" style="margin-top: 20px;">
                                    <div class="item">
                                        <img src="{{ Storage::disk(config('voyager.storage.disk'))->url($product->main_image) }}"
                                            alt="sliderimg1">
                                    </div>
                                    @if($product->other_images)
                                    @foreach (json_decode($product->other_images) as $image)

                                    <div class="item">
                                        <img src="{{ Storage::disk(config('voyager.storage.disk'))->url($image) }}"
                                            alt="sliderimg1">
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>
            </div>
            <div class="col-md-7 single-right-left simpleCart_shelfItem">
                <h3>{{$product->name}} </h3>
                <p>

                    <span class="item_price">₹{{$product->monthly_charge}} @if($product->quantity_in_grams == 1) Per
                        Month
                        @else Per Month @endif </span> <br>
                    @if($product->mrp_per_kg * 30 > $product->monthly_charge)
                    <del id="delprice">₹{{$product->mrp_per_kg }}</del>
                    @endif
                    @if($product->discount_percentage_delivery_subscription == 0)
                    <label>Free delivery</label>
                    @endif
                </p>
                <div class="single-infoagile">
                    <ul>
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
                            <select name="quantity" id="quantity" onchange="quantityPriceCalculation(this.value)">
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
            </div>
            <div class="col-md-12">
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

                    <?php
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $order_id = '#SUB' . substr(str_shuffle($str_result), 0, 6);
        ?>

                    <div class="checkout-left" id="addressPayment" style="display: none;">
                        <div class="address_form_agile">
                            <h4>Add a new Details</h4>
                            <form action="{{url('post_orders_subscription')}}" method="post" id="paymentForm"
                                class="creditly-card-form agileinfo_form">
                                @csrf
                                <input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" />
                                <input type="hidden" id="key" name="key" value="TOQkozk8" />
                                <input type="hidden" id="salt" name="salt" value="azZk130FkV" />
                                <input type="hidden" id="txnid" name="txnid" value="{{$order_id}}" />
                                <input type="hidden" id="hash" name="hash" value="" />
                                <input type="hidden" id="userId" name="userId" value="{{auth()->user()->id}}" />
                                <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                                    <div class="information-wrapper">
                                        <div class="first-row">
                                            <div class="controls">
                                                <input class="billing-address-name" type="text" name="name" id="name"
                                                    placeholder="Full Name" required="">
                                            </div>
                                            <div class="w3_agileits_card_number_grids">
                                                <div class="w3_agileits_card_number_grid_left">
                                                    <div class="controls">
                                                        <input type="text" placeholder="Mobile Number" id="mobile"
                                                            name="mobile" required="">
                                                    </div>
                                                </div>
                                                <div class="w3_agileits_card_number_grid_left">
                                                    <div class="controls">
                                                        <input type="text" placeholder="Email" name="email" id="email"
                                                            required="">
                                                    </div>
                                                </div>
                                                <div class="w3_agileits_card_number_grid_right">
                                                    <div class="controls">
                                                        <input type="textarea" id="address" placeholder="Full Address"
                                                            name="address" required="">
                                                    </div>
                                                </div>
                                                <div class="w3_agileits_card_number_grid_right">
                                                    <div class="controls">
                                                        <input id="landmark" type="text" placeholder="Landmark"
                                                            name="landmark" required="">
                                                    </div>
                                                </div>
                                                <div class="clear"> </div>
                                            </div>
                                            <div class="controls">
                                                <input id="city" type="text" placeholder="Town/City" name="city"
                                                    required="">
                                            </div>
                                            <div class="controls">
                                                <select class="option-w3ls" name="address_type" id="address_type">
                                                    <option default disabled>Select Address type</option>
                                                    <option value="Home">Home</option>
                                                    <option value="Office">Office</option>
                                                    <option value="Commercial">Commercial</option>

                                                </select>
                                            </div>
                                            <div class="clear"> </div>
                                            <div class="controls">
                                                <h4>Comfirm your order</h4>
                                                <h5 style="    color: #ff7600; margin-bottom: 10px;">*For the
                                                    Subscription you have to pay the amount in Advance</h5>

                                            </div>
                                            <?php
                                    if($product->quantity_in_grams == 1)
                                        $total = ($product->minimum_quantity * $product->monthly_charge)/1000;
                                    else
                                       $total = $product->monthly_charge;
                                ?>
                                            Sub Total: <span id="subTotalText">{{$total}}</span><br>
                                            Quantity: <span id="quantityDisplayText"></span><br>
                                            Delivery Charge: <span id="deliveryChargeText">0</span><br>

                                            <h4 style="    margin-bottom: 2px; font-size: 18px;"> Final Value: <span
                                                    id="finalPriceText"></span> </h4><br>
                                        </div>
                                        <input type="hidden" id="monthly_charge" name="monthly_charge"
                                            value="{{$product->monthly_charge}}">
                                        <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" id="quantity_in_grams" name="quantity_in_grams"
                                            value="{{$product->quantity_in_grams}}">
                                        <input type="hidden" id="discount_percentage_delivery"
                                            name="discount_percentage_delivery"
                                            value="{{$product->discount_percentage_delivery_subscription}}">
                                        <input type="hidden" value="" name="deliveryPincode" id="deliveryPincode">
                                        <input type="hidden" id="subtotalOrder" name="subtotalOrder" value="{{$total}}">
                                        <input type="hidden" id="deliveryChargeOrder" name="deliveryChargeOrder"
                                            value="0">
                                        <input type="hidden" id="finalPriceOrder" name="finalPriceOrder" value="0">
                                        <button type="button" class="submit check_out" id="makePaymentButton"
                                            onclick="makePaymentHideButton()">Place Order <span
                                                class="fa fa-hand-o-right" aria-hidden="true"></span></button>
                                        <img src="{{asset('images/25.gif')}}" id="preloadermakePaymentButton"
                                            style="display: none; height: 30px;">
                                    </div>
                                </div>
                            </form>
                            <!-- <div class="checkout-right-basket">
                    <a href="payment.html">Make a Payment
                        <span class="fa fa-hand-o-right" aria-hidden="true"></span>
                    </a>
                </div> -->
                            <div class="clearfix"> </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
<input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
    <style>
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
    <!-- //special offers -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" type="text/javascript">
    </script>

    <!-- //Single Page -->
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

function quantityPriceCalculation(n) {
    var quantityInGrams = document.getElementById('quantity_in_grams').value;
    var monthlyCharge = document.getElementById('monthly_charge').value;
    if (quantityInGrams == 1) {
        document.getElementById('subtotalOrder').value = (Number(document.getElementById('monthly_charge').value) * n) /
            1000;
        document.getElementById('quantityDisplayText').innerText = (n / 1000) + 'kg';
    } else {
        document.getElementById('subtotalOrder').value = (Number(document.getElementById('monthly_charge').value) * n);
        document.getElementById('quantityDisplayText').innerText = n;
    }
    document.getElementById('subTotalText').innerText = '₹' + document.getElementById('subtotalOrder').value;
    document.getElementById('finalPriceText').innerText = '₹' + ((Number(document
        .getElementById('subtotalOrder').value)) + (Number(document
        .getElementById('deliveryChargeOrder').value)));
    document.getElementById('finalPriceOrder').value = ((Number(document
        .getElementById('subtotalOrder').value)) + (Number(document
        .getElementById('deliveryChargeOrder').value)));
}

function checkPincode() {
    var pin = document.getElementById('pincode').value;
    var deliveryDiscount = document.getElementById('discount_percentage_delivery').value;
    if (pin == "" || pin == null) {
        swal({
            title: "Warning",
            text: "No Pincode Found.",
            icon: "warning",
        });
    } else {
        document.getElementById('verifyPincodeButton').style.display = 'none';
        document.getElementById('preloaderPincode').style.display = 'block';
        console.log(pin);
        $.ajax({
            type: "GET",
            url: "http://localhost:8000/check_pincode/" +
                pin, // You add the id of the post and the update datetime to the url as well
            success: function(response) {
                var deliveryPrice = response.data.delivery_charge * (deliveryDiscount / 100);
                document.getElementById('pincodeStatus').innerText = response.data.message;
                document.getElementById('pincodeStatus').style.display = 'block';
                console.log(response);
                if (response.data.status == "success") {
                    document.getElementById('deliveryChargeText').innerText = '₹' + deliveryPrice;
                    document.getElementById('finalPriceText').innerText = '₹' + ((Number(document
                        .getElementById('subtotalOrder').value)) + deliveryPrice);

                    document.getElementById('addressPayment').style.display = 'block';
                    document.getElementById('pincode').readOnly = true;
                    document.getElementById('editPincodeButton').style.display = 'block';
                    document.getElementById('preloaderPincode').style.display = 'none';
                    document.getElementById('deliveryPincode').value = pin;

                    document.getElementById('finalPriceOrder').value = ((Number(document
                        .getElementById('subtotalOrder').value)) + deliveryPrice);
                    document.getElementById('deliveryChargeOrder').value = deliveryPrice;

                } else {
                    document.getElementById('deliveryChargeText').innerText = 'Enter Pincode First';
                    document.getElementById('finalPriceText').innerText = 'Enter Pincode First';
                    document.getElementById('addressPayment').style.display = 'none';
                    document.getElementById('verifyPincodeButton').style.display = 'block';
                    document.getElementById('preloaderPincode').style.display = 'none';

                    document.getElementById('finalPriceOrder').value = 0;
                    document.getElementById('deliveryChargeOrder').value = 0;
                }
                // swal({
                //     title: response.data.status,
                //     text: response.data.message,
                //     icon: response.data.status,
                // });
            }
        });
    }
}

function editPincode() {
    document.getElementById('pincode').readOnly = false;
    document.getElementById('verifyPincodeButton').style.display = 'block';
    document.getElementById('editPincodeButton').style.display = 'none';
    document.getElementById('addressPayment').style.display = 'none';
}

function getHash() {
    console.log("332")
    var s2 = ($('#txnid').val()).substr(1)
    $.ajax({
        url: 'http://localhost:8000/getHash2',
        type: 'post',
        data: {
            _token: document.getElementById('token').value,
            key: $('#key').val(),
            salt: $('#salt').val(),
            txnid: $('#txnid').val(),
            amount: $('#finalPriceOrder').val(),
            pinfo: $('#txnid').val(),
            fname: $('#name').val(),
            email: $('#email').val(),
            mobile: $('#mobile').val(),
            udf5: $('#udf5').val(),
            landmark: $('#landmark').val(),
            address: $('#address').val(),
            city: $('#city').val(),
            quantity: $('#quantity').val(),
            product_id: $('#product_id').val(),
            deliveryPincode: $('#deliveryPincode').val(),
            address_type: $('#address_type').val(),
            subtotalOrder: $('#subtotalOrder').val(),
            deliveryChargeOrder: $('#deliveryChargeOrder').val()
        },
        success: function(json) {
            console.log(json)
            document.getElementById('hash').value = json.data.message;
            bolt.launch({
                key: $('#key').val(),
                txnid: $('#txnid').val(),
                hash: json.data.message,
                amount: $('#finalPriceOrder').val(),
                firstname: $('#name').val(),
                email: $('#email').val(),
                phone: $('#mobile').val(),
                productinfo: $('#txnid').val(),
                udf5: $('#udf5').val(),
                surl: 'http://localhost:8000/paymentPayUSubscription?_token=' + document
                    .getElementById('token').value,
                furl: 'http://localhost:8000/failed_payment',
                mode: 'dropout'
            }, {
                responseHandler: function(BOLT) {
                    console.log(BOLT.response.txnStatus);
                    if (BOLT.response.txnStatus != 'CANCEL') {
                        //Salt is passd here for demo purpose only. For practical use keep salt at server side only.
                        console.log(BOLT.response);
                        var form = jQuery(fr);
                        // jQuery('body').append(form);								
                        // form.submit();
                    }
                },
                catchException: function(BOLT) {
                    console.log("error ", BOLT);
                    alert(BOLT.message);
                }
            });
        }
    });
}

async function makePaymentHideButton() {
  
     if ($("#name").val() && $("#mobile").val() && $("#address").val() && $("#city").val() && $("#landmark").val() && $("#email").val()) 
     {
    //document.getElementById('preloadermakePaymentButton').style.display = 'block';
   // document.getElementById('makePaymentButton').style.display = 'none';
   // var paymentMethod = 2;
    // var ele = document.getElementsByName('payment_method');

    // for (i = 0; i < ele.length; i++) {
    //     if (ele[i].checked)
    //         paymentMethod = ele[i].value;
    // }
    // if (Number(paymentMethod) == 1) {
        let hashValue = await getHash();
     }
        else{
            swal({
                title: "Add complete address details",
                text: "Please fill up the complete address details form",
                icon: "error",
            });
        }
}
    </script>
    @include('footer')