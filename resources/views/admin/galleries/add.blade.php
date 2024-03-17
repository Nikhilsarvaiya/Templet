@extends('admin.layouts.default')
@section('title', ($galleries) ? 'Edit' : 'Add'.' Galleries')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title"> Galleries </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.galleries.list') }}" class="kt-subheader__breadcrumbs-home" title="Back"><i class="fa fa-arrow-left"></i></a>
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
                    {{ isset($galleries->id) ? 'Edit Galleries' : 'Add Galleries' }} 
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <!--begin::Form-->
        <form class="kt-form" action="{{ ($galleries) ? route('admin.galleries.update') : route('admin.galleries.store') }}" id="galleries-add-from" enctype="multipart/form-data" method="post" >
            @csrf
            <div class="kt-portlet__body">

                <div class=" row">
                        <input type="hidden" name="edit_id" value="{{ $galleries->id ?? null }}">

                    <div class="form-group col-lg-8">
                        <label>Title<span class="text-danger">*</span></label>
                        <input type="text" name="title" placeholder="Enter Title" value="{{ $galleries->title ?? old('title') }}" class="form-control" >
                    </div>
                </div>

                <div class=" row mt-3">
                    <div class="form-group col-lg-6">
                        <label>Image<span class="text-danger">*</span>( Upload By: 261 X 261 ) (Type: jpeg,png,jpg)</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                            @if ( $galleries && $galleries->image)
                                <img src="{{ asset("storage/$galleries->image") }}" class="h-auto img-thumbnail"  style="width: 125px !important; margin: 10px 0px 50px 0px;" alt="">
                            @endif
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
            title: {
                required: true,
            },
            image: {
                required: {{ isset($galleries->id) ? 'false' : 'true' }},
            },
        }
    };

    validationChk('#galleries-add-from',conf);

    // sidebar edit active start
    $(function(){
            var current = window.location.href;
            var mode = "{{ isset($galleries->id) ? '1' : '0' }}";
            console.log(current+mode);
            if(current && mode=='1'){
                $(".galleries-edit-smenu").addClass('kt-menu__item kt-menu__item--active kt-menu__item--open');
            }
        })
    // sidebar edit active end

</script>

@endpush

