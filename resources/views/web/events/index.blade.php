@extends('web.layouts.default')
@section('web.includes.footer')
@section('content')
    <section class="sub_banner">
      <div class="container">
        <h1>Event</h1>
      </div>
    </section>

    <section class="inner_wrap">
      <div class="container">
        <div class="row" id="append-more-service-menu">
            {{-- @include('web.events.more-list-menu') --}}
            @if (sizeof($events) == 0)
                @include('web.no-result')
            @else
                @foreach ($events ?? [] as $event)
                    <div class="col-md-4 event_blog_main {{ $paginationLoad == true ? 'paginated-data' : '' }}">
                        <div class="event_blog">
                            <div class="event_img">
                                <img src="{{ $event->list_image ? asset("storage/$event->list_image") : 'Image' }}" alt="img">
                            </div>
                            <div class="event_info">
                                <h3>{{ $event->title }}</h3>
                                {{-- <p> {!! Str::limit($event->description, 150) !!} </p> --}}
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
                                <a href="{{ route('web.events.detail', $event->slug) }}" class="main_btn main_btn_border">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
          {{-- <div class="col-md-12 text-center d-none" id="load-more-button-events">
            <a href="{{ route('web.events.load.more.events') }}?page=2"
                data-append="append-more-service-menu"
                class="main_btn event_load_more load-more load-more-button-events" 
                data-wow-delay="100ms"
                data-wow-duration="3000ms">Load More</a>
          </div> --}}
        </div>

      </div>
    </section>
@endsection
@push('script')
    <script>
        // more data load
        $(document).on('click', '.load-more', function(e) {
            let btn = $(this);
            let url = $(this).attr('href');
            let append = $(this).data('append');

            if ($(this).hasClass('load-more-button-events')) {
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
                    if (btn.hasClass('load-more-button-events')) {
                        btn.parent().addClass('d-none');
                    } else {
                        btn.parent().remove();
                    }
                    if (res.status) {
                        $("#" + append).append(res.html);
                    }
                },
                complete: function() {
                    if (btn.hasClass('load-more-button-events')) {
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
