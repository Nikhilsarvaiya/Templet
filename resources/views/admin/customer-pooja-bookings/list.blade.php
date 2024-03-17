@extends('admin.layouts.default')
@section('title', 'Customer Pooja Bookings')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">Customer Pooja Bookings</h3>
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
                    Customer Pooja Bookings
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        &nbsp;
                        
                            <a href="{{ route('admin.customer.pooja.bookings.add') }}" class="btn btn-brand btn-elevate btn-icon-sm" id="add-faq-form-modal">
                                <i class="la la-plus"></i>
                                New add
                            </a>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 date-filter-sly">
                        <label>Start Date: </label>
                        <input class="form-control datepicker" type="date" id="from_date" name="from_date" placeholder="From Date" autocomplete="off">
                    </div>
                    <div class="col-md-3 date-filter-sly">
                        <label>End Date: </label>
                        <input class="form-control datepicker" type="date" id="to_date" name="to_date" onchange="checkDate()" placeholder="To Date" autocomplete="off">
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                <div class="col-md-2 date-filter-sly">
                                    <a href="#" class="btn btn-primary filterBy">Filter</a>
                                </div>
                            </div>
                        </div>
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
                        <th>Pooja</th>
                        <th>Date</th>
                        <th>Customer Name</th>
                        <th>Customer Number</th>
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
            ajax: {
                url: '{{ route('admin.customer.pooja.bookings.list') }}',
                method: 'post',
                data: function(d) {
                    d.from_date = $('input[name=from_date]').val();
                    d.to_date = $('input[name=to_date]').val();
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'pooja_creation_id', name: 'pooja_creation_id'},
                {data: 'date', name: 'date'},
                {data: 'customer_name', name: 'customer_name'},
                {data: 'customer_number', name: 'customer_number'},
                {data: 'action', name: 'action', orderable:false, serachable:false, sClass:'text-center'},
            ]
        };
        let table = makeDataTable('#faq_list_table', "{{ route('admin.customer.pooja.bookings.list') }}", conf)

        $('.filterBy').click(function(e) {
            table.draw();
            e.preventDefault();
        });

        
        function checkDate() {

            var objFromDate = document.getElementById("from_date").value;
            var objToDate = document.getElementById("to_date").value;

            var FromDate = (new Date(objFromDate).getTime()) / 1000;
            var ToDate = (new Date(objToDate).getTime()) / 1000;

            if (FromDate > ToDate) {
                alert("End Date Should Be Greater Than Start Date");
            }
        }
    </script>
@endpush