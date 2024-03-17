@extends('admin.layouts.default')
@section('title', ($parkusers) ? 'Edit' : 'Add'.' Parking Assist User')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title"> Parking Assist User </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.parkusers.list') }}" class="kt-subheader__breadcrumbs-home" title="Back"><i class="fa fa-arrow-left"></i></a>
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
                    {{ isset($parkusers->id) ? 'Edit Parking Assist User' : 'Add Parking Assist User' }} 
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <!--begin::Form-->
        <form class="kt-form" action="{{ ($parkusers) ? route('admin.parkusers.update') : route('admin.parkusers.store') }}" id="teams-add-from" enctype="multipart/form-data" method="post" >
            @csrf
            <div class="kt-portlet__body">

                <div class=" row">
                    <div class="form-group col-lg-8">
                        <label>Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" placeholder="Enter Name" value="{{ $parkusers->name ?? old('name') }}" class="form-control" >

                        <input type="hidden" name="edit_id" value="{{ $parkusers->id ?? null }}">
                    </div>
                </div>
                <div class=" row">
                    <div class="form-group col-lg-8">
                        <label>Email<span class="text-danger">*</span></label>
                        <input type="email" name="email" placeholder="Enter Email" value="{{ $parkusers->email ?? old('email') }}" class="form-control" >
                    </div>
                </div>
                @if(!$parkusers)
                    <div class=" row">
                        <div class="form-group col-lg-8">
                            <label>Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" placeholder="Enter Password" value="{{ old('password') }}" class="form-control" >
                        </div>
                    </div>
                @else
                    <div class=" row">
                        <div class="form-group col-lg-8">
                            <label>Password (Optional)</label>
                            <input type="password" name="password" placeholder="Enter Password" value="{{ old('password') }}" class="form-control" >
                        </div>
                    </div>
                @endif
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
            },
            password: {
                required: {{ isset($parkusers->id) ? 'false' : 'true' }},
            },
        }
    };

    validationChk('#teams-add-from',conf);

    // sidebar edit active start
    $(function(){
            var current = window.location.href;
            var mode = "{{ isset($parkusers->id) ? '1' : '0' }}";
            console.log(current+mode);
            if(current && mode=='1'){
                $(".parkusers-edit-smenu").addClass('kt-menu__item kt-menu__item--active kt-menu__item--open');
            }
        })
    // sidebar edit active end

</script>

@endpush

