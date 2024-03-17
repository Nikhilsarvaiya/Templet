<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
{{-- <title>{{ config('app.name') }} | @yield('title')</title> --}}
<!-- {--!! SEO::generate() !!--} -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="shortcut icon" href="{{ asset('assets/user/images/favicon.png') }}">
<link href="{{ asset('assets/user/css/jquery-ui.css') }}?v={{ config('services.scripts.version') }}" rel="stylesheet">

<link href="{{ asset('assets/user/css/fancybox.min.css') }}?v={{ config('services.scripts.version') }}" rel="stylesheet">

<link href="{{ asset('assets/user/css/owl.carousel.css') }}?v={{ config('services.scripts.version') }}"
    rel="stylesheet">
<link href="{{ asset('assets/user/css/bootstrap.css') }}?v={{ config('services.scripts.version') }}" rel="stylesheet">
<link href="{{ asset('assets/user/css/font-awesome.css') }}?v={{ config('services.scripts.version') }}"
    rel="stylesheet">

<link href="{{ asset('assets/user/css/bootstrap-select.css') }}?v={{ config('services.scripts.version') }}"
    rel="stylesheet">
<!-- {{-- <link href="{{asset('assets/user/css/animate.min.css')}}?v={{ config('services.scripts.version') }}" rel="stylesheet"> --}} -->
<link href="{{ asset('assets/user/css/select2.min.css') }}?v={{ config('services.scripts.version') }}" rel="stylesheet">
<link href="{{ asset('assets/user/css/custom-fonts.css') }}?v={{ config('services.scripts.version') }}" rel="stylesheet">
<link href="{{ asset('assets/user/css/unicons.css') }}?v={{ config('services.scripts.version') }}" rel="stylesheet">
<!-- <link href="{{ asset('assets/user/css/menu_css.css') }}"?v={{ config('services.scripts.version') }} rel="stylesheet"> -->
<link href="{{ asset('assets/user/css/menu.css') }}?v={{ config('services.scripts.version') }}" rel="stylesheet">



<link href="{{ asset('assets/user/css/style.css') }}?v={{ config('services.scripts.version') }}" rel="stylesheet">
<!-- Developer_css_it_here_start -->
<link
    href="{{ asset('assets/user/js/sweetalert2/package/dist/sweetalert2.min.css') }}?v={{ config('services.scripts.version') }}"
    rel="stylesheet">
<link href="{{ asset('assets/user/css/developer.css') }}?v={{ config('services.scripts.version') }}" rel="stylesheet">
<!-- Developer_css_it_here_end -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css'>

<link href="{{ asset('assets/user/css/responsive.css') }}?v={{ config('services.scripts.version') }}"
    rel="stylesheet">


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:3413148,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>