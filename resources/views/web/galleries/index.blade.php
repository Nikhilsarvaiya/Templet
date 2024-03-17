@extends('web.layouts.default')
@section('web.includes.footer')
@section('content')
    <section class="sub_banner">
      <div class="container">
        <h1>Gallery</h1>
      </div>
    </section>

    <section class="inner_wrap">
      <div class="container">
        <div class="row" id="append-more-service-menu">
            @include('web.galleries.more-list-menu')
            @if (sizeof($galleries) == 0)
                @include('web.no-result')
            @endif
          <div class="col-md-12 text-center d-none" id="load-more-button-galleries">
            <a href="{{ route('web.galleries.load.more.galleries') }}?page=2"
                data-append="append-more-service-menu"
                class="main_btn event_load_more load-more load-more-button-galleries" 
                data-wow-delay="100ms"
                data-wow-duration="3000ms">Load More</a>
          </div>
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
