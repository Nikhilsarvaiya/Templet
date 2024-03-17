@extends('admin.layouts.default')
@section('title', 'user-inquiry-page')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            User Inquiry </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ Route('admin.user.contact.us.list') }}" class="kt-subheader__breadcrumbs-home" title="Back"><i class="fa fa-arrow-left"></i></a>
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
                    User Inquiry View
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <!--begin::Form-->
        
            <div class="kt-portlet__body">
                <div class="form-group row">
                    <div class="col-lg-6 mt-3">
                        <label>Name:</label>
                        <input type="text" value="{{ $user_inquiry->name }}" class="form-control" readonly>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label>Email:</label>
                        <input type="text" value="{{ $user_inquiry->email }}" class="form-control" readonly>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label>Phone:</label>
                        <input type="text" value="{{ $user_inquiry->phone }}" class="form-control" readonly>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label>Subject:</label>
                        <input type="text" value="{{ $user_inquiry->subject }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label>Message:</label>
                        <textarea class="form-control" cols="15" rows="5" readonly>{{  $user_inquiry->message }}</textarea>
                    </div>
                </div>  
               
            </div>
        <!--end::Form-->
    </div>
</div>    
@endsection


