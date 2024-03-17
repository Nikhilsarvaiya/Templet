@extends('admin.layouts.default')
@section('title', 'Network')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            {{ ($data) ? 'Edit' : 'Add' }} Network page content </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.home') }}" class="kt-subheader__breadcrumbs-home"><i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
    
</div>

<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    @include('admin.layouts.flash-message')
    <form class="kt-form" action="{{ ($data) ? route('admin.setting.branch.content.store') : route('admin.setting.branch.content.store') }}" enctype="multipart/form-data" id="service-menu-add-from" method="post" >
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        {{-- <i class="kt-font-brand flaticon-user-settings"></i> --}}
                    </span>
                    <h3 class="kt-portlet__head-title">
                        First section
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Title<span class="text-danger">*</span></label>
                        <input type="text" name="first_title" placeholder="Enter title" value="{{ $data->first_title ?? null }}" class="form-control" >
                        @csrf
                        <input type="hidden" name="edit_id" value="{{ $data->id ?? null }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12">
                        <label>Description<span class="text-danger">*</span></label>
                        <textarea name="first_desc" id="first_desc" class="form-control" placeholder="Enter description" cols="15" rows="5">{{ $data->first_desc ?? null }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        {{-- <i class="kt-font-brand flaticon-user-settings"></i> --}}
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Second section
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Title<span class="text-danger">*</span></label>
                        <input type="text" name="second_title" placeholder="Enter title" value="{{ $data->second_title ?? null }}" class="form-control" >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12">
                        <label>Description<span class="text-danger">*</span></label>
                        <textarea name="second_desc" id="second_desc" class="form-control" placeholder="Enter description" cols="15" rows="5">{{ $data->second_desc ?? null }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-outline-success">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>    
@endsection
@push('script')
<script type="text/javascript">
    let conf = {
        rules: {
            first_title: {
                required: true,
            },
            first_desc: {
                required: true,
            },
            second_title: {
                required: true,
            },
            second_desc: {
                required: true,
            },
        },
    };
    
    validationChk('#service-menu-add-from',conf);

    ClassicEditor.create( document.querySelector( '#first_desc' ), {
        height : 150,
    })
    .catch( error => {
        console.log( error );
    } );

    ClassicEditor.create( document.querySelector( '#second_desc' ), {
        height : 150,
    })
    .catch( error => {
        console.log( error );
    } );

</script>
@endpush

