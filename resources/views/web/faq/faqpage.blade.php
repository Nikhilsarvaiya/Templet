@extends('web.layouts.default')
@section('content')


    <section class="sub_banner">
      <div class="container">
        <h1>Faq</h1>
      </div>
    </section>

    <section class="trading_ac_sec faq_accordion_main">
        <div class="container">

            @foreach ($faq as $key=> $item)
            @php 
                $k= ++$key;
            @endphp
            
            @endforeach

            <div class="products_accordion_main">
                <div class="accordion accordion-flush append_more_page" id="accordionFlushExample">
                    @foreach ($faq ?? [] as $key => $item)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne-{{ $key }}"> <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-{{ $key }}" aria-expanded="false" aria-controls="flush-collapseOne-{{ $key }}">
                                    {{ $item->title }}
                                </button>
                            </h2>
                            <div id="flush-collapseOne-{{ $key }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="phishing_info">
                                        {!! $item->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
@endsection

@push('script')
    <script>
    </script>
@endpush