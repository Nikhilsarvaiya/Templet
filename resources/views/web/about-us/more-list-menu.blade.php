@if ($teams)
    @foreach ($teams ?? [] as $team)
        
        <div class="col-lg-3 col-md-4 event_blog_main {{ $paginationLoad == true ? 'paginated-data' : '' }}">
            <div class="member_blog">
                <div class="member_img">
                    <span class="line"></span>
                    <span class="line line-bottom"></span>
                    <figure class="image_view">
                    <img src="{{ $team->image ? asset("storage/$team->image") : 'Image' }}" alt="img">
                    </figure>
                </div>
                <div class="team_name">
                    <a href="#">{{ $team->name }}</a>
                    <span>{{ $team->designation }}</span>
                </div>
            </div>
        </div>
    @endforeach
@endif
<div class="col-lg-12 text-center paginated-data">
    @if ($teams->nextPageUrl())
        <a href="{{ $teams->nextPageUrl() }}" data-append="append-more-service-menu"
            class="main_btn wow fadeInUp load-more" data-wow-delay="100ms" data-wow-duration="3000ms">Load More</a>
    @endif
</div>
