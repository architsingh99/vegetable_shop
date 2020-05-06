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
                                        <?php $total = $total + ($value->product->price_per_kg * $value->quantity / 1000); ?>
                                        <select class="form-control"
                                            onchange="changeQuantity({{$value->id}}, this.value, {{$value->product->price_per_kg}}, {{$value->quantity}})"
                                            name="quantity{{$value->id}}" id="quantity{{$value->id}}">
                                            @for($i=1;$i<=100;$i++) {{$value->product}} <option
                                                value="{{($value->product->minimum_quantity * $i)}}"
                                                {{($value->quantity == $value->product->minimum_quantity * $i) ? "selected" : ""}}>
                                                {{($value->product->minimum_quantity * $i) < 1000 ? ($value->product->minimum_quantity * $i) . " g" : ($value->product->minimum_quantity * $i)/1000 . " kg"}}
                                                </option>
                                                @endfor
                                        </select>
                                    </div>
                                </div>
                            </td>

                            <td class="text-al-left invert" id="price{{$value->id}}">
                                ₹{{$value->product->price_per_kg * $value->quantity / 1000}}</td>
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
            <h4 style="    margin-bottom: 8px;">Check availability at </h4>

            <input class="pincode-field" type="number" name="pincode" id="pincode" placeholder="Enter your Pincode" required="">

            <button class="pincode-field-button" onclick="checkPincode()" id="verifyPincodeButton">Verify</button>
            <button class="pincode-field-button" onclick="editPincode()" id="editPincodeButton"
                style="width: 35%; display: none;">Edit Pincode</button>

            <p style="color: red; display:none;" id="pincodeStatus"></p>
		</div>
		

        <div class="checkout-left" id="addressPayment" style="display: none;">
            <div class="address_form_agile">
                <h4>Add a new Details</h4>
                <form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
                    <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row">
                                <div class="controls">
                                    <input class="billing-address-name" type="text" name="name" placeholder="Full Name"
                                        required="">
                                </div>
                                <div class="w3_agileits_card_number_grids">
                                    <div class="w3_agileits_card_number_grid_left">
                                        <div class="controls">
                                            <input type="text" placeholder="Mobile Number" name="number" required="">
                                        </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right">
                                        <div class="controls">
                                            <input type="text" placeholder="Landmark" name="landmark" required="">
                                        </div>
                                    </div>
                                    <div class="clear"> </div>
                                </div>
                                <div class="controls">
                                    <input type="text" placeholder="Town/City" name="city" required="">
                                </div>
                                <div class="controls">
                                    <select class="option-w3ls">
                                        <option>Select Address type</option>
                                        <option>Office</option>
                                        <option>Home</option>
                                        <option>Commercial</option>

                                    </select>
                                </div>
                            </div>
                            <!-- <button class="submit check_out">Delivery to this Address</button> -->
                        </div>
                    </div>
                </form>
                <div class="checkout-right-basket">
                    <a href="payment.html">Make a Payment
                        <span class="fa fa-hand-o-right" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        @endif
    </div>
</div>

<script>
function changeQuantity(cart_id, quantity, price_per_kg, old_quantity) {
    //alert(cart_id)
    var oldprice = (old_quantity * price_per_kg) / 1000;
    var newprice = (quantity * price_per_kg) / 1000;
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
            if (Number(document.getElementById('deliveryCharge').value) > 0) {
                document.getElementById('finalPriceText').innerText = '₹' + ((Number(document
                    .getElementById('subtotal').value)) + (Number(document.getElementById(
                    'deliveryCharge').value)));
                document.getElementById('finalPrice').value = (Number(document.getElementById('subtotal')
                    .value)) + (Number(document.getElementById('deliveryCharge').value));
            }
            document.getElementById(z).innerText = '₹' + newprice;
            // swal({
            //     title: response.data.status,
            //     text: response.data.message,
            //     icon: response.data.status,
            // });
            console.log(response);
        }
    });
}

function checkPincode() {
    var pin = document.getElementById('pincode').value;
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
                    document.getElementById('verifyPincodeButton').style.display = 'none';
                    document.getElementById('editPincodeButton').style.display = 'block';
                } else {
                    document.getElementById('deliveryChargeText').innerText = 'Enter Pincode First';
                    document.getElementById('deliveryCharge').value = 0;
                    document.getElementById('finalPriceText').innerText = 'Enter Pincode First';
                    document.getElementById('finalPrice').value = 0;
                    document.getElementById('addressPayment').style.display = 'none';
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
</script>
@include('footer')