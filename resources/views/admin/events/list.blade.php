@extends('admin.layouts.default')
@section('title', 'Events')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">Events</h3>
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
                    Events
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        &nbsp;
                        @can('sub-admin-create')
                            <a href="{{ route('admin.events.add') }}" class="btn btn-brand btn-elevate btn-icon-sm" id="add-service-form-modal">
                                <i class="la la-plus"></i>
                                New add
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <!--begin::Portlet-->
            <!--end::Portlet-->
        <div class="kt-portlet__body">
            <!--begin: Datatable -->
            <table class="table table-striped table-hover" id="events_list_table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Start Date Time</th>
                        <th>End Date Time</th>
                        <th>Cost</th>
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
                {data: 'event_image', name: 'event_image', serachable:false,},
                {data: 'title', name: 'title'},
                {data: 'category_id', name: 'category_id',orderable:false, serachable:false,},
                {data: 'start_datetime', name: 'start_datetime'},
                {data: 'end_datetime', name: 'end_datetime'},
                {data: 'cost', name: 'cost'},
                {data: 'action', name: 'action', orderable:false, serachable:false, sClass:'text-center'},
            ]
        };
        makeDataTable('#events_list_table', "{{ route('admin.events.list') }}", conf)
    </script>
@endpush