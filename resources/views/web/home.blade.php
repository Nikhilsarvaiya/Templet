@extends('web.layouts.default')
{{-- @section('title', 'Home') --}}
@section('content')
    <section class="home_banner">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          
          @if(!empty($home_sliders) && count($home_sliders)>0)
            @foreach ($home_sliders as $key => $slider)
              <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <div class="banner_text">
                  <h1>
                    {{ $slider->title }}
                  </h1>
                  <ul>
                    @if(!empty($slider->url))
                      <li>
                        <a href="{{ $slider->url ? $slider->url : 'javascript:;' }}" target="_blank" class="main_btn"><i class="flaticon-donation i_ctm_font"></i> Donate Now</a>
                      </li>
                    @endif
                    @if(!empty($slider->url2))
                      <li>
                        <a href="{{ $slider->url2 ? $slider->url2 : 'javascript:;' }}" target="_blank" class="main_btn sub_btn"><i class="flaticon-diwali-lamp i_ctm_font"></i>
                          Puja Booking</a>
                      </li>
                    @endif
                  </ul>
                </div>
                <img class="d-block w-100 slider-new-hight" src="{{ $slider->image ? asset("storage/$slider->image") : 'Image' }}" alt="First slide">
              </div>
            @endforeach
          @else
          <div class="carousel-item active">
            <div class="banner_text">
              <h1>
                Dharma: the importance of <br> fulfilling one's duty (dharma) <br> without attachment to the results.
              </h1>
              <ul>
                <li>
                  <a href="javascript:;" class="main_btn"><i class="flaticon-donation i_ctm_font"></i> Donate Now</a>
                </li>
                <li>
                  <a href="javascript:;" class="main_btn sub_btn"><i class="flaticon-diwali-lamp i_ctm_font"></i>
                    Puja Booking</a>
                </li>
              </ul>
            </div>
            <img class="d-block w-100" src="{{ asset('assets/user/images/banner1.jpg') }}" alt="First slide">
          </div>
          @endif
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true">
            <i class="far fa-chevron-left"></i>
          </span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true">
            <i class="far fa-chevron-right"></i>
          </span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <section class="about_home_sec">
      <div class="container">
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
                <a href="{{ Route('web.aboutus') }}" class="main_btn">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="objectives_sec">
      <div class="container">
        <div class="objectives_info">
          <h3>{{ $aboutus->objectives_title ? $aboutus->objectives_title : ''; }}</h3>
          <ul>
            <li>
              <i class="flaticon-verified i_ctm_font"></i>
              {{ $aboutus->objectives_description1 ? $aboutus->objectives_description1 : ''; }}
            </li>
            <li>
              <i class="flaticon-verified i_ctm_font"></i>
              {{ $aboutus->objectives_description2 ? $aboutus->objectives_description2 : ''; }}
            </li>
            <li>
              <i class="flaticon-verified i_ctm_font"></i>
              {{ $aboutus->objectives_description3 ? $aboutus->objectives_description3 : ''; }}
            </li>
          </ul>
        </div>
      </div>
    </section>

    @if ($events)
      <section class="event_home_sec">
        <div class="container">
          <div class="col-lg-12 text-center">
            <div class="web_title">
              <h2>EVENTS</h2>
              <p>Let’s make the world better, together</p>
            </div>
          </div>
          <div class="row">
            @foreach ($events ?? [] as $event)
              <div class="col-md-6 event_blog_main">
                <div class="event_blog">
                  <div class="event_img">
                    <img src="{{ $event->list_image ? asset("storage/$event->list_image") : 'Image' }}" alt="img">
                  </div>
                  <div class="event_info">
                    <h3>{{ $event->title }}</h3>
                    {{-- <p>
                      {!! Str::limit($event->description, 150) !!}
                    </p> --}}
                    <ul>
                      <li>
                        <i class="fas fa-clock"></i>
                          @if($event->days==1)
                              Monday
                          @elseif($event->days==2)
                              Tuesday
                          @elseif($event->days==3)
                              Wednesday
                          @elseif($event->days==4)
                              Thursday
                          @elseif($event->days==5)
                              Friday
                          @elseif($event->days==6)
                              Saturday
                          @elseif($event->days==7)
                              Saturday
                          @else
                          @endif
                          {{ date_format(new DateTime($event->start_datetime), 'h:i A') }}
                      </li>
                      @if($event->duration)
                          <li>
                              <i class="fas fa-clock"></i>
                              Duration : {{ $event->duration }}
                          </li>
                      @endif
                      {{-- <li>
                        <i class="fas fa-map-marker-alt"></i>
                          {{ $event->address }}
                      </li> --}}
                    </ul>
                    <a href="{{ route('web.events.detail', $event->slug) }}" class="main_btn main_btn_border">Join Now</a>
                  </div>
                </div>
              </div>
            @endforeach
            
            @if($events_counts->count()>4)
              <div class="col-md-12 text-center">
                <a href="{{ Route('web.events') }}" class="main_btn">View More</a>
              </div>
            @endif
          </div>
        </div>
      </section>
    @endif
    {{-- <section class="puja_booking_sec">
      <div class="container">
        <div class="col-lg-12 text-center">
          <div class="web_title">
            <h2>Puja Booking</h2>
            <p>Let’s make the world better, together</p>
          </div>
        </div>
        <div class="puja_booking_form">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" placeholder="Enter Email Address">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="Enter last name">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Email Id</label>
                <input type="text" class="form-control" placeholder="Enter email Id">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Phone number</label>
                <input type="text" class="form-control" placeholder="Enter phone number">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Date</label>
                <input type="text" class="form-control" placeholder="Enter date">
                <i class="fas fa-calendar-alt form_group_icon"></i>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Time</label>
                <input type="text" class="form-control" placeholder="Enter date">
                <i class="fas fa-clock form_group_icon"></i>
              </div>
            </div>
            <div class="col-md-12 text-center">
              <a href="#" class="main_btn">Booking Now</a>
            </div>
          </div>
        </div>
      </div>
    </section> --}}
    @if ($galleries)
      <section class="gallery_sec">
        <div class="container">
          <div class="col-lg-12 text-center">
            <div class="web_title">
              <h2>gallery</h2>
              <p>Let’s make the world better, together</p>
            </div>
          </div>
          <div class="row">
            @foreach ($galleries ?? [] as $gallery)
              <div class="col-md-3">
                <div class="gallery_blog">
                  <div class="gallery_blog_img">
                    <img src="{{ $gallery->image ? asset("storage/$gallery->image") : 'Image' }}" alt="img">
                  </div>
                  <div class="gallery_blog_title">
                    <a href="{{ $gallery->image ? asset("storage/$gallery->image") : 'Image' }}" data-fancybox="gallery" data-caption="{{ $gallery->title }}">
                      <h4>{{ $gallery->title }}</h4>
                      <i class="flaticon-right-arrow i_ctm_font"></i>
                    </a>
                  </div>
                </div>
              </div>
            @endforeach

            @if($galleries_counts->count()>8)
              <div class="col-md-12 text-center">
                <a href="{{ Route('web.galleries') }}" class="main_btn">View More</a>
              </div>
            @endif
          </div>
        </div>
      </section>
    @endif
@endsection
@push('script')
@endpush
