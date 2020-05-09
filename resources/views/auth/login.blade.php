@include('../header')
<div style="    padding-top: 2em;" class="container">
    <div class="row justify-content-center">
        <div style="    margin: auto;
    float: initial;" class="col-md-8">
            <div class="card" style="text-align:center">
                <h2>
                    <div class="card-header">Login to Bazaar24x7</div>
                </h2>
                <br><br>
                <div class="card-body">

                    <a href="{{ url('/auth/redirect/facebook') }}">
                        <img style="height: 45px" class="social-login" src="images/facebook.png">
                    </a>

                    <a href="{{ url('/auth/redirect/google') }}"><img style="height: 50px" class="social-login"
                            src="images/google.png">
                    </a>
                </div>

                <div class="card-body phonebtn">
                    <button type="submit" data-toggle="modal" data-target="#myModal" class="btn btn-primary phonelog">
                        Sign in with Phone Number
                    </button>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div style="text-align: center" class="col-md-12 offset-md-4">
                    <label class="col-form-label text-md-right">Or</label>
                </div>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if(isset($message))
                {{ $message }}
                @endif
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div style="text-align: center" class="col-md-12 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </div>
        </div>
    </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@include('../footer')

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login with phone number</h4>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label style="text-align:right" for="email"
                        class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                    <div class="col-md-6">
                        <input id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}"
                            required autocomplete="phone" autofocus>
                    </div>

                    <div style="text-align: center;    margin-top: 1em;" class="col-md-12 offset-md-4">
                        <button onclick="sendOTP(0)" type="submit" class="btn btn-primary">
                            Send OTP
                        </button>
                        <button onclick="editNumber()" type="submit" class="btn btn-primary" style="display: none;">
                            Edit Number
                        </button>
                        <button onclick="sendOTP(1)" type="submit" class="btn btn-primary" style="display: none;">
                            Resend OTP
                        </button>
                        <img src="{{asset('images/25.gif')}}" id="preloaderOTP" style="display: none; height: 30px;">
                    </div>
                </div>
                <div class="form-group row">
                    <div style=" margin: auto; float: inherit;" class="col-md-4">
                        <input id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}"
                            required autocomplete="phone" autofocus placeholder="Enter OTP">
                    </div>

                    <div style="text-align: center;    margin-top: 1em;" class="col-md-12 offset-md-4">
                     <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>

    <script>
        function sendOTP(key) {
    //alert(cart_id)
    var mobile = document.getElementById('phone').value;
    if(mobile == "" || mobile == null || mobile.length < 10)
    {
        swal({
                    title: "Error",
                    text: "Please enter valid mobile number",
                    icon: "error",
                });
    }
    else
    {
    $.ajax({
        type: "GET",
        url: "http://127.0.0.1:8000/send_otp/" +
                mobile + "/" + key,
        success: function(response) {
            swal({
                    title: "Success",
                    text: "OTP sent to your mobile.",
                    icon: "success",
                });
        }
    });
    }
}
    </script>