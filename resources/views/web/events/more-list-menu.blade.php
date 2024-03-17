@if ($events)
    @foreach ($events ?? [] as $event)
        <div class="col-md-4 event_blog_main {{ $paginationLoad == true ? 'paginated-data' : '' }}">
            <div class="event_blog">
                <div class="event_img">
                    <img src="{{ $event->list_image ? asset("storage/$event->list_image") : 'Image' }}" alt="img">
                </div>
                <div class="event_info">
                    <h3>{{ $event->title }}</h3>
                    <p> {!! Str::limit($event->description, 150) !!} </p>
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
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $event->address }}
                        </li>
                    </ul>
                    <a href="{{ route('web.events.detail', $event->slug) }}" class="main_btn main_btn_border">Detail</a>
                </div>
            </div>
        </div>
    @endforeach
@endif
<div class="col-lg-12 text-center paginated-data">
    @if ($events->nextPageUrl())
        <a href="{{ $events->nextPageUrl() }}" data-append="append-more-service-menu"
            class="main_btn wow fadeInUp load-more" data-wow-delay="100ms" data-wow-duration="3000ms">Load More</a>
    @endif
</div>
