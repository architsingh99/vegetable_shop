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
            <?php $total = 0; ?>
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
                                        <input type="hidden" id="old_quantity{{$value->id}}" value="{{$value->quantity}}">
                                        <select class="form-control"
                                            onchange="changeQuantity({{$value->id}}, this.value, {{$value->product->price_per_kg}}, 
                                            {{$value->product->quantity_in_grams}})"
                                            name="quantity{{$value->id}}" id="quantity{{$value->id}}">
                                            @for($i=1;$i<=100;$i++) {{$value->product}} 
                                            <option
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

        @if(count($checkout) > 0)
        <div class="pincode-div pincode-box ">
            <h4 style="    margin-bottom: 8px;">Currently we are available in Jorhat area only</h4>

            <input class="pincode-field" type="number" name="pincode" id="pincode" placeholder="Enter your Jorhat area pincode" required="">

            <button class="pincode-field-button" onclick="checkPincode()" id="verifyPincodeButton">Verify</button>
            <button class="pincode-field-button" onclick="editPincode()" id="editPincodeButton"
                style="display: none;">Edit Pincode</button>
                <img src="{{asset('images/25.gif')}}" id="preloaderPincode" style="display: none; height: 30px;">

            <p style="color: red; display:none;" id="pincodeStatus"></p>
		</div>
        <?php
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $order_id = '#' . substr(str_shuffle($str_result), 0, 9);
        ?>

        <div class="checkout-left" id="addressPayment" style="display: none;">
            <div class="address_form_agile">
                <h4>Add a new Details</h4>
                <form action="{{url('post_orders')}}" method="post" id="paymentForm" class="creditly-card-form agileinfo_form">
                @csrf
                <input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" />
                <input type="hidden" id="key" name="key" value="TOQkozk8" />
                <input type="hidden" id="salt" name="salt" value="azZk130FkV" />
                <input type="hidden" id="txnid" name="txnid" value="{{$order_id}}" />
                <input type="hidden" id="hash" name="hash" value=""/>
                <input type="hidden" id="userId" name="userId" value="{{auth()->user()->id}}"/>
                    <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row">
                                <div class="controls">
                                    <input class="billing-address-name" type="text" name="name" id="name" placeholder="Full Name"
                                        required="">
                                </div>
                                <div class="w3_agileits_card_number_grids">
                                    <div class="w3_agileits_card_number_grid_left">
                                        <div class="controls">
                                            <input type="text" placeholder="Mobile Number" id="mobile" name="mobile" required="">
                                        </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_left">
                                        <div class="controls">
                                            <input type="text" placeholder="Email" name="email" id="email" required="">
                                        </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right">
                                        <div class="controls">
                                            <input id="landmark" type="text" placeholder="Landmark" name="landmark" required="">
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
                                        <option value="Commercial">Commercial</option>

                                    </select>
                                </div>
                                <div class="clear"> </div>
                                <div class="controls">
                                <h4>Payment Method</h4>
                                <h5 style="    color: #ff7600;
    margin-bottom: 10px;">*Pay online to get faster processing of your order</h5>
                                    <input type="radio" style="width: auto;" name="payment_method" id="payment_method" required="" value="1" checked>Pay Now
                                    <br><input type="radio" style="width: auto;" name="payment_method" id="payment_method" required="" value="2">Cash On Delivery
                                </div>
                            </div>
                            <input type="hidden" value="" name="deliveryPincode" id="deliveryPincode">
                            <input type="hidden" id="subtotalOrder" name="subtotalOrder" value="{{$total}}">
                            <input type="hidden" id="deliveryChargeOrder" name="deliveryChargeOrder" value="0">
                            <input type="hidden" id="finalPriceOrder" name="finalPriceOrder" value="0">
                            <button type="button"class="submit check_out" id="makePaymentButton" onclick="makePaymentHideButton()">Place Order <span class="fa fa-hand-o-right" aria-hidden="true"></span></button>
                            <img src="{{asset('images/25.gif')}}" id="preloadermakePaymentButton" style="display: none; height: 30px;">
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

<script>
function changeQuantity(cart_id, quantity, price_per_kg, quantity_type) {
    //alert(cart_id)
    var y = 'old_quantity' + cart_id;
    var old_quantity = document.getElementById(y).value;
    var oldprice = (old_quantity * price_per_kg);
    var newprice = (quantity * price_per_kg);
    if(Number(quantity_type) == 1)
    {
         oldprice = oldprice / 1000;
         newprice = newprice / 1000;
    }
    var z = 'price' + cart_id;

    $.ajax({
        type: "POST",
        url: "http://localhost:8000/update_cart",
        data: {
            _token: document.getElementById('token').value,
            cart_id: cart_id,
            quantity: quantity
        },
        success: function(response) {
            document.getElementById('subtotalText').innerText = '₹' + (Number(document.getElementById(
                'subtotal').value) - oldprice + newprice);
            document.getElementById('subtotal').value = Number(document.getElementById('subtotal').value) -
                oldprice + newprice;
            document.getElementById('subtotalOrder').value =  document.getElementById('subtotal').value;
                    
            if (Number(document.getElementById('deliveryCharge').value) > 0) {
                document.getElementById('finalPriceText').innerText = '₹' + ((Number(document
                    .getElementById('subtotal').value)) + (Number(document.getElementById(
                    'deliveryCharge').value)));
                document.getElementById('finalPrice').value = (Number(document.getElementById('subtotal')
                    .value)) + (Number(document.getElementById('deliveryCharge').value));
                document.getElementById('finalPriceOrder').value = document.getElementById('finalPrice').value;
                
            }
            document.getElementById(z).innerText = '₹' + newprice;
            document.getElementById(y).value = quantity;
            // swal({
            //     title: response.data.status,
            //     text: response.data.message,
            //     icon: response.data.status,
            // });
            console.log(response);
            console.log("oldquan=", old_quantity);
            console.log("oldPrice=", oldprice);
            console.log("newquan=", quantity);
        }
    });
}

function checkPincode() {
    var pin = document.getElementById('pincode').value;
    document.getElementById('verifyPincodeButton').style.display = 'none';
    document.getElementById('preloaderPincode').style.display = 'block';
    if (pin == "" || pin == null) {
        swal({
            title: "Warning",
            text: "No Pincode Found.",
            icon: "warning",
        });
    } else {
        console.log(pin);
        $.ajax({
            type: "GET",
            url: "http://localhost:8000/check_pincode/" +
                pin, // You add the id of the post and the update datetime to the url as well
            success: function(response) {
                document.getElementById('pincodeStatus').innerText = response.data.message;
                document.getElementById('pincodeStatus').style.display = 'block';
                console.log(response);
                if (response.data.status == "success") {
                    document.getElementById('deliveryChargeText').innerText = '₹' + response.data
                        .delivery_charge;
                    document.getElementById('deliveryCharge').value = response.data.delivery_charge;
                    document.getElementById('finalPriceText').innerText = '₹' + ((Number(document
                        .getElementById('subtotal').value)) + (Number(document.getElementById(
                        'deliveryCharge').value)));
                    document.getElementById('finalPrice').value = (Number(document.getElementById(
                        'subtotal').value)) + (Number(document.getElementById('deliveryCharge').value));
                    document.getElementById('addressPayment').style.display = 'block';
                    document.getElementById('pincode').readOnly = true;
                    document.getElementById('editPincodeButton').style.display = 'block';
                    document.getElementById('preloaderPincode').style.display = 'none';
                    document.getElementById('deliveryPincode').value = pin;

                    document.getElementById('finalPriceOrder').value = document.getElementById('finalPrice').value;
                    document.getElementById('subtotalOrder').value =  document.getElementById('subtotal').value;
                    document.getElementById('deliveryChargeOrder').value =  response.data.delivery_charge;
                    
                } else {
                    document.getElementById('deliveryChargeText').innerText = 'Enter Pincode First';
                    document.getElementById('deliveryCharge').value = 0;
                    document.getElementById('finalPriceText').innerText = 'Enter Pincode First';
                    document.getElementById('finalPrice').value = 0;
                    document.getElementById('addressPayment').style.display = 'none';
                    document.getElementById('verifyPincodeButton').style.display = 'block';
                    document.getElementById('preloaderPincode').style.display = 'none';

                    document.getElementById('finalPriceOrder').value = 0;
                    document.getElementById('deliveryChargeOrder').value =  0;
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

async function makePaymentHideButton() {
    if(Number(document.getElementById('finalPriceOrder').value) < 250)
    {
        swal({
                    title: "Error",
                    text: "Minimum cart value should be Rs.250.",
                    icon: "error",
                });
    }
    else
    {
    document.getElementById('preloadermakePaymentButton').style.display = 'block';
    document.getElementById('makePaymentButton').style.display = 'none';
    var paymentMethod = 2;
    var ele = document.getElementsByName('payment_method'); 
              
              for(i = 0; i < ele.length; i++) { 
                  if(ele[i].checked) 
                     paymentMethod = ele[i].value;
              } 
    if(Number(paymentMethod) == 1)
    {
        let hashValue = await getHash();
        //this.launchBOLT(hashValue);
    }
    else
        document.getElementById('paymentForm').submit();
    }
}

function getHash()
{
    console.log("332")
    var s2 = ($('#txnid').val()).substr(1)
    $.ajax({
          url: 'http://localhost:8000/getHash',
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
            city: $('#city').val(),
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
	surl : 'http://localhost:8000/post_orders',
	furl: 'http://localhost:8000/failed_payment',
	mode: 'dropout'	
},{ responseHandler: function(BOLT){
	console.log( BOLT.response.txnStatus );		
	if(BOLT.response.txnStatus != 'CANCEL')
	{
		//Salt is passd here for demo purpose only. For practical use keep salt at server side only.
		console.log(BOLT.response);
		var form = jQuery(fr);
		// jQuery('body').append(form);								
		// form.submit();
	}
},
	catchException: function(BOLT){
        console.log("error ", BOLT);
 		alert( BOLT.message );
	}
});
          }
        }); 
}

// function launchBOLT(hasValue)
// {
//     console.log("405 ", hasValue);
// 	bolt.launch({
// 	key: $('#key').val(),
// 	txnid: $('#txnid').val(), 
// 	hash: hasValue,
// 	amount: $('#finalPriceOrder').val(),
// 	firstname: $('#name').val(),
// 	email: $('#email').val(),
// 	phone: $('#mobile').val(),
// 	productinfo: $('#txnid').val(),
// 	udf5: $('#udf5').val(),
// 	surl : 'http://localhost:8000/success/1',
// 	furl: 'http://localhost:8000/getHash/1',
// 	mode: 'dropout'	
// },{ responseHandler: function(BOLT){
// 	console.log( BOLT.response.txnStatus );		
// 	if(BOLT.response.txnStatus != 'CANCEL')
// 	{
// 		//Salt is passd here for demo purpose only. For practical use keep salt at server side only.
// 		console.log(BOLT.response);
// 		var form = jQuery(fr);
// 		// jQuery('body').append(form);								
// 		// form.submit();
// 	}
// },
// 	catchException: function(BOLT){
//         console.log("error ", BOLT);
//  		alert( BOLT.message );
// 	}
// });
// }

// $('#payment_form').bind('keyup blur', function(){
// 	$.ajax({
//           url: 'http://localhost:8000/getHash',
//           type: 'post',
//           data: JSON.stringify({ 
//             key: $('#key').val(),
// 			salt: $('#salt').val(),
// 			txnid: $('#txnid').val(),
// 			amount: $('#amount').val(),
// 		    pinfo: $('#pinfo').val(),
//             fname: $('#fname').val(),
// 			email: $('#email').val(),
// 			mobile: $('#mobile').val(),
// 			udf5: $('#udf5').val()
//           }),
// 		  contentType: "application/json",
//           dataType: 'json',
//           success: function(json) {
//             if (json['error']) {
// 			 $('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);
//             }
// 			else if (json['success']) {	
// 				$('#hash').val(json['success']);
//             }
//           }
//         }); 
// });
</script>
@include('footer')