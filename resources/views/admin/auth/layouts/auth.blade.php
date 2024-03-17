<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title> {{ config('app.name') }} | @yield('title') </title>
		<meta name="description" content="Login page">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!--end::Fonts -->

		<!--begin::Page Custom Styles(used by this page) -->
		{{-- <link href="assets/admin/css/demo1/pages/general/login/login-2.css" rel="stylesheet" type="text/css" /> --}}
		<link href="{{ asset('assets/admin/css/demo1/pages/general/login/login-6.css')}}" rel="stylesheet" type="text/css" />

		<!--end::Page Custom Styles -->
		<!--begin:: Global Mandatory Vendors -->
		<link href="{{ asset('assets/admin/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />
		<!--end:: Global Mandatory Vendors -->
		<link href="{{ asset('assets/admin/vendors/general/tether/dist/css/tether.css')}}" rel="stylesheet" type="text/css" />
		<!--begin:: Global Optional Vendors -->
		<link href="{{ asset('assets/admin/vendors/general/animate.css/animate.css')}}" rel="stylesheet" type="text/css" />
		<!--end:: Global Optional Vendors -->
		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="{{ asset('assets/admin/css/demo1/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles -->
		<!--begin::Layout Skins(used by all pages) -->
		<link href="{{ asset('assets/admin/css/demo1/skins/header/base/light.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/admin/css/demo1/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/admin/css/demo1/skins/brand/dark.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/admin/css/demo1/skins/aside/dark.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.png') }}" type="image/x-icon" />
	</head>
	<!-- end::Head -->
	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
		<!-- begin:: Page -->
        @yield('content')
		<!-- end:: Page -->
		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"dark": "#282a3c",
						"light": "#ffffff",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>
		<!-- end::Global Config -->
		<!--begin:: Global Mandatory Vendors -->
		<script src="{{ asset('assets/admin/vendors/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>
		<!--end:: Global Mandatory Vendors -->
		<!--begin:: Global Optional Vendors -->
		<script src="{{ asset('assets/admin/vendors/general/jquery-form/dist/jquery.form.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/admin/vendors/general/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/admin/vendors/general/jquery-validation/dist/additional-methods.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/admin/vendors/custom/js/vendors/jquery-validation.init.js') }}" type="text/javascript"></script>
		<!--end:: Global Optional Vendors -->
		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="{{ asset('assets/admin/js/demo1/scripts.bundle.js') }}" type="text/javascript"></script>
		<!--end::Global Theme Bundle -->
		<!--begin::Page Scripts(used by this page) -->
		<script src="{{ asset('assets/admin/js/demo1/pages/login/login-general.js') }}" type="text/javascript"></script>
		<!--end::Page Scripts -->
	</body>
	<!-- end::Body -->
</html>