@if ($galleries)
    @foreach ($galleries ?? [] as $gallery)
        <div class="col-md-3 {{ $paginationLoad == true ? 'paginated-data' : '' }}">
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
@endif
<div class="col-lg-12 text-center paginated-data">
    @if ($galleries->nextPageUrl())
        <a href="{{ $galleries->nextPageUrl() }}" data-append="append-more-service-menu"
            class="main_btn wow fadeInUp load-more" data-wow-delay="100ms" data-wow-duration="3000ms">Load More</a>
    @endif
</div>
