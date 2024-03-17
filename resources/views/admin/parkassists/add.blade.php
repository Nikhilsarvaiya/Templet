@extends('admin.layouts.default')
@section('title', ($parkassists) ? 'Edit' : 'Add'.' Parking Assist')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title"> Parking Assist </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.parkassists.list') }}" class="kt-subheader__breadcrumbs-home" title="Back"><i class="fa fa-arrow-left"></i></a>
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
                    {{ isset($parkassists->id) ? 'Edit Parking Assist' : 'Add Parking Assist' }} 
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <!--begin::Form-->
        <form class="kt-form" action="{{ ($parkassists) ? route('admin.parkassists.update') : route('admin.parkassists.store') }}" id="events-add-from" enctype="multipart/form-data" method="post" >
            @csrf
            <div class="kt-portlet__body">

                <div class=" row">
                    <div class="form-group col-lg-6">
                        <input type="hidden" name="edit_id" value="{{ $parkassists->id ?? null }}">
                        <label>Vehicle Name<span class="text-danger">*</span></label>
                        <input type="text" name="vehicle_name" placeholder="Enter Vehicle name" value="{{ $parkassists->vehicle_name ?? old('vehicle_name') }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Vehicle No.<span class="text-danger">*</span></label>
                        <input type="text" name="vehicle_no" placeholder="Enter Vehicle name" value="{{ $parkassists->vehicle_no ?? old('vehicle_no') }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Mobile No.<span class="text-danger">*</span></label>
                        <input type="number" name="mobile_no" placeholder="Enter Mobile No." value="{{ $parkassists->mobile_no ?? old('mobile_no') }}" class="form-control" >
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

    ClassicEditor.create( document.querySelector( '#description' ), {
        height : 150,
    })
    .catch( error => {
        console.log( error );
    } );

</script>

<script type="text/javascript">
    let conf = {
        rules: {
            vehicle_name: {
                required: true,
            },
            vehicle_no: {
                required: true,
            },
            mobile_no: {
                required: true,
            },
        }
    };
    
    validationChk('#events-add-from',conf);

    jQuery.validator.addMethod("greaterThan", 
    function(value, element, params) {

        if (!/Invalid|NaN/.test(new Date(value))) {
            return new Date(value) > new Date($(params).val());
        }

        return isNaN(value) && isNaN($(params).val()) 
            || (Number(value) > Number($(params).val())); 
    },'Must be greater than start date.');

    
    //Get today's date and split it by "T"
    // var today = new Date().toISOString().split('T')[0];
    // document.getElementById("start_datetime").setAttribute('min', today);



    // sidebar edit active start
    $(function(){
            var current = window.location.href;
            var mode = "{{ isset($parkassists->id) ? '1' : '0' }}";
            console.log(current+mode);
            if(current && mode=='1'){
                $(".parkassists-edit-smenu").addClass('kt-menu__item kt-menu__item--active kt-menu__item--open');
            }
        })
    // sidebar edit active end

</script>

@endpush

