@include('../header')
<center>
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-md-12">
                <div class="card">
                    @if (Auth::user())
                    <h2>
                        <div class="card-header">{{ __('Account Details') }}</div>
                    </h2>
                    <br><br>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{Auth::user()-> name}}"
                                    autocomplete="name" readonly>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email"
                                    value="{{Auth::user()-> email}}" readonly autocomplete="email">

                            </div>
                        </div>
                        <form method="POST" action="#">
                            @csrf

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Change Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control"
                                        placeholder="Want to create new Password?" name="password" required
                                        autocomplete="new-password">

                                </div>
                            </div>

                            <div class="form-group row mb-0" style="padding-left: 40%;">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="form-group row mb-0" style="padding-left: 40%;">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ url('../track_orders') }}" type="button"  class="btn btn-primary">
                                    {{ __('Check your previous orders!') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
    <div class="container" id="yourOrders" style="display: none; margin-bottom: 2em">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <div class="checkout-right">
                <h4>Your have placed
                    <span>10 orders</span>
                </h4>
                
                <div class="table-responsive">
                    <table class="timetable_sub table-hover">
                        
                        <thead>
                            <tr>
                                <th>Order date.</th>
                                <th>Order Id</th>
                                <th>Product Name</th>
                                <th >Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>


                           
                            <tr class="rem1">
                                <td class="invert">1/05/2020</td>
                                
                                <td class="invert">1234</td>
                                <td class="invert">
                                    Abc
                                </td>

                                <td class="invert">
                                    ₹20</td>
                                <td class="invert">
                                    Delivered</td>
                                
                            </tr>
                            

                           
                            
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
    </div>
</center>
<script>
function myorders() {
$("#yourOrders").show();
}
</script>
@include('../footer')