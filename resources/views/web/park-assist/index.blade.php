@extends('web.layouts.default')
{{-- @section('title', 'Home') --}}
@section('content')

    <section class="sub_banner">
      <div class="container">
        <h1>
            @if(!Auth::check())
                Sign in
            @else
                Parking Assistance
            @endif
        </h1>
      </div>
    </section>

    @if(!Auth::check())
        <section class="inner_wrap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="box_shadow sign_in_main">
                            <h2>Welcome Radha Krishna Temple</h2>
                            <form action="{{ route('web.park.login.post') }}" method="POST" enctype="multipart/form-data" id="park-login-form">
                                @csrf
                                <div class="sign_in_form">
                                    <div class="form-group">
                                        <label>Email id <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <input type="password" id="password" class="form-control control_with_icon form_control_pw" name="password" placeholder="Enter password">
                                        <i class="fas fa-eye form_input_icon toggle-password"></i>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <!-- <div class="forgot_link">
                                    <a href="forgot_password.html">Forgot Password</a>
                                    </div> -->
                                    <div class="text-center">
                                    <!-- <a href="#" class="text-center main_btn">Sign In</a> -->
                                    <button type="submit" class="text-center main_btn" name="submit">Sign In</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="inner_wrap contact_wrap donatenow_wrap">
            <div class="container">
                <div class="contact_blog">
                    <div class="sign_in_main">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="sign_up_left_blog">
                                    <h2>Add Vehicle</h2>
                                    <div class="donate_type_btn">
                                        <ul>
                                            <li><a href="{{ Route('web.park.assist') }}" class="main_btn active">Add</a></li>
                                            <li><a href="{{ Route('web.park.search.vehicle') }}" class="main_btn ">Search</a></li>
                                            <li><a href="{{ Route('web.park.update.vehicle') }}" class="main_btn">Update</a></li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div></br>
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <div class="form-group">
                                    <form action="{{ route('web.park.add.post') }}" method="POST" enctype="multipart/form-data" id="park-add-form">
                                        @csrf
                                        <div class="sign_in_form">
                                            <div class="form-group">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input type="text" name="vehicle_name" id="vehicle_name" class="form-control" placeholder="Enter Vehicle Name">
                                                @if ($errors->has('vehicle_name'))
                                                    <span class="text-danger">{{ $errors->first('vehicle_name') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Vehicle Number <span class="text-danger">*</span></label>
                                                <input type="text" id="vehicle_no" class="form-control" name="vehicle_no" placeholder="Enter Vehicle Number">
                                                @if ($errors->has('vehicle_no'))
                                                    <span class="text-danger">{{ $errors->first('vehicle_no') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Mobile Number <span class="text-danger">*</span></label>
                                                <input type="number" id="mobile_no" class="form-control" name="mobile_no" placeholder="Enter Mobile Number">
                                                @if ($errors->has('mobile_no'))
                                                    <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                                                @endif
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" class="text-center main_btn" name="submit">Submit</button>
                                            <button type="button" class="text-center main_btn" name="reset" onclick="reSet()">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
@push('script')
<script>
    function reSet(){
        var element = document.getElementById("park-add-form");
        // element.reset()
        document.getElementById("vehicle_name").value = "";
        document.getElementById("vehicle_no").value = "";
        document.getElementById("mobile_no").value = "";
    }
</script>
@endpush