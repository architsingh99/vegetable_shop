@include('header')
<section style="background-color: #f7f7f7;" id="about" class="ls section_padding_top_100 section_padding_bottom_150">
<div class="container">
        <div class="row">
            <div class="col-sm-12 col-sm-offset-1 col-lg-10 col-lg-offset-1 text-center">
                <h2 style="    font-weight: 700;
    padding: 23px;
    color: green;
    margin-top: 2em;" class="section_header with_icon">
                    ORDER SUCCESSFULLY PLACED
                </h2>
                <p style="font-size: 20px;
    padding: 30px;
    letter-spacing: 0px;
    margin-bottom: 3em;">
                    {{$message}}
                </p>
            </div>
        </div>
</div>
</section>


@include('footer')