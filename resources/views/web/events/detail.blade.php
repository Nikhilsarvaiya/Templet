@extends('web.layouts.default')
@section('web.includes.footer')
@section('content')

    <section class="sub_banner">
      <div class="container">
        <h1>Details</h1>
      </div>
    </section>

    <section class="inner_wrap  event_details_wrap">
      <div class="container">
        <div class="col-lg-12">
          <div class="event_dtl_banner">
            <img src="{{ $events->event_image ? asset("storage/$events->event_image") : 'Image' }}" alt="img">
          </div>
          <div class="event_dtl_view">
            <h2>{{ $events->title }}</h2>
            <ul>
              <li>
                <i class="fas fa-clock"></i>
                @if($events->days==1)
                    Monday
                @elseif($events->days==2)
                    Tuesday
                @elseif($events->days==3)
                    Wednesday
                @elseif($events->days==4)
                    Thursday
                @elseif($events->days==5)
                    Friday
                @elseif($events->days==6)
                    Saturday
                @elseif($events->days==7)
                    Saturday
                @else
                @endif
                ({{ date_format(new DateTime($events->start_datetime), 'h:ia') }}-{{ date_format(new DateTime($events->end_datetime), 'h:ia') }})
              </li>
              <li>
                <i class="fas fa-map-marker-alt"></i>
                  {{ $events->address }}
              </li>
            </ul>
            <p>
              {!! $events->description !!}
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 event_info_main">
            <div class="event_info_blog">
              <h4>Details</h4>
              <ul>
                <li>
                  <p>Start:</p>
                  <span>{{ date_format(new DateTime($events->start_datetime), 'F j h:i a') }}</span>
                </li>
                <li>
                  <p>End:</p>
                  <span>{{ date_format(new DateTime($events->end_datetime), 'F j h:i a') }}</span>
                </li>
                @if($events->duration)
                  <li>
                    <p>Duration:</p>
                    <span>{{ $events->duration }}</span>
                  </li>
                @endif
                @if($events->cost)
                  <li>
                    <p>Cost:</p>
                    <span>${{ $events->cost }}</span>
                  </li>
                @endif
                @if($events->category->title)
                  <li>
                    <p>Event Category:</p>
                    <span>{{ $events->category->title }}</span>
                  </li>
                @endif
                @if($events->website_url)
                  <li>
                    <p>Website:</p>
                    <a href="{{ $events->website_url }}" target="_blank">{{ $events->website_url }}</a>
                  </li>
                @endif
              </ul>
            </div>
          </div>
          @if($events->name)
            <div class="col-lg-4 col-md-6 event_info_main">
              <div class="event_info_blog">
                <h4>Organizer</h4>
                <ul>
                  <li>
                    <p>Name:</p>
                    <span>{{ $events->name }}</span>
                  </li>
                  <li>
                    <p>Phone:</p>
                    <span>{{ $events->phone }}</span>
                  </li>
                  <li>
                    <p>Email:</p>
                    <span>{{ $events->email }}</span>
                  </li>
                  <li>
                    <p>Website:</p>
                    <a href="{{ $events->organizer_website_url }}" target="_blank">View Organizer Website</a>
                  </li>
                </ul>
              </div>
            </div>
          @endif
          @if($events->venue)
            <div class="col-lg-4 col-md-6 event_info_main">
              <div class="event_info_blog">
                <h4>Venue</h4>
                <div class="venue_info">
                  <p>
                    {{ $events->venue }}
                  </p>
                  <a href="{{ $events->google_map_url }}" target="_blank">+ Google Map</a>
                </div>
              </div>
            </div>
          @endif
        </div>

        @if ($related_events)
          <div class="popular_events">
            <div class="col-lg-12 text-center">
              <div class="web_title">
                <h2>popular events</h2>
              </div>
            </div>
            <div class="row">
              @foreach ($related_events ?? [] as $related_events)
                <div class="col-md-6 event_blog_main">
                  <div class="event_blog">
                    <div class="event_img">
                      <img src="{{ $related_events->list_image ? asset("storage/$related_events->list_image") : 'Image' }}" alt="img">
                    </div>
                    <div class="event_info">
                      <h3>{{ $related_events->title }}</h3>
                      <p>
                        {!! Str::limit($related_events->description, 150) !!}
                      </p>
                      <ul>
                        <li>
                          <i class="fas fa-clock"></i>
                            @if($related_events->days==1)
                                Monday
                            @elseif($related_events->days==2)
                                Tuesday
                            @elseif($related_events->days==3)
                                Wednesday
                            @elseif($related_events->days==4)
                                Thursday
                            @elseif($related_events->days==5)
                                Friday
                            @elseif($related_events->days==6)
                                Saturday
                            @elseif($related_events->days==7)
                                Saturday
                            @else
                            @endif
                            {{ date_format(new DateTime($related_events->start_datetime), 'h:i A') }}
                        </li>
                        <li>
                          <i class="fas fa-map-marker-alt"></i>
                            {{ $related_events->address }}
                        </li>
                      </ul>
                      <a href="{{ route('web.events.detail', $related_events->slug) }}" class="main_btn main_btn_border">Join Now</a>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endif

      </div>
    </section>

@endsection

@push('script')
@endpush