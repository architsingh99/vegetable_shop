@include('header')
<section style="background-color: #f7f7f7;" id="about" class="ls section_padding_top_100 section_padding_bottom_150">
<div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section_header with_icon">
                    PAYMENT SUCCESSFULL
                </h2>
                <p>
                    <h2>Your payment has been successfully recieved. Your ORDER ID is <b>{{$order_id}}</b> and TRANSACTION ID is <b>{{$transaction_id}}</b>. It will be delivered in approximately <b>{{$delivery_time}}</b><h2>
                </p>
            </div>
        </div>
</div>
</section>


@include('footer')