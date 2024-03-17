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
                            <input type="date" name="date[0]" placeholder="Enter Date" value="" class="form-control valid" required onchange="mainDate(this);">
                        </div>
                        <div class="col-lg-2">
                            </br></br>
                            <p><label><input type="checkbox" name="morning[0]" placeholder="Enter Morning" value="0" onclick="$(this).val(this.checked ? 1 : 0)" class="panditji-checkbox" />Morning</label></p>
                        </div>
                        <div class="col-lg-2">
                            </br></br>
                            <p><label><input type="checkbox" name="evening[0]" placeholder="Enter Evening" value="0" onclick="$(this).val(this.checked ? 1 : 0)"class="panditji-checkbox" />Evening</label></p>
                        </div>
                        <div class="col-lg-2">
                            <button type="button" name="add" class="btn btn-outline-primary add-main custom-style-add" id="dynamic-ar">Add </button>
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
            'date[]': {
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

<script type="text/javascript">
    let i = 0;
    let sub_i = 0;
    let sub_i_if = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        ++sub_i;

        if(sub_i!=0){
            sub_i_if = sub_i;
        } else {
            sub_i_if = i;
        }
        $("#dynamicAddRemove").append('  \
            <div class="form-group row main-remove">\
                <div class="col-lg-6">\
                    <label>Date: <span class="text-danger">*</span></label>\
                    <input type="date" name="date['+i+']" placeholder="Enter Date" value="" class="form-control valid" required onchange="mainDate(this);">\
                </div>\
                <div class="col-lg-2">\
                    </br></br>\
                    <p><label><input type="checkbox" name="morning['+i+']" placeholder="Enter Morning" value="0" onclick="$(this).val(this.checked ? 1 : 0)" class="panditji-checkbox" />Morning</label></p>\
                </div>\
                <div class="col-lg-2">\
                    </br></br>\
                    <p><label><input type="checkbox" name="evening['+i+']" placeholder="Enter Evening" value="0" onclick="+$(this).val(this.checked ? 1 : 0)" class="panditji-checkbox" />Evening</label></p>\
                </div>\
                <div class="col-lg-2">\
                    <button type="button" class="btn btn-outline-danger add-main custom-style-add remove-input-field">Remove </button>\
                </div>\
            </div>');
    });
    $(document).on('click', '.remove-input-field', function (e) {
        $(this).parents('.main-remove').remove();
        e.preventDefault();
    });

    function mainDate(event){
        var tralse = true;
        var selectRound_arr = []; // for contestant name
        $('.valid').each(function(k, v) {
            var getVal = $(v).val();
            // alert(getVal);
            if (getVal && $.trim(selectRound_arr.indexOf(getVal)) != -1) {
                tralse = false;
                //it should be if value 1 = value 1 then alert, and not those if -select- = -select-. how to avoid those -select-
                alert('Date cannot be same');
                $(v).val("");
                return false;
            } else {
                selectRound_arr.push($(v).val());
            }
        });
        if (!tralse) {
            return false;
        }
    }
</script>
@endpush

