<!DOCTYPE html>
<noscript>
    <meta http-equiv="Refresh" content="1;url=no-script" />
    Sorry, your browser does not support JavaScript!
</noscript>
<html lang="en">

<head>
    @include('web.includes.head')
    @method('css')
</head>

<body>

    <div class="wrapper">
        @include('web.includes.header')    

        <!-- begin:: Content  -->
        @yield('content')
        <!-- end:: Content -->

    </div>

    <footer class="footer_sec">
        @include('web.includes.footer')
    </footer>

    @include('web.includes.footer-js')
    @stack('script')
</body>

</html>
