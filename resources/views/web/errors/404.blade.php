@extends('web.layouts.default')
@section('title', '404 Page')
@section('content')
    <section class="error_main">
        <div class="container">
            <div class="col-lg-12 text-center">
                <img src="{{ asset('assets/user/images/error.jpg') }}" alt="img" style="display: unset;">
                <h2>Ooops, something went wrong...</h2>
                <p>The page you are trying to find doesn't seem to exist..</p>
                <a href="{{ route('web.home') }}" class="main_btn">Go to Homepage</a>
            </div>
        </div>
    </section>
@endsection
