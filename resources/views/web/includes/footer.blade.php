@php
  $contactus = ContactUsData();
  $aboutus = AboutUsData();
@endphp
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="subscribe_blog">
            <div class="row align-items-center">
              <div class="col-lg-8">
                <div class="subscribe_title">
                  <!-- <h2>Subscribe To Our
                    Newsletter
                  </h2> -->
                  <p>By choosing to send the WhatApp message to this group, you have agreed to accept the Terms and Conditions of the User Agreement mentioned here</p>
                  <div class="subscribe_icon">
                    <img src="{{ asset('assets/user/images/subscribe_icon.png') }}" alt="img">
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="subscribe_form">
                  <!-- <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter your email">
                    <button class="main_btn">Subscribe</button>
                  </div> -->
                  <img src="{{ asset('assets/user/images/Picture1.png') }}" alt="img" style="width: 50%;margin-left: 100px;">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_bg">
      <div class="container">
        {{-- <div class="footer_part_top">
          <div class="row justify-content-between align-items-center">
            <div class="col-md-4">
              <div class="footer_logo">
                <a href="{{ Route('web.home') }}">
                  <img src="{{ asset('assets/user/images/footer_logo.png') }}" alt="img">
                </a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="footer_part_top_menu_link">
                <ul>
                  <li><a href="{{ Route('web.home') }}">Home</a></li>
                  <li><a href="{{ Route('web.events') }}">Event</a></li>
                  <li><a href="{{ Route('web.galleries') }}">Gallery</a></li>
                  <li><a href="javascript:;">Park-Assist</a></li>
                  <li><a href="javascript:;">Donate</a></li>
                  <li><a href="javascript:;">Programs</a></li>
                  <li class="{{ request()->routeIs('web.contect.us') ? 'active' : ''}} "><a href="{{ Route('web.contect.us') }}">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div> --}}
        <div class="footer_part_btm">
          <div class="row">
            <div class="col-md-3">
              <div class="footer_btm_sce">
                <div class="footer_title">About Us</div>
                <div class="footer_about_info">
                  <p>
                    {{ $aboutus->aboutus_description ? mb_strimwidth(strip_tags($aboutus->aboutus_description), 0, 167, '...') : ''; }}
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
            </div>
            <div class="col-md-3">
              <div class="footer_btm_sce  footer_btm_sce_all_links">
                <div class="footer_title">All Links</div>
                <ul>
                  <li>
                    <a href="{{ Route('web.aboutus') }}"><i class="fas fa-chevron-right"></i> About Us</a>
                  </li>
                  <li>
                    <a href="{{ Route('web.contect.us') }}"><i class="fas fa-chevron-right"></i> Contact Us</a>
                  </li>
                  <li>
                    <a href="{{ Route('web.faq.faq.page') }}"><i class="fas fa-chevron-right"></i> FAQ</a>
                  </li>
                  @foreach (cmsPages() ?? [] as $key => $value)
                    <li>
                        <a href="{{ route('web.cms.page', $value->slug) }}"><i class="fas fa-chevron-right"></i> {{ $value->title }}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="col-md-3">
              <div class="footer_btm_sce ">
                <div class="footer_title">Contact Us</div>
                <div class="f_wing_quick_info">
                  <ul>
                    <li>
                      <div class="contact_icon map-marker-alt">
                        <i class="fas fa-map-marker-alt"></i>
                      </div>
                      <div class="contact_dtls">
                        <p>
                          {{ $contactus->address ? $contactus->address : ''; }}
                        </p>
                      </div>
                    </li>
                    <li>
                      <div class="contact_icon">
                        <i class="fas fa-phone-alt"></i>
                      </div>
                      <div class="contact_dtls">
                        <a href="tel:{{ $contactus->phone ? $contactus->phone : ''; }}">{{ $contactus->phone ? $contactus->phone : ''; }}</a>
                      </div>
                    </li>
                    <li>
                      <div class="contact_icon">
                        <i class="fas fa-envelope-open-text"></i>
                      </div>
                      <div class="contact_dtls">
                        <a href="mailto:{{ $contactus->email ? $contactus->email : ''; }}">{{ $contactus->email ? $contactus->email : ''; }}</a>
                      </div>
                    </li>

                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="footer_btm_sce ">
                <div class="footer_title">Find Us</div>
                <div class="footer_map">
                  <a href="#">
                    <!-- <img src="{{ asset('assets/user/images/footer_map.jpg') }}" alt="img"> -->
                    <iframe src="{{ $contactus->location }} " width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="copyright text-center">
            Copyright © {{date('Y')}} Radha Krishna Temple. All rights reserved.
          </div>
        </div>
      </div>
    </div>
