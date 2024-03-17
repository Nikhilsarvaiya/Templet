@extends('web.layouts.default')
@section('content')


    <section class="sub_banner">
        <div class="container">
            <h1>contact us</h1>
        </div>
    </section>

    <section class="inner_wrap contact_wrap">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="row justify-content-center">
              <div class="col-lg-3">
                <div class="doing_info">
                  <div class="doing_info_icon">
                    <i class="flaticon-viber i_ctm_font"></i>
                  </div>
                  <div class="doing_data">
                    <h4>Phone Number</h4>
                    <a href="tel:{{ $contactus->phone ? $contactus->phone : ''; }}">
                        {{ $contactus->phone ? $contactus->phone : ''; }}
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="doing_info">
                  <div class="doing_info_icon">
                    <i class="flaticon-mail  i_ctm_font"></i>
                  </div>
                  <div class="doing_data">
                    <h4>Email Address</h4>
                    <a href="mailto:{{ $contactus->email ? $contactus->email : ''; }}">
                        {{ $contactus->email ? $contactus->email : ''; }}
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="doing_info">
                  <div class="doing_info_icon">
                    <i class="flaticon-location  i_ctm_font"></i>
                  </div>
                  <div class="doing_data">
                    <h4>Location</h4>
                    <p>
                        {{ $contactus->address ? $contactus->address : ''; }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="contact_blog">
          <div class="sign_in_main">
            <div class="row">
              <div class="col-md-4">
                <div class="sign_up_left_blog">
                  <h5>Contact Us</h5>
                  <h2 class="contact-us-header-title">{{ $contactus->contact_us_title ? $contactus->contact_us_title : ''; }}</h2>
                  <p>
                    {{ $contactus->contact_us_description ? $contactus->contact_us_description : ''; }}
                  </p>
                  <ul>
                    <li>
                      <a href="{{ $contactus->social_link1 ? $contactus->social_link1 : ''; }}" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                    </li>
                    <li>
                      <a href="{{ $contactus->social_link2 ? $contactus->social_link2 : ''; }}" target="_blank">
                        <i class="fab fa-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="{{ $contactus->social_link3 ? $contactus->social_link3 : ''; }}" target="_blank">
                        <i class="fab fa-instagram"></i>
                      </a>
                    </li>
                    <li>
                      <a href="{{ $contactus->social_link4 ? $contactus->social_link4 : ''; }}" target="_blank">
                        <i class="fab fa-google"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-8">
                <div class="sign_up_form">
                    <form action="{{ route('user.contact.us.save') }}" method="POST" enctype="multipart/form-data" id="contactus-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}" data-validation="required|name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email " 
                                    data-val="true"
                                    data-val-required="please enter an email address"
                                    pattern="[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[A-Za-z]{2,}$" 
                                    data-validation="required|email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Subject <span class="text-danger">*</span></label>
                                    <input type="text" name="subject" class="form-control" placeholder="Enter Subject  " value="{{ old('subject') }}" data-validation="required|subject">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="">
                                    <div class="form-group">
                                      <label>Mobile Number</label>
                                      <input type="tel" id="mobile_code" name="phone"  
                                      minlength="7" 
                                      maxlength="15" 
                                      data-validation="required|number"
                                      class="form-control only-mobile" 
                                      placeholder="Enter Mobile Number" 
                                      value="{{ old('phone') }}">
                                      <!-- id="mobile_code" -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="">
                                    <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="message" class="form-control" placeholder="Tell Us A Few Words" rows="5" data-validation="required|message"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="main_btn">Send Message</button>
                            </div>
                        </div>
                    </form>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="map_sec">
          <div class="map_img">
            <iframe src="{{ $contactus->location }} " width="100%" height="535" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
        <div class="container">
          <h3 class="justify-content-center">Executive Committee</h3>
          <table class="table table-bordered">
            <!-- <thead>
              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead> -->
            <tbody>
              <tr>
                <td>Mr Amit Kaushal</td>
                <td>Chairman</td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Mrs Sumitra Goel</td>
                <td>Vice Chairman</td>
                <td>Mrs Sheila Dookhooah </td>
                <td>Joint Treasurer </td>
              </tr>
              <tr>
                <td>Mr Deepak Purohit </td>
                <td>General Secretary</td>
                <td>Mr Sunil Gupta </td>
                <td>Joint Secretary </td>
              </tr>
              <tr>
                <td>Dr Sanjay Wazir  </td>
                <td>Treasurer</td>
                <td>Mr Krishana Singh </td>
                <td> </td>
              </tr>
              <tr>
                <td>Mr Ashok Mukundlal Shah </td>
                <td></td>
                <td> </td>
                <td> </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
@endsection

@push('script')
    <script>

        if ($("#contactus-form").length > 0) {
            $("#contactus-form").validate({
                ignore: [],
                rules: {
                    name: {
                        required: true,
                        maxlength: 50
                    },
                    email: {
                        required: true,
                    },
                    subject: {
                        required: true,
                    },
                    
                },
                messages: {
                    name: {
                        required: "Please enter name",
                    },
                    email: {
                        required: "Please enter email",
                    },
                    subject: {
                        required: "Please enter subject",
                    },
                },
            })
        }

        $.validator.addMethod("email", function(value, element) {
            return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
        }, "Please enter a valid email address.");

        // phone code
        $(document).ready(function () {
          let input = makeIntlInput('#mobile_code');
        });
    </script>
@endpush