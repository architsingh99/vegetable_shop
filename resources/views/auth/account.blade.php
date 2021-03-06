@include('../header')
<center>
    <div class="container">
        <div class="row justify-content-center" >
            <div style="    margin-top: 2em;" class="col-md-12">
                <div class="card"> 
                @if(session()->has('message'))
                <div id="sendmessage">{{session()->get('message')}}</div>
                @endif
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
                                class="col-md-4 col-form-label text-md-right">{{ __('Phone Number / Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control " name="email"
                                    value="{{Auth::user()-> email}}" readonly autocomplete="email">

                            </div>
                        </div>
                       <form method="POST" action="{{url('updatePassword')}}"enctype="multipart/form-data">
                              
                            @csrf

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Change Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control"
                                        placeholder="Want to create new Password?" name="password" required
                                        autocomplete="new-password">

                                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
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
</center>
<script>
function myorders() {
$("#yourOrders").show();
}
</script>
@include('../footer')