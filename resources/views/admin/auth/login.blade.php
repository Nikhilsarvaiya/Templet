@extends('admin.auth.layouts.auth')
@section('title' ,'Login')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <!-- begin:: Page -->
	<div class="kt-grid kt-grid--ver kt-grid--root">
		<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v6 kt-login--signin" id="kt_login">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
				<div class="kt-grid__item  kt-grid__item--order-tablet-and-mobile-2  kt-grid kt-grid--hor kt-login__aside">
					<div class="kt-login__wrapper">
						<div class="kt-login__container">
							<div class="kt-login__body">
								<!-- <div class="kt-login__logo">
									<a href="#">
										<img src="{{asset('assets/admin/images/inner_logo.png')}}" class="img-fluid w-50">
									</a>
								</div> -->
								<div class="kt-login__signin">
									<div class="kt-login__head">
										<h3 class="kt-login__title">Sign In To Admin</h3>
									</div>
									<div class="kt-login__form">
										<form class="kt-form" action="{{ route('admin.login.post') }}" method="POST">
											<div class="form-group">
												<input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
											</div>
											@csrf
											<div class="form-group">
												<input class="form-control form-control-last" type="password" id="pass_log_id" placeholder="Password" name="password">
												<!-- <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span> -->
											</div>
											<div class="kt-login__extra">
												<label class="kt-checkbox">
													{{-- <input type="checkbox" name="remember"> Remember me
													<span></span> --}}
												</label>
												<a href="javascript:;" id="kt_login_forgot">Forget Password ?</a>
											</div>
											<div class="kt-login__actions">
												<button id="kt_login_signin_submit" class="btn btn-brand btn-pill btn-elevate">Sign In</button>
											</div>
										</form>
									</div>
								</div>
								
								<div class="kt-login__forgot">
									<div class="kt-login__head">
										<h3 class="kt-login__title">Forgotten Password ?</h3>
										<div class="kt-login__desc">Enter your email to reset your password:</div>
									</div>
									<div class="kt-login__form">
										<form class="kt-form" method="POST" action="{{ route('admin.sendForgetPasswordLink') }}">
											@csrf
											<div class="form-group">
												<input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
											</div>
											<div class="kt-login__actions">
												<button id="kt_login_forgot_submit" class="btn btn-brand btn-pill btn-elevate">Request</button>
												<button id="kt_login_forgot_cancel" class="btn btn-outline-brand btn-pill">Cancel</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="kt-grid__item kt-grid__item--fluid kt-grid__item--center kt-grid kt-grid--ver kt-login__content" style="background-image: url({{asset('assets/admin/media//bg/bg-4.png')}});">
					<div class="kt-login__section">
						<div class="kt-login__block">
							<h3 class="kt-login__title">Radha Krishna Temple</h3>
							<div class="kt-login__desc">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- end:: Page -->    

@endsection

@push('script')


<script>
	$(document).on('click', '.toggle-password', function() {

	$(this).toggleClass("fa-eye fa-eye-slash");

	var input = $("#pass_log_id");
	input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
	});
</script>
@endpush