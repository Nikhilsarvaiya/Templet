@if ($programs)
    @foreach ($programs ?? [] as $program)
        <div class="col-md-3 programs_list_main {{ $paginationLoad == true ? 'paginated-data' : '' }}">
            <a href="#">
                <div class="programs_list">
                    <div class="programs_list_icon">
                        <i class="i_ctm_font flaticon-kalasha"></i>
                    </div>
                    <div class="programs_list_info">
                        <h4>{{ $program->date }}</h4>
                        <p>{{ $program->title }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@endif
<div class="col-lg-12 text-center paginated-data">
    @if ($programs->nextPageUrl())
        <a href="{{ $programs->nextPageUrl() }}" data-append="append-more-service-menu"
            class="main_btn wow fadeInUp load-more" data-wow-delay="100ms" data-wow-duration="3000ms">Load More</a>
    @endif
</div>
