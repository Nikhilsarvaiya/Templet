@extends('admin.layouts.default')
@section('title', 'Sub admin')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            {{ $mode=='Edit' ? 'Edit' : 'Add' }} sub admin </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.sub-admin.list') }}" class="kt-subheader__breadcrumbs-home"><i class="fa fa-arrow-left"></i></a>
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
                    {{ $mode=='Edit' ? 'Edit' : 'Add' }} sub admin
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <!--begin::Form-->
        <form class="kt-form" action="{{ $mode=='Edit' ? route('admin.sub-admin.update') : route('admin.sub-admin.store') }}" enctype="multipart/form-data" id="admin-profile-from" method="post" >
            <div class="kt-portlet__body">
                <div class="form-group row">
                    <div class="col-lg-4">
                        <input type="hidden" value="{{$user->id ?? null}}" name="id">
                        <label>Name:<span class="text-danger">*</span></label>
                        <input type="text" name="name" placeholder="Enter name" value="{{ $mode=='Edit' ? $user->name : old('name') }}" class="form-control" >
                        @csrf
                    </div>
                    <div class="col-lg-4">
                        <label>Email:<span class="text-danger">*</span></label>
                        <input type="text" name="email" placeholder="Enter email" value="{{ $mode=='Edit' ? $user->email : old('email') }}" class="form-control" >
                    </div>
                    <div class="col-lg-4">
                        <label>Role:</label>
                        <select class="form-control" name="roles">
                            <option value="">Select</option>
                            @foreach($roles as $role)
                                @php
                                    if( $role->name == 'Admin' ){
                                    continue;
                                    }
                                @endphp
                                <option value="{{ $role->id }}" {{ ($mode == 'Edit' && in_array($role->id, $userRoles) ) ? 'selected' : null }}> {{ $role->name }} </option>
                            @endforeach
                       </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Password:<span class="text-danger">*</span></label>
                        <input type="password" name="password" placeholder="Enter password" class="form-control" id="password" autocomplete="off">
                    </div>
                    <div class="col-lg-6">
                        <label>Confirm Password:<span class="text-danger">*</span></label>
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

