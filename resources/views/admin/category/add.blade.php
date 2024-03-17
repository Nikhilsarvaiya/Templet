@extends('admin.layouts.default')
@section('title', 'Add Category')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            Category </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.category.list') }}" class="kt-subheader__breadcrumbs-home" title="Back"><i class="fa fa-arrow-left"></i></a>
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
                    {{ isset($category->id) ? 'Edit Category' : 'Add Category' }} 
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <!--begin::Form-->
        <form class="kt-form" action="{{ ($category) ? route('admin.category.update') : route('admin.category.store') }}" id="category-add-from" method="post" >
            <div class="kt-portlet__body">
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label>Title: <span class="text-danger">*</span></label>
                        <input type="text" name="title" placeholder="Enter title" value="{{ $category->title ?? null }}" class="form-control" >
                        @csrf
                        <input type="hidden" name="edit_id" value="{{ $category->id ?? null }}">
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
        },
    };
    validationChk('#category-add-from',conf);


    // sidebar edit active start
    $(function(){
            var current = window.location.href;
            var mode = "{{ isset($category->id) ? '1' : '0' }}";
            console.log(current+mode);
            if(current && mode=='1'){
                $(".category-edit-smenu").addClass('kt-menu__item kt-menu__item--active kt-menu__item--open');
            }
        })
    // sidebar edit active end
</script>
@endpush

