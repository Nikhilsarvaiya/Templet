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

    @if(Auth::check())
        <section class="inner_wrap contact_wrap donatenow_wrap">
            <div class="container">
                <div class="contact_blog">
                    <div class="sign_in_main">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="sign_up_left_blog">
                                    <h2>Update Vehicle</h2>
                                    <div class="donate_type_btn">
                                        <ul>
                                            <li><a href="{{ Route('web.park.assist') }}" class="main_btn ">Add</a></li>
                                            <li><a href="{{ Route('web.park.search.vehicle') }}" class="main_btn ">Search</a></li>
                                            <li><a href="{{ Route('web.park.update.vehicle') }}" class="main_btn active">Update</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                        </div></br>
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <div class="form-group">

                                    <!-- search form start -->
                                    <form enctype="multipart/form-data" id="park-search-form">
                                        @csrf
                                        <div class="sign_in_form">
                                            <div class="form-group">
                                                <label>Vehicle Number <span class="text-danger">*</span></label>
                                                <input type="text" id="vehicle_no" class="form-control" name="vehicle_no" placeholder="Enter Vehicle Number">
                                                @if ($errors->has('vehicle_no'))
                                                    <span class="text-danger">{{ $errors->first('vehicle_no') }}</span>
                                                @endif
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" class="text-center main_btn park-search-post" name="submit">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- search form end -->

                                    <!-- update form start -->
                                    <form action="{{ route('web.park.update.post') }}" method="POST" enctype="multipart/form-data" id="park-update-form" style="display:none;">
                                        @csrf
                                        <div class="sign_in_form">
                                            <div class="form-group">
                                                <input type="hidden" name="vehicle_id" id="vehicle_id" >
                                                <!-- <input type="hidden" name="vehicle_no2" id="vehicle_no2" > -->
                                                <!-- <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>Vehicle Number : </td>
                                                            <td><p class="vehicle_no2"></p></td>
                                                        </tr>
                                                    </tbody>
                                                </table> -->
                                                <label>Vehicle Number <span class="text-danger">*</span></label>
                                                <input type="text" id="vehicle_no2" class="form-control" name="vehicle_no" placeholder="Enter Vehicle Number">
                                                @if ($errors->has('vehicle_no'))
                                                    <span class="text-danger">{{ $errors->first('vehicle_no') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group ">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input type="text" name="vehicle_name" id="vehicle_name" class="form-control" placeholder="Enter Vehicle Name">
                                                @if ($errors->has('vehicle_name'))
                                                    <span class="text-danger">{{ $errors->first('vehicle_name') }}</span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group ">
                                                <label>Mobile Number <span class="text-danger">*</span></label>
                                                <input type="number" id="mobile_no" class="form-control" name="mobile_no" placeholder="Enter Mobile Number">
                                                @if ($errors->has('mobile_no'))
                                                    <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                                                @endif
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" class="text-center main_btn " name="submit" >Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- update form end -->
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
    $(".park-search-post").click(function(e){
        e.preventDefault();

        var vehicle_no = $("#vehicle_no").val();

        $.ajax({
            url: "{{ route('web.park.search.post') }}",
            type:'POST',
            data: {vehicle_no:vehicle_no},
            success: function(data) {
                if(data.success){
                    $("#vehicle_id").val(data.success.id);
                    $("#vehicle_no2").val(data.success.vehicle_no);
                    $(".vehicle_no2").html(data.success.vehicle_no);
                    $("#vehicle_name").val(data.success.vehicle_name);
                    $("#mobile_no").val(data.success.mobile_no);

                    $("#park-search-form").hide();
                    $("#park-update-form").show();
                }
                else{
                    console.log(data.error);
                    $(".vehicle_name").html("");
                    $(".mobile_no").html("");
                    Swal.fire({
                        icon: 'error',
                        title: 'Data Not Found.'
                    });
                }
            }
        });
    });
</script>
@endpush