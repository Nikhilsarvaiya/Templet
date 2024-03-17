@extends('admin.layouts.default')
@section('title', ($programs) ? 'Edit' : 'Add'.' Programs')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title"> Programs </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.programs.list') }}" class="kt-subheader__breadcrumbs-home" title="Back"><i class="fa fa-arrow-left"></i></a>
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
                    {{ isset($programs->id) ? 'Edit Programs' : 'Add Programs' }} 
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <!--begin::Form-->
        <form class="kt-form" action="{{ ($programs) ? route('admin.programs.update') : route('admin.programs.store') }}" id="programs-add-from" enctype="multipart/form-data" method="post" >
            @csrf
            <div class="kt-portlet__body">

                <div class=" row">
                    <input type="hidden" name="edit_id" value="{{ $programs->id ?? null }}">

                    <div class="form-group col-lg-6">
                        <label>Title<span class="text-danger">*</span></label>
                        <input type="text" name="title" placeholder="Enter Title" value="{{ $programs->title ?? old('title') }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Date<span class="text-danger">*</span></label>
                        <input type="date" name="date" placeholder="Enter Date" value="{{ $programs->date ?? old('date') }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Months<span class="text-danger">*</span></label>
                        <input type="month" name="month" placeholder="Enter Month" value="{{ $programs->month ?? old('month') }}" class="form-control" >
                        {{-- <select name="month" class="form-control">
                            <option value="1" {{ $programs ? ('1' == $programs->month ? 'selected' : '') : '' }}>January</option>
                            <option value="2" {{ $programs ? ('2' == $programs->month ? 'selected' : '') : '' }}>February</option>
                            <option value="3" {{ $programs ? ('3' == $programs->month ? 'selected' : '') : '' }}>March</option>
                            <option value="4" {{ $programs ? ('4' == $programs->month ? 'selected' : '') : '' }}>April</option>
                            <option value="5" {{ $programs ? ('5' == $programs->month ? 'selected' : '') : '' }}>May</option>
                            <option value="6" {{ $programs ? ('6' == $programs->month ? 'selected' : '') : '' }}>June</option>
                            <option value="7" {{ $programs ? ('7' == $programs->month ? 'selected' : '') : '' }}>July</option>
                            <option value="8" {{ $programs ? ('8' == $programs->month ? 'selected' : '') : '' }}>August</option>
                            <option value="9" {{ $programs ? ('9' == $programs->month ? 'selected' : '') : '' }}>September</option>
                            <option value="10" {{ $programs ? ('10' == $programs->month ? 'selected' : '') : '' }}>October</option>
                            <option value="11" {{ $programs ? ('11' == $programs->month ? 'selected' : '') : '' }}>November</option>
                            <option value="12" {{ $programs ? ('12' == $programs->month ? 'selected' : '') : '' }}>December</option>
                        </select> --}}
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
            title: {
                required: true,
            },
            date: {
                required: true,
            },
            month: {
                required: true,
            },
        }
    };

    validationChk('#programs-add-from',conf);

    // sidebar edit active start
    $(function(){
            var current = window.location.href;
            var mode = "{{ isset($programs->id) ? '1' : '0' }}";
            console.log(current+mode);
            if(current && mode=='1'){
                $(".programs-edit-smenu").addClass('kt-menu__item kt-menu__item--active kt-menu__item--open');
            }
        })
    // sidebar edit active end

</script>

@endpush

