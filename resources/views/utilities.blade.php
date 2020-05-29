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
                <li>Utilities</li>
            </ul>
        </div>
    </div>
</div>
<div class="ads-grid">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Welcome To Bazaar24x7
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <div class="agileinfo-ads-display col-md-12">
            <div class="wrapper">
            @foreach($utilities as $key => $cat)
                <div class="col-md-3 men-thumb-item-sale product-men">
                    <div class="men-pro-item simpleCart_shelfItem">
                        <div class="front-item">
                            <img src="{{ Storage::disk(config('voyager.storage.disk'))->url($cat->image) }}" alt="">
                        </div>
                        <div style="    height: 94px;" class="item-info-product ">
                            <h4 class="h4-design">
                                {{$cat->name}}
                            </h4>
                            <br>
                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                <input type="button" onclick="saveUtilityId({{$cat->id}})" data-toggle="modal" data-target="#{{$cat->locationRequired ? 'carModal' : 'utilModal' }}" value="View Products"
                                    class="button" />


                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- <div class="col-md-3 men-thumb-item-sale product-men">
                    <div class="men-pro-item simpleCart_shelfItem">
                        <div class="front-item">
                            <img src="images/k1.jpg" alt="">
                        </div>
                        <div style="    height: 94px;" class="item-info-product ">
                            <h4 class="h4-design">
                                Laundry
                            </h4>
                            <br>
                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                <input type="button" data-toggle="modal" data-target="#utilModal" value="View Products"
                                    class="button" />


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 men-thumb-item-sale product-men">
                    <div class="men-pro-item simpleCart_shelfItem">
                        <div class="front-item">
                            <img src="images/k1.jpg" alt="">
                        </div>
                        <div style="    height: 94px;" class="item-info-product ">
                            <h4 class="h4-design">
                                Electrician
                            </h4>
                            <br>
                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                <input type="button" data-toggle="modal" data-target="#utilModal" value="View Products"
                                    class="button" />


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 men-thumb-item-sale product-men">
                    <div class="men-pro-item simpleCart_shelfItem">
                        <div class="front-item">
                            <img src="images/k1.jpg" alt="">
                        </div>
                        <div style="    height: 94px;" class="item-info-product ">
                            <h4 class="h4-design">
                                Car Rent
                            </h4>
                            <br>
                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                <input type="button" data-toggle="modal" data-target="#carModal" value="View Products"
                                    class="button" />


                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="clearfix"></div>
                <div class="product-sec1 product-sec2">
                    <div class="col-xs-7 effect-bg">
                        <h3 class="">Bazaar 24x7</h3>
                        <h6>Enjoy our all healthy Products</h6>
                        <!-- <p>Get Extra 10% Off</p> -->
                    </div>
                    <h3 class="w3l-nut-middle">Same day Delivery</h3>
                    <div class="col-xs-5 bg-right-nut">
                        <img class="welcome-img-banner" src="images/fruit_veg.png" alt="">
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Modal pupup -->
    <div class="modal fade" id="utilModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title details">Please fill the all details</h4>
                </div>
                <form action="{{url('save_utilities')}}" method="post">
                @csrf
                <input type="hidden" id="utility" name="utility">
                 <input type="hidden" name="pick_location" value="">
                <input type="hidden" name="drop_location" value="">
                    
                <div class="modal-body">
                    <div class="form-group row">

                        <label style="text-align:right" class="col-md-4 col-form-label text-md-right">Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="" placeholder="Enter your name"
                                required autocomplete="">
                        </div>
                    </div>
                    <div class="form-group row">

                        <label style="text-align:right" class="col-md-4 col-form-label text-md-right">Phone
                            Number</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="ph_num" value=""
                                placeholder="Enter your number" required autocomplete="">
                        </div>
                    </div>

                    <div class="form-group row">

                        <label style="text-align:right" class="col-md-4 col-form-label text-md-right">Address</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="add" value="" placeholder="Enter your address"
                                required autocomplete="">
                        </div>
                    </div>
                    <div class="form-group row">

                        <label style="text-align:right" class="col-md-4 col-form-label text-md-right">Messages</label>

                        <div class="col-md-6">
                            <textarea class="form-control" name="message" value="" required autocomplete=""></textarea>
                        </div>

                        <div style="text-align: center; margin-top: 1em;" class="col-md-12 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pupup-close" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>

    </div>

    <!-- Modal pupup -->
    <div class="modal fade" id="carModal" role="dialog">


        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title details">Please fill the all details</h4>
                </div>
                <form action="{{url('save_utilities')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                    <input type="hidden" id="utility2" name="utility">
                        <label style="text-align:right" class="col-md-4 col-form-label text-md-right">Pick up
                            location</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="pick_location" value=""
                                placeholder="Enter your location" required autocomplete="">
                        </div>
                    </div>
                    <div class="form-group row">

                        <label style="text-align:right" class="col-md-4 col-form-label text-md-right">Drop
                            location</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="drop_location" value=""
                                placeholder="Enter your location" required autocomplete="">
                        </div>
                    </div>
                    <div class="form-group row">

                        <label style="text-align:right" class="col-md-4 col-form-label text-md-right">Name</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="" placeholder="Enter your Name"
                                required autocomplete="">
                        </div>
                    </div>
                    <div class="form-group row">

                        <label style="text-align:right" class="col-md-4 col-form-label text-md-right">Phone
                            Number</label>

                        <div class="col-md-6">
                            <input type="number" class="form-control" name="ph_num" value=""
                                placeholder="Enter your number" required autocomplete="">
                        </div>
                    </div>


                    <div class="form-group row">

                        <label style="text-align:right" class="col-md-4 col-form-label text-md-right">Messages</label>

                        <div class="col-md-6">
                            <textarea class="form-control" name="" value="" required autocomplete="">
                       </textarea>
                        </div>

                        <div style="text-align: center; margin-top: 1em;" class="col-md-12 offset-md-4">
                            <button type="button" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default pupup-close" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function saveUtilityId(id)
        {
            document.getElementById("utility").value=id;
            document.getElementById("utility2").value=id;
        }
    </script>
    @include('footer')