@extends('admin.layouts.default')
@section('title', 'My Profile')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            My Profile </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.home') }}" class="kt-subheader__breadcrumbs-home"><i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
    
</div>

<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    @include('admin.layouts.flash-message')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-user-settings"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    My Profile
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <div class=" add_new_admin_form">
            
            <!--begin::Form-->
            <form class="kt-form" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" id="admin-profile-from" method="post" >
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Name: <span class="text-danger">*</span></label>
                            <input type="text" name="name" placeholder="Enter name" value="{{ $user->name ?? '' }}" class="form-control" >
                            @csrf
                        </div>
                        <div class="col-lg-6">
                            <label>Email: <span class="text-danger">*</span></label>
                            <input type="text" name="email" placeholder="Enter email" value="{{ $user->email ?? '' }}" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Password:</label>
                            <input type="password" name="password" placeholder="Enter password" class="form-control" id="password" autocomplete="off">
                        </div>
                        <div class="col-lg-6">
                            <label>Confirm Password:</label>
                            <input type="password" name="password_confirmation" placeholder="Enter confirm password" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>    
@endsection
@push('script')
<script type="text/javascript">

    let conf = {
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email : true
            },
            password: {
                minlength: 8
            },
            password_confirmation: {
                minlength: 8,
                equalTo: "#password"
            },
        },
    };
    
    validationChk('#admin-profile-from',conf);

</script>
@endpush