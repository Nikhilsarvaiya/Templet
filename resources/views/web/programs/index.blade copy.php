@extends('web.layouts.default')
@section('web.includes.footer')
@section('content')
@php
    $programs_data = ProgramsData();
@endphp
    <section class="sub_banner">
      <div class="container">
        <h1>Programs</h1>
      </div>
    </section>

    <section class="inner_wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="aarti_info_blog">
                    <div class="aarti_icon">
                        <i class="flaticon-sunrise"></i>
                    </div>
                    <div class="arrti_info_view">
                        <h4>{{ $programs_data->morning_title }}</h4>
                        <h5>{{ date('H:i a', strtotime($programs_data->morning_start_time)) }} To {{ date('H:i a', strtotime($programs_data->morning_end_time)) }}</h5>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="aarti_info_blog aarti_info_blog_two">
                        <div class="aarti_icon">
                            <i class="flaticon-moon"></i>
                        </div>
                        <div class="arrti_info_view">
                            <h4>{{ $programs_data->evening_title }}</h4>
                            <h5>{{ date('H:i a', strtotime($programs_data->evening_start_time)) }} To {{ date('H:i a', strtotime($programs_data->evening_end_time)) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div id="program_filter">
                <div class="row text-center d-block date-filter-lr">
                    <a href="{{ route('web.programs') }}?date={{ $date ? Carbon\Carbon::create($date)->subMonth(1)->format('Y-m') : Carbon\Carbon::now()->subMonth(1)->format('Y-m') }}"><</a>
                        {{ $date ? Carbon\Carbon::create($date)->format('M Y') : Carbon\Carbon::now()->format('M Y') }}
                    <a href="{{ route('web.programs') }}?date={{ $date ? Carbon\Carbon::create($date)->addMonth(1)->format('Y-m') :Carbon\Carbon::now()->addMonth(1)->format('Y-m') }}">></a>
                </div>
                <div class="row">
                    @if (!$programs->isEmpty())
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
                    @else
                        <div class="col-md-12 text-center">
                            <p>Data Not Found.</p>
                        </div>
                    @endif
                </div>
            </div>
            {{-- <div class="row" id="append-more-service-menu">
                @include('web.programs.more-list-menu')
                @if (sizeof($programs) == 0)
                    @include('web.no-result')
                @endif
            <div class="col-md-12 text-center d-none" id="load-more-button-galleries">
                <a href="{{ route('web.programs.load.more.programs') }}?page=2"
                    data-append="append-more-service-menu"
                    class="main_btn event_load_more load-more load-more-button-galleries" 
                    data-wow-delay="100ms"
                    data-wow-duration="3000ms">Load More</a>
            </div> --}}

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

            if ($(this).hasClass('load-more-button-galleries')) {
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
                    if (btn.hasClass('load-more-button-galleries')) {
                        btn.parent().addClass('d-none');
                    } else {
                        btn.parent().remove();
                    }
                    if (res.status) {
                        $("#" + append).append(res.html);
                    }
                },
                complete: function() {
                    if (btn.hasClass('load-more-button-galleries')) {
                        btn.parent().addClass('d-none');
                    } else {
                        btn.parent().remove();
                    }
                    btn.html('Load More').attr('disabled', false);
                },
            });
        });


        $(document).ready(function() {
            $(".fancybox").fancybox({
            helpers : { 
                title : { type : 'inside' }
            }, // helpers
            afterLoad : function() {
                alert("====");
                this.title = (this.title ? '' + this.title + '<br />' : '') + 'Image ' + (this.index + 1) + ' of ' + this.group.length;
            } // afterLoad
            }); // fancybox
        }); // ready

        // $(document).ready(function() {
        //     $(".fancybox").fancybox({
                
        //     helpers : { 
        //         title : { type : 'inside' }
        //     }, // helpers
        //     beforeLoad: function() {
        //         alert("====");
        //         this.title = $(this.element).attr('caption');
        //     }
        //     }); // fancybox
        // }); // ready
    </script>
@endpush
