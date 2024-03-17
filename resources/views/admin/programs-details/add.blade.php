@extends('admin.layouts.default')
@section('title', 'Programs Details')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            Programs Details </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        {{-- <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.programs.details.list') }}" class="kt-subheader__breadcrumbs-home" title="Back"><i class="fa fa-arrow-left"></i></a>
        </div> --}}
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
                   Edit Programs Details 
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <!--begin::Form-->
        <form class="kt-form" action="{{ route('admin.programs.details.store') }}" id="contact-us-add-from" method="post" enctype="multipart/form-data">
            @csrf
            <div class="kt-portlet__body">
                <div class=" row">
                    <input type="hidden" name="edit_id" value="{{ $programdetails->id ?? null }}">
                    <div class="form-group col-lg-6">
                        <label>Morning Title: <span class="text-danger">*</span></label>
                        <input type="text" name="morning_title" placeholder="Enter Morning Title" value="{{ $programdetails->morning_title ?? old('phone') }}" class="form-control" >
                        <input type="hidden" name="edit_id" value="{{ $programdetails->id ?? null }}">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Evening Title:<span class="text-danger">*</span></label>
                        <input type="text" name="evening_title" placeholder="Enter Evening Title" value="{{ $programdetails->evening_title ?? old('evening_title') }}" class="form-control" >
                    </div>
                </div>
                <div class=" row">
                    <div class="form-group col-lg-3 ">
                        <label>Morning Start Time <span class="text-danger">*</span></label>
                        <input type="time" name="morning_start_time" placeholder="Enter Morning Start Time" value="{{ $programdetails->morning_start_time ?? old('morning_start_time') }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-3 ">
                        <label>Morning End Time <span class="text-danger">*</span></label>
                        <input type="time" name="morning_end_time" placeholder="Enter Morning End Time" value="{{ $programdetails->morning_end_time ?? old('morning_end_time') }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-3 ">
                        <label>Evening Start Time <span class="text-danger">*</span></label>
                        <input type="time" name="evening_start_time" placeholder="Enter Evening Start Time" value="{{ $programdetails->evening_start_time ?? old('evening_start_time') }}" class="form-control" >
                    </div>

                    <div class="form-group col-lg-3 ">
                        <label>Evening End Time <span class="text-danger">*</span></label>
                        <input type="time" name="evening_end_time" placeholder="Enter Evening End Time" value="{{ $programdetails->evening_end_time ?? old('evening_end_time') }}" class="form-control" >
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
            morning_title: {
                required: true,
            },
            morning_start_time: {
                required: {{ isset($programdetails->id) ? 'false' : 'true' }},
                min: {{ isset($programdetails->id) ? 'false' : 'true' }},
            },
            morning_end_time: {
                required: {{ isset($events->id) ? 'false' : 'true' }},
                greaterThan: "#morning_start_time",
            },
            evening_title: {
                required: true,
            },
            evening_start_time: {
                required: {{ isset($programdetails->id) ? 'false' : 'true' }},
                min: {{ isset($programdetails->id) ? 'false' : 'true' }},
            },
            evening_end_time: {
                required: {{ isset($events->id) ? 'false' : 'true' }},
                greaterThan: "#evening_start_time",
            },
        },
    };
    
    validationChk('#contact-us-add-from',conf);

    jQuery.validator.addMethod("greaterThan", 
    function(value, element, params) {

        if (!/Invalid|NaN/.test(new Date(value).getTime())) {
            return new Date(value).getTime() > new Date($(params).val().getTime());
        }

        return isNaN(value) && isNaN($(params).val()) 
            || (Number(value) > Number($(params).val())); 
    },'Must be greater than start time.');

</script>
@endpush

