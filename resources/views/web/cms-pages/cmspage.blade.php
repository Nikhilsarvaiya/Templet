@extends('web.layouts.default')
@section('content')

    <section class="sub_banner">
      <div class="container">
        <h1>{{ $cmspage->title }}</h1>
      </div>
    </section>

    <section class="trading_ac_sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-3">
                    <div class="phishing_info wow fadeInLeft disclaimer_cms" data-wow-delay="100ms"
                        data-wow-duration="2000ms">
                        {!! $cmspage->description ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
    </script>
@endpush