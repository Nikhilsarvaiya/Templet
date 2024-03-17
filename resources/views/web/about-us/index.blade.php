@extends('web.layouts.default')
{{-- @section('title', 'Home') --}}
@section('content')
    <section class="sub_banner">
      <div class="container">
        <h1>About Us</h1>
      </div>
    </section>

    <section class="inner_wrap inner_wrap_about">
      <div class="container">
        <div class="about_inner_page">
          <div class="row">
            <div class="col-md-6">
              <div class="about_img">
                <img class="w-100" src="{{ $aboutus->aboutus_image ? asset("storage/".$aboutus->aboutus_image) : asset('assets/user/images/about_img.jpg') }}" alt="img">
              </div>
            </div>
            <div class="col-md-6">
              <div class="about_data_main">
                <div class="about_data_one">
                  <h4>{{ $aboutus->aboutus_title ? $aboutus->aboutus_title : ''; }}</h4>

                </div>
                <div class="about_data_two">
                  <p>
                    {{ $aboutus->aboutus_description ? $aboutus->aboutus_description : ''; }}
                  </p>
                </div>
                <div class="about_data_three">
                  <h3>{{ $aboutus->programs_title ? $aboutus->programs_title : ''; }}</h3>
                  <ul>
                    <li>
                      <i class="i_ctm_font flaticon-kalasha"></i>
                      {{ $aboutus->programs_description1 ? $aboutus->programs_description1 : ''; }}
                    </li>
                    <li>
                      <i class="i_ctm_font flaticon-kalasha"></i>
                      {{ $aboutus->programs_description2 ? $aboutus->programs_description2 : ''; }}
                    </li>
                    <li>
                      <i class="i_ctm_font flaticon-kalasha"></i>
                      {{ $aboutus->programs_description3 ? $aboutus->programs_description3 : ''; }}
                    </li>
                  </ul>
                </div>
                <div class="our_mission">
                  <div class="about_data_one">
                    <h4>{{ $aboutus->ourmission_title ? $aboutus->ourmission_title : ''; }}</h4>
                  </div>
                  <div class="about_data_two">
                    <p>
                        {{ $aboutus->ourmission_description ? $aboutus->ourmission_description : ''; }}
                    </p>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="history_main">
          <div class="row">
            <div class="col-md-6">
              <div class="history_info_main">
                <h5>HISTORY</h5>
                <h2>
                    {{ $aboutus->history_title ? $aboutus->history_title : ''; }}
                </h2>
                <div class="owl-carousel owl-theme history_carousel">
                  <div class="item">
                    <p>
                        {{ $aboutus->history_description1 ? $aboutus->history_description1 : ''; }}
                    </p>
                  </div>
                  <div class="item">
                    <p>
                        {{ $aboutus->history_description2 ? $aboutus->history_description2 : ''; }}
                    </p>
                  </div>
                  <div class="item">
                    <p>
                        {{ $aboutus->history_description3 ? $aboutus->history_description3 : ''; }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="history_img">
                <img src="{{ $aboutus->history_image ? asset("storage/".$aboutus->history_image) : asset('assets/user/images/about_img.jpg') }}" alt="img">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="doing_main">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="doing_info">
                <div class="doing_info_icon">
                  <i class="flaticon-crowd-of-users i_ctm_font"></i>
                </div>
                <div class="doing_data">
                  <h4>{{ $aboutus->whoweare_title ? $aboutus->whoweare_title : ''; }}</h4>
                  <p>
                    {!! $aboutus->whoweare_description ? $aboutus->whoweare_description : ''; !!}
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="doing_info">
                <div class="doing_info_icon">
                  <i class="flaticon-leadership i_ctm_font"></i>
                </div>
                <div class="doing_data">
                  <h4>{{ $aboutus->whatarewe_title ? $aboutus->whatarewe_title : ''; }}</h4>
                  <p>
                    {!! $aboutus->whatarewe_description ? $aboutus->whatarewe_description : ''; !!}
                  </p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      {{-- <div class="team_member_main">
        <div class="container">
          <div class="col-sm-12 text-center">
            <div class="web_title">
              <h2>TEAM MEMBER</h2>
              <p>Let’s make the world better, together</p>
            </div>
          </div>
          <div class="row">

          <div class="row" id="append-more-service-menu">
              @include('web.about-us.more-list-menu')
              @if (sizeof($teams) == 0)
                  @include('web.no-result')
              @endif
            <div class="col-md-12 text-center d-none" id="load-more-button-teams">
              <a href="{{ route('web.teams.load.more.teams') }}?page=2"
                  data-append="append-more-service-menu"
                  class="main_btn event_load_more load-more load-more-button-teams" 
                  data-wow-delay="100ms"
                  data-wow-duration="3000ms">Load More</a>
            </div>
          </div>

            <!-- <div class="col-lg-3 col-md-4">
              <div class="member_blog">
                <div class="member_img">
                  <span class="line"></span>
                  <span class="line line-bottom"></span>
                  <figure class="image_view">
                    <img src="{{ asset('assets/user/images/team_img1.jpg') }}" alt="img">
                  </figure>
                </div>
                <div class="team_name">
                  <a href="#">Taminm Alows</a>
                  <span>Temple Chief</span>
                </div>
              </div>
            </div> -->

            <!-- <div class="col-lg-3 col-md-4">
              <div class="member_blog">
                <div class="member_img">
                  <span class="line"></span>
                  <span class="line line-bottom"></span>
                  <figure class="image_view">
                    <img src="{{ asset('assets/user/images/team_img2.jpg') }}" alt="img">
                  </figure>
                </div>
                <div class="team_name">
                  <a href="#">Julio Marry</a>
                  <span>Senior Instructor</span>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4">
              <div class="member_blog">
                <div class="member_img">
                  <span class="line"></span>
                  <span class="line line-bottom"></span>
                  <figure class="image_view">
                    <img src="{{ asset('assets/user/images/team_img3.jpg') }}" alt="img">
                  </figure>
                </div>
                <div class="team_name">
                  <a href="#">Dylan Bonney</a>
                  <span>Temple Chief</span>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4">
              <div class="member_blog">
                <div class="member_img">
                  <span class="line"></span>
                  <span class="line line-bottom"></span>
                  <figure class="image_view">
                    <img src="{{ asset('assets/user/images/team_img4.jpg') }}" alt="img">
                  </figure>
                </div>
                <div class="team_name">
                  <a href="#">Zara Matheson</a>
                  <span>Senior Instructor</span>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4">
              <div class="member_blog">
                <div class="member_img">
                  <span class="line"></span>
                  <span class="line line-bottom"></span>
                  <figure class="image_view">
                    <img src="{{ asset('assets/user/images/team_img5.jpg') }}" alt="img">
                  </figure>
                </div>
                <div class="team_name">
                  <a href="#">Seth Sloman</a>
                  <span>Temple Chief</span>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4">
              <div class="member_blog">
                <div class="member_img">
                  <span class="line"></span>
                  <span class="line line-bottom"></span>
                  <figure class="image_view">
                    <img src="{{ asset('assets/user/images/team_img6.jpg') }}" alt="img">
                  </figure>
                </div>
                <div class="team_name">
                  <a href="#">Bianca Beatty</a>
                  <span>Senior Instructor</span>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4">
              <div class="member_blog">
                <div class="member_img">
                  <span class="line"></span>
                  <span class="line line-bottom"></span>
                  <figure class="image_view">
                    <img src="{{ asset('assets/user/images/team_img7.jpg') }}" alt="img">
                  </figure>
                </div>
                <div class="team_name">
                  <a href="#">Zara Matheson</a>
                  <span>Temple Chief</span>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4">
              <div class="member_blog">
                <div class="member_img">
                  <span class="line"></span>
                  <span class="line line-bottom"></span>
                  <figure class="image_view">
                    <img src="{{ asset('assets/user/images/team_img8.jpg') }}" alt="img">
                  </figure>
                </div>
                <div class="team_name">
                  <a href="#">Hamish French</a>
                  <span>Senior Instructor</span>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </section> --}}
@endsection
@push('script')

    <script>
        // more data load
        $(document).on('click', '.load-more', function(e) {
            let btn = $(this);
            let url = $(this).attr('href');
            let append = $(this).data('append');

            if ($(this).hasClass('load-more-button-teams')) {
                // console.log('has class');
                // $(this).addClass('d-none');
            }

            e.preventDefault();
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'Json',
                beforeSend: function() {
                    btn.html('Please wait...').attr('disabled', true);
                },
                success: function(res) {
                    if (btn.hasClass('load-more-button-teams')) {
                        btn.parent().addClass('d-none');
                    } else {
                        btn.parent().remove();
                    }
                    if (res.status) {
                        $("#" + append).append(res.html);
                    }
                },
                complete: function() {
                    if (btn.hasClass('load-more-button-teams')) {
                        btn.parent().addClass('d-none');
                    } else {
                        btn.parent().remove();
                    }
                    btn.html('Load More').attr('disabled', false);
                },
            });
        });
    </script>
@endpush
