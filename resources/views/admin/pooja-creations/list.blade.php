@extends('admin.layouts.default')
@section('title', 'Pooja Creations')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">Pooja Creations</h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.home') }}" class="kt-subheader__breadcrumbs-home" title="Back"><i class="fa fa-arrow-left"></i></a>
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
                    <i class="kt-font-brand flaticon2-user"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Pooja Creations
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        &nbsp;
                        
                            <a href="{{ route('admin.pooja.creations.add') }}" class="btn btn-brand btn-elevate btn-icon-sm" id="add-faq-form-modal">
                                <i class="la la-plus"></i>
                                New add
                            </a>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--begin::Portlet-->
            <!--end::Portlet-->
        <div class="kt-portlet__body">
            <!--begin: Datatable -->
            <table class="table table-striped table-hover" id="faq_list_table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Samagri List</th>
                        <th>Date</th>
                        <th>Morning Blocked</th>
                        <th>Evening Blocked</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <!--end: Datatable -->
        </div>
    </div>
</div>  
<!-- end:: Content -->

@endsection
@push('script')
    <script>
        let conf = {
            columns: [
                {data: 'id', name: 'id'},
                {data: 'pooja_name', name: 'pooja_name'},
                {data: 'pooja_desc', name: 'pooja_desc'},
                {data: 'samagri_list', name: 'samagri_list'},
                {data: 'date', name: 'date'},
                {data: 'morning_blocked', name: 'morning_blocked'},
                {data: 'evening_blocked', name: 'evening_blocked'},
                {data: 'action', name: 'action', orderable:false, serachable:false, sClass:'text-center'},
            ]
        };
        makeDataTable('#faq_list_table', "{{ route('admin.pooja.creations.list') }}", conf)
    </script>
@endpush