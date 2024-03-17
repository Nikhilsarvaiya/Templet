@extends('admin.layouts.default')
@section('title', 'Add Pooja Masters')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
           Pooja Masters </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.pooja.masters.list') }}" class="kt-subheader__breadcrumbs-home" title="Back"><i class="fa fa-arrow-left"></i></a>
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
                    {{ isset($pooja_masters->id) ? 'Edit Pooja Masters' : 'Add Pooja Masters' }} 
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <!--begin::Form-->
        <form class="kt-form" action="{{ ($pooja_masters) ? route('admin.pooja.masters.update') : route('admin.pooja.masters.store') }}" id="faq-form" enctype="multipart/form-data" method="post" >
            @csrf
            <div class="kt-portlet__body">
                <input type="hidden" name="edit_id" value="{{ $pooja_masters->id ?? null }}">
                <div class="form-group row">
                    <div class="col-lg-8">
                        <label>Name: <span class="text-danger">*</span></label>
                        <input type="text" name="pooja_name" placeholder="Enter Name" value="{{ $pooja_masters->pooja_name ?? null }}" class="form-control" maxlength="100">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-8">
                        <label>Description:</label>
                        <textarea name="pooja_desc" id="pooja_desc" class="form-control" placeholder="Enter Description" cols="15" rows="5">{{ $pooja_masters->pooja_desc ?? null }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-8">
                        <label>Samagri List: <span class="text-danger">*</span></label>
                        <textarea name="samagri_list" id="samagri_list" class="form-control" placeholder="Enter Samagri List" cols="15" rows="5">{{ $pooja_masters->samagri_list ?? null }}</textarea>
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

    ClassicEditor.create( document.querySelector( '#pooja_desc' ), {
        height : 150,
        removePlugins: [ 'image' ],
        removeButtons: [ 'image' ],
        removetoolbar: [ 'image' ],
        // toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'link' ]
    })
    .catch( error => {
        console.log( error );
    } );

    ClassicEditor.create( document.querySelector( '#samagri_list' ), {
        height : 150,
        removePlugins: [ 'image' ],
        removeButtons: [ 'image' ],
        removetoolbar: [ 'image' ],
        // toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'link' ]
    })
    .catch( error => {
        console.log( error );
    } );
    let conf = {
        rules: {
            pooja_name: {
                required: true,
            },
            samagri_list: {
                required: true,
            },
            
        },
    };
    
    validationChk('#faq-form',conf);


    // sidebar edit active start
    $(function(){
            var current = window.location.href;
            var mode = "{{ isset($pooja_masters->id) ? '1' : '0' }}";
            console.log(current+mode);
            if(current && mode=='1'){
                $(".pooja_masters-edit-smenu").addClass('kt-menu__item kt-menu__item--active kt-menu__item--open');
            }
        })
    // sidebar edit active end

</script>
@endpush

