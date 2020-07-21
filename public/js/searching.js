function changeQuantity(cart_id, quantity, price_per_kg, quantity_type) {
    //alert(cart_id)
    var y = 'old_quantity' + cart_id;
    var old_quantity = document.getElementById(y).value;
    var oldprice = (old_quantity * price_per_kg);
    var newprice = (quantity * price_per_kg);
    if (Number(quantity_type) == 1) {
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
            document.getElementById('subtotalOrder').value = document.getElementById('subtotal').value;

            if (Number(document.getElementById('deliveryCharge').value) > 0) {
                document.getElementById('finalPriceText').innerText = '₹' + ((Number(document
                    .getElementById('subtotal').value)) + (Number(document.getElementById(
                    'deliveryCharge').value)));
                document.getElementById('finalPrice').value = (Number(document.getElementById('subtotal')
                    .value)) + (Number(document.getElementById('deliveryCharge').value));
                document.getElementById('finalPriceOrder').value = document.getElementById('finalPrice')
                    .value;

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

                    document.getElementById('finalPriceOrder').value = document.getElementById('finalPrice')
                        .value;
                    document.getElementById('subtotalOrder').value = document.getElementById('subtotal')
                        .value;
                    document.getElementById('deliveryChargeOrder').value = response.data.delivery_charge;

                } else {
                    document.getElementById('deliveryChargeText').innerText = 'Enter Pincode First';
                    document.getElementById('deliveryCharge').value = 0;
                    document.getElementById('finalPriceText').innerText = 'Enter Pincode First';
                    document.getElementById('finalPrice').value = 0;
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

function editCoupon() {
    document.getElementById('coupon').readOnly = false;
    document.getElementById('applyCouponButton').style.display = 'block';
    document.getElementById('editCouponButton').style.display = 'none';
}

function editPincode() {
    document.getElementById('pincode').readOnly = false;
    document.getElementById('verifyPincodeButton').style.display = 'block';
    document.getElementById('editPincodeButton').style.display = 'none';
    document.getElementById('addressPayment').style.display = 'none';
}

async function makePaymentHideButton() {

    if ($("#name").val() && $("#mobile").val() && $("#city").val() && $("#landmark").val() && $("#address").val() &&
        $("#email").val()) {

        if (Number(document.getElementById('finalPriceOrder').value) < 120) {
            swal({
                title: "Your order value is too low",
                text: "Minimum cart value should be atleast Rs.200",
                icon: "error",
            });
        } else {

            var x = $("#email").val();
            var atposition = x.indexOf("@");
            var dotposition = x.lastIndexOf(".");
            if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= x.length) {
                swal({
                    title: "Add correct email",
                    text: "Please enter a correct email id",
                    icon: "error",
                });
            } else {
                // document.getElementById('preloadermakePaymentButton').style.display = 'block';
                // document.getElementById('makePaymentButton').style.display = 'none';
                var paymentMethod = 2;
                var ele = document.getElementsByName('payment_method');

                for (i = 0; i < ele.length; i++) {
                    if (ele[i].checked)
                        paymentMethod = ele[i].value;
                }
                if (Number(paymentMethod) == 1) {
                    let hashValue = await getHash();
                    //this.launchBOLT(hashValue);
                } else
                    document.getElementById('paymentForm').submit();
            }
        }
    }
    else {
            swal({
                title: "Add complete address details",
                text: "Please fill up the complete address details form",
                icon: "error",
            });
        }

}

function getHash() {
    console.log("332")
    var s2 = ($('#txnid').val()).substr(1)
    var token = document.getElementById('token').value
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
            address: $('#address').val(),
            udf5: $('#udf5').val(),
            landmark: $('#landmark').val(),
            city: $('#city').val(),
            deliveryPincode: $('#deliveryPincode').val(),
            address_type: $('#address_type').val(),
            subtotalOrder: $('#subtotalOrder').val(),
            deliveryChargeOrder: $('#deliveryChargeOrder').val()
        },
        success: function(json) {
            console.log("207", json.data)
            if(json.data.status == 201)
            {
                swal({
                    title: "Warning",
                    text: json.data.message,
                    icon: "error",
                });
            }
            else
            {
            console.log(json)
            document.getElementById('hash').value = json.data.message;
            bolt.launch({
                key: $('#key').val(),
                txnid: $('#txnid').val(),
                hash: json.data.message,
                amount: Number(json.data.amount),
                firstname: $('#name').val(),
                email: $('#email').val(),
                phone: $('#mobile').val(),
                productinfo: $('#txnid').val(),
                udf5: $('#udf5').val(),
                surl: 'http://localhost:8000/paymentPayU?_token=' + token,
                furl: 'http://localhost:8000/failed_payment',
                mode: 'dropout'
            }, {
                responseHandler: function(BOLT) {
                    console.log(BOLT.response.txnStatus);
                    if (BOLT.response.txnStatus != 'CANCEL') {

                    }
                },
                catchException: function(BOLT) {
                    console.log("error ", BOLT);
                    alert(BOLT.message);
                }
            });
        }
    }
    });
}

function applyCoupon() {
    var couponCode = document.getElementById('coupon').value;

    if (couponCode == "" || couponCode == null) {
        swal({
            title: "Warning",
            text: "No Coupon Code Found.",
            icon: "warning",
        });
    } else {

        document.getElementById('preloaderCoupon').style.display = 'block';
        document.getElementById('applyCouponButton').style.display = 'none';

        $.ajax({
            type: "GET",
            url: "http://localhost:8000/apply_coupon/" +
                couponCode, // You add the id of the post and the update datetime to the url as well
            success: function(response) {
                document.getElementById('couponStatus').innerText = response.data.message;
                document.getElementById('couponStatus').style.display = 'block';
                //document.getElementById('coupon').readOnly = true;
                console.log(response);
                if (response.data.status == "success") {
                    if (Number(response.data.in_percentage_flat) == 0) {
                        var discountValue = (Number(document.getElementById('subTotalForCoupon').value)) * (
                            Number(response.data.amount) / 100);
                        document.getElementById('subtotalText').innerText = '₹' + (Number(document
                            .getElementById('subTotalForCoupon').value) - Number(discountValue));
                        document.getElementById('subtotalOrder').value = Number(document.getElementById(
                            'subTotalForCoupon').value) - Number(discountValue);

                        document.getElementById('couponCodeValue').value = Number(discountValue);
                    } else {
                        document.getElementById('subtotalText').innerText = '₹' + (Number(document
                            .getElementById('subTotalForCoupon').value) - Number(response.data
                            .amount));
                        document.getElementById('subtotalOrder').value = Number(document.getElementById(
                            'subTotalForCoupon').value) - Number(response.data.amount);

                        document.getElementById('couponCodeValue').value = Number(response.data.amount);
                    }
                    document.getElementById('discountAmountText').innerText = '₹' + document.getElementById(
                        'couponCodeValue').value;

                } else {
                    document.getElementById('subtotalText').innerText = '₹' + (Number(document
                        .getElementById('subTotalForCoupon').value));

                    document.getElementById('subtotalOrder').value = document.getElementById(
                        'subTotalForCoupon').value;

                    document.getElementById('couponCodeValue').value = 0;
                    document.getElementById('discountAmountText').innerText = '₹' + document.getElementById(
                        'couponCodeValue').value;
                }
                if (Number(document.getElementById('deliveryCharge').value) > 0) {
                    document.getElementById('finalPriceText').innerText = '₹' + ((Number(document
                        .getElementById('subtotalOrder').value)) + (Number(document.getElementById(
                        'deliveryCharge').value)));
                    document.getElementById('finalPrice').value = (Number(document.getElementById(
                            'subtotalOrder')
                        .value)) + (Number(document.getElementById('deliveryCharge').value));
                    document.getElementById('finalPriceOrder').value = document.getElementById('finalPrice')
                        .value;

                }
                // swal({
                //     title: response.data.status,
                //     text: response.data.message,
                //     icon: response.data.status,
                // });
            }
        });
        document.getElementById('applyCouponButton').style.display = 'block';
        document.getElementById('preloaderCoupon').style.display = 'none';
    }
}