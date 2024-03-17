@extends('admin.layouts.default')
@section('title', 'Add Panditji Availabilities')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
           Panditji Availabilities </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.panditji.availabilities.list') }}" class="kt-subheader__breadcrumbs-home" title="Back"><i class="fa fa-arrow-left"></i></a>
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
                    {{ isset($panditji_availabilities->id) ? 'Edit Panditji Availabilities' : 'Add Panditji Availabilities' }} 
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <!--begin::Form-->
        <form class="kt-form" action="{{ ($panditji_availabilities) ? route('admin.panditji.availabilities.update') : route('admin.panditji.availabilities.store') }}" id="faq-form" enctype="multipart/form-data" method="post" >
            @csrf
            <div class="kt-portlet__body">
                <input type="hidden" name="edit_id" value="{{ $panditji_availabilities->id ?? null }}">
                <div class="" id="dynamicAddRemove">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Date: <span class="text-danger">*</span></label>
                            <input type="date" name="date" placeholder="Enter Date" value="{{ $panditji_availabilities->date ?? null }}" class="form-control valid" required>
                        </div>
                        <div class="col-lg-2">
                            </br></br>
                            <p><label><input type="checkbox" name="morning" placeholder="Enter Morning" value="{{ $panditji_availabilities->morning ?? 0 }}" {{ $panditji_availabilities->morning==1 ? 'checked' : '' }}   class="panditji-checkbox" onclick="$(this).val(this.checked ? 1 : 0)" />Morning</label></p>
                        </div>
                        <div class="col-lg-2">
                            </br></br>
                            <p><label><input type="checkbox" name="evening" placeholder="Enter Evening" value="{{ $panditji_availabilities->evening ?? 0 }}" {{ $panditji_availabilities->evening==1 ? 'checked' : '' }} class="panditji-checkbox" onclick="$(this).val(this.checked ? 1 : 0)" />Evening</label></p>
                        </div>
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
            date: {
                required: true,
            },
            
        },
    };
    
    validationChk('#faq-form',conf);


    // sidebar edit active start
    $(function(){
            var current = window.location.href;
            var mode = "{{ isset($panditji_availabilities->id) ? '1' : '0' }}";
            console.log(current+mode);
            if(current && mode=='1'){
                $(".panditji_availabilities-edit-smenu").addClass('kt-menu__item kt-menu__item--active kt-menu__item--open');
            }
        })
    // sidebar edit active end

</script>

@endpush

