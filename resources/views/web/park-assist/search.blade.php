@extends('web.layouts.default')
{{-- @section('title', 'Home') --}}
@section('content')

    <section class="sub_banner">
      <div class="container">
        <h1>Parking Assistance</h1>
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
                                    <h2>Search Vehicle</h2>
                                    <div class="donate_type_btn">
                                        <ul>
                                            <li><a href="{{ Route('web.park.assist') }}" class="main_btn ">Add</a></li>
                                            <li><a href="{{ Route('web.park.search.vehicle') }}" class="main_btn active">Search</a></li>
                                            <li><a href="{{ Route('web.park.update.vehicle') }}" class="main_btn">Update</a></li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div></br>
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <div class="form-group">
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

                                            <div class="form-group">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>Name : </td>
                                                            <td><p class="vehicle_name"></p></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mobile No. : </td>
                                                            <td><p class="mobile_no"></p></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="text-center">
                                            <button type="submit" class="text-center main_btn park-search-post" name="submit">Search</button>
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
    $(".park-search-post").click(function(e){
        e.preventDefault();

        var vehicle_no = $("#vehicle_no").val();

        $.ajax({
            url: "{{ route('web.park.search.post') }}",
            type:'POST',
            data: {vehicle_no:vehicle_no},
            success: function(data) {
                if(data.success){
                    $(".vehicle_name").html(data.success.vehicle_name);
                    $(".mobile_no").html(data.success.mobile_no);
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