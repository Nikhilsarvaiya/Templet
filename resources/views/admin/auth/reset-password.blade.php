@extends('admin.auth.layouts.auth')
@section('title' ,'Reset Password')
@section('content')
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
										<h3 class="kt-login__title">Reset password</h3>
									</div>
									<div class="kt-login__form">
										<form class="kt-form" action="{{ route('admin.password.reset',['token'=>$token]) }}" method="POST">
											<div class="form-group">
												<input class="form-control" type="password" placeholder="Password" name="password">
											</div>
											@csrf
											<input type="hidden" name="token" value="{{ $token }}">
											<div class="form-group">
												<input class="form-control form-control-last" type="password" placeholder="Confirm Password" name="password_confirmation">
											</div>
											<div class="kt-login__actions">
												<button id="kt_login_signin_submit" class="btn btn-brand btn-pill btn-elevate">Submit</button>
											</div>
											<input type="hidden" name="email" value="{{ request()->get('email') }}">
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