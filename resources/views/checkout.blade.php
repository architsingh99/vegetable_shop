@include('header')
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
                <li>Checkout</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- checkout page -->
<div class="privacy">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Checkout
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <div class="checkout-right">
            <h4>Your shopping cart contains:
                <span>{{count($checkout)}} Products</span>
            </h4>
            <?php $total = 0;
            $catCheck=0; ?>
            <div class="table-responsive">
                <table class="timetable_sub table-hover">
                    @if(count($checkout) > 0)
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Product Name</th>
                            <th>Quality</th>


                            <th class="text-al-left">Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach($checkout as $key => $value)
                        @if($value->product->category == '2')
                        {{$catCheck = 1}}
                        @endif
                        <tr class="rem{{($key % 2) + 1}}">
                            <td class="invert">{{$key + 1}}</td>
                            <td class="invert-image">
                                <img class="cart-img"
                                    src="{{ Storage::disk(config('voyager.storage.disk'))->url($value->product->main_image) }}"
                                    alt=" ">
                            </td>
                            <td class="invert">{{$value->product->name}}</td>
                            <td class="invert">
                                <div class="quantity">
                                    <div class="quantity-select">
                                        <!-- <div class="entry value-minus">&nbsp;</div>
											<div class="entry value">
												<span>1</span>
											</div>
                                            <div class="entry value-plus active">&nbsp;</div> -->
                                        <?php
                                        $dividedBy = 1; 
                                        if($value->product->quantity_in_grams == 1)
                                             $dividedBy = 1000;
                                        $total = $total + (int)($value->product->price_per_kg * $value->quantity / $dividedBy); ?>
                                        <input type="hidden" id="old_quantity{{$value->id}}"
                                            value="{{$value->quantity}}">
                                        <select class="form-control" onchange="changeQuantity({{$value->id}}, this.value, {{$value->product->price_per_kg}}, 
                                            {{$value->product->quantity_in_grams}})" name="quantity{{$value->id}}"
                                            id="quantity{{$value->id}}">
                                            @for($i=1;$i<=100;$i++) {{$value->product}} <option
                                                value="{{($value->product->minimum_quantity * $i)}}"
                                                {{($value->quantity == $value->product->minimum_quantity * $i) ? "selected" : ""}}>
                                                <?php
                                                    if($value->product->quantity_in_grams == 1)
                                                        $valueForDisplay = ($value->product->minimum_quantity * $i) < 1000 ? ($value->product->minimum_quantity * $i) . " g" : ($value->product->minimum_quantity * $i)/1000 . " kg";
                                                    else
                                                        $valueForDisplay = $value->product->minimum_quantity * $i;
                                                    ?>
                                                {{$valueForDisplay}}
                                                </option>
                                                @endfor
                                        </select>
                                    </div>
                                </div>
                            </td>


                            <td class="text-al-left invert" id="price{{$value->id}}">
                                ₹{{$value->product->price_per_kg * $value->quantity / $dividedBy}}</td>
                            <td class="invert">
                                <a href="{{url('remove_from_cart', $value->id)}}" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a></td>
                        </tr>
                        @endforeach

                        <tr class="rem2">
                            <td style="text-align: right;" class="invert" colspan="4">Discount Amount</td>
                            <td class="text-al-left invert" colspan="2" id="discountAmountText">₹0</td>

                        </tr>

                        <tr class="rem2">
                            <td style="text-align: right;" class="invert" colspan="4">Sub Total</td>
                            <td class="text-al-left invert" colspan="2" id="subtotalText">₹{{$total}}</td>

                        </tr>
                        <tr class="rem1">
                            <td style="text-align: right;" class="invert" colspan="4">Delivery Charge</td>
                            <td class="text-al-left invert" colspan="2" id="deliveryChargeText">Enter Pincode First</td>
                        </tr>
                        <tr class="rem1">
                            <td style="text-align: right;" class="invert" colspan="4">Final Total</td>
                            <td class="text-al-left invert" colspan="2" id="finalPriceText">Enter Pincode First</td>

                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
        <input type="hidden" id="subtotal" name="subtotal" value="{{$total}}">
        <input type="hidden" id="deliveryCharge" name="deliveryCharge" value="0">
        <input type="hidden" id="finalPrice" name="finalPrice" value="0">
        <input type="hidden" id="subTotalForCoupon" value="{{$total}}">
        @if(count($checkout) > 0)
        <div class="container  col-md-12">
            <div class="col-md-6 cupon pincode-div pincode-box ">

                <input class="pincode-field" type="text" name="coupon" id="coupon" placeholder="Enter coupon code"
                    required="">

                <button class="pincode-field-button" onclick="applyCoupon()" id="applyCouponButton">Apply</button>
                <!-- <button class="pincode-field-button" onclick="editCoupon()" id="editCouponButton"
                style="display: none;">Edit Coupon</button> -->

                <img src="{{asset('images/25.gif')}}" id="preloaderCoupon" style="display: none; height: 30px;">

                <p style="color: red; display:none;" id="couponStatus"></p>
                <input type="hidden" id="couponCodeValue" value="0">
            </div>

            <div class="col-md-6 pincode-div pincode-box ">
                <h4 style="    margin-bottom: 8px;">Currently we are available in Jorhat area only (785001)</h4>

                <input class="pincode-field" type="number" name="pincode" id="pincode"
                    placeholder="Enter your Jorhat area pincode" required="">

                <button class="pincode-field-button" onclick="checkPincode()" id="verifyPincodeButton">Verify</button>
                <button class="pincode-field-button" onclick="editPincode()" id="editPincodeButton"
                    style="display: none;">Edit Pincode</button>
                <img src="{{asset('images/25.gif')}}" id="preloaderPincode" style="display: none; height: 30px;">

                <p style="color: red; display:none;" id="pincodeStatus"></p>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $order_id = '#' . substr(str_shuffle($str_result), 0, 9);
        ?>

        <div class="checkout-left" id="addressPayment" style="display: none;">
            <div class="address_form_agile">
                <h4>Add a new Details</h4>
                <form action="{{url('post_orders')}}" method="post" id="paymentForm"
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
                                            <input type="text" placeholder="Mobile Number" id="mobile" name="mobile"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_left">
                                        <div class="controls">
                                            <input type="text" placeholder="Email" name="email" id="email" required="">
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
                                            <input id="landmark" type="text" placeholder="Landmark" name="landmark"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="clear"> </div>
                                </div>
                                <div class="controls">
                                    <input id="city" type="text" placeholder="Town/City" name="city" required="">
                                </div>
                                <div class="controls">
                                    <select class="option-w3ls" name="address_type" id="address_type">
                                        <option default disabled>Select Address type</option>
                                        <option value="Home">Home</option>
                                        <option value="Office">Office</option>
                                        <option value="Commercial">Commercial</option>l

                                    </select>
                                </div>
                                <div class="clear"> </div>
                                <div class="controls">
                                    <h4>Payment Method</h4>
                                    <h5 style="    color: #ff7600;  margin-bottom: 10px;">*Pay online to get faster
                                        processing of your order</h5>
                                    <input type="radio" style="width: auto;" name="payment_method" id="payment_method"
                                        required="" value="1" checked>Pay Now

                                    <br>
                                    @if($catCheck == 0)
                                    <input type="radio" style="width: auto;" name="payment_method" id="payment_method"
                                        required="" value="2">Cash On Delivery
                                    @else
                                    <h5 style="    color: #ff0000;    font-size: 16px;    margin-top: 10px;">#Cash on
                                        delivery is not available when you order <b>Resturant Food </b></h5>
                                    @endif

                                </div>
                            </div>

                            <input type="hidden" value="" name="deliveryPincode" id="deliveryPincode">
                            <input type="hidden" id="subtotalOrder" name="subtotalOrder" value="{{$total}}">
                            <input type="hidden" id="deliveryChargeOrder" name="deliveryChargeOrder" value="0">
                            <input type="hidden" id="finalPriceOrder" name="finalPriceOrder" value="0">
                            <button type="button" class="submit check_out" id="makePaymentButton"
                                onclick="makePaymentHideButton()">Place Order <span class="fa fa-hand-o-right"
                                    aria-hidden="true"></span></button>
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
            </div>
            <div class="clearfix"> </div>
        </div>
        @endif
    </div>
</div>

<script src="{{ asset('js/searching.js') }}"></script>
@include('footer')