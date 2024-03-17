<header class="header {{ request()->routeIs('web.home')!='web.home' ? 'header_inner_page' : '' }} ">
    @if(request()->routeIs('web.home')!='web.home')
        <div class="in_hed_top">
            @endif
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 top_had_btn">
                        <ul>
                            @if(!Auth::check())
                                <li>
                                    <a href="javascript:;"><i class="flaticon-login"></i>Sign In</a>
                                </li>
                                <li>
                                    <a href="javascript:;"><i class="flaticon-stamped"></i>Sign Up</a>
                                </li>
                            @else
                            <li>
                                    <a href="{{ Route('web.park.logout') }}"><i class="flaticon-logout"></i>Logout</a>
                                </li>
                            @endif
                            <li>
                                <a href="javascript:;" class="main_btn"><i class="flaticon-donation"></i>Donate Now</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @if(request()->routeIs('web.home')!='web.home')
            </div>
        </div>
    @endif
    @if(request()->routeIs('web.home')!='web.home')
        <div class="in_hed_mdl">
            <div class="container">
                @endif
                <div class="wrapper_menu">
                    <div class="header-item-left">
                        <a href="{{ Route('web.home') }}" class="brand">
                            <img src="{{ request()->routeIs('web.home')!='web.home' ? asset('assets/user/images/inner_logo.png') : asset('assets/user/images/logo.png') }}" alt="img">
                        </a>
                    </div>
                    <!-- Section: Navbar Menu -->
                    <div class="header-item-center">
                        <div class="overlay"></div>
                        <nav class="menu">
                            <div class="menu-mobile-header">
                                <button type="button" class="menu-mobile-arrow"><i class="ion far fa-chevron-left"></i></button>
                                <div class="menu-mobile-title">
                                    <img src="{{ asset('assets/user/images/logo.png') }}" alt="img">
                                </div>
                                <button type="button" class="menu-mobile-close"><i class="ion ion-ios-close"></i>
                                    <i class="far fa-times"></i></button>
                            </div>
                            <ul class="menu-section">
                                <li class="{{ request()->routeIs('web.home') ? 'active' : ''}}"><a href="{{ Route('web.home') }}">Home</a></li>
                                <li class="{{ request()->routeIs('web.aboutus') ? 'active' : ''}} "><a href="{{ Route('web.aboutus') }}">About Us</a></li>
                                <li class="{{ request()->routeIs('web.events') || request()->routeIs('web.events.detail') ? 'active' : ''}} "><a href="{{ Route('web.events') }}">Event</a></li>
                                <li class="{{ request()->routeIs('web.galleries') ? 'active' : ''}} "><a href="{{ Route('web.galleries') }}">Gallery</a></li>
                                <li class="{{ request()->routeIs('web.park') ? 'active' : ''}} "><a href="{{ Route('web.park.assist') }}">Park-Assist</a></li>
                                <!-- <li><a href="calendar.html">Calendar</a></li> -->
                                <li><a href="javascript:;">Donate</a></li>
                                <li><a href="javascript:;">Programs</a></li>
                                <li class="{{ request()->routeIs('web.contect.us') ? 'active' : ''}} "><a href="{{ Route('web.contect.us') }}">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="header-item-right">

                        <button type="button" class="menu-mobile-trigger">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
                @if(request()->routeIs('web.home')!='web.home')
            </div>
        </div>
    @endif
        
    
</header>