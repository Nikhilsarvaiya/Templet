@extends('admin.layouts.default')
@section('title', 'Parking Assist')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">Parking Assist</h3>
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
                Parking Assist
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        &nbsp;
                        @can('sub-admin-create')
                            <a href="{{ route('admin.parkassists.add') }}" class="btn btn-brand btn-elevate btn-icon-sm" id="add-service-form-modal">
                                <i class="la la-plus"></i>
                                New add
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        </br>
            <div class="card-body">
                <form id="report" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <label>From Date :</label>
                            <input class="form-control datepicker date_s" type="date" name="from_date" id="from_date" placeholder="From Date" autocomplete="off">
                        </div>
                        <div class="col-md-3 ml-3">
                            <label>To Date :</label>
                            <input class="form-control datepicker date_s" type="date" name="to_date" id="to_date" placeholder="To Date" autocomplete="off">
                        </div>
                        <div class="col-md-2 kt-form__actions ml-3 " >
                            <a class="btn btn-primary filterBy" style=" margin-top: 25px;    color: #fff;">Filter</a>
                        </div>
                    </div>
                </form>
            </div>
        <!--begin::Portlet-->
            <!--end::Portlet-->
        <div class="kt-portlet__body">
            <!--begin: Datatable -->
            <table class="table table-striped table-hover" id="events_list_table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Vehicle Name</th>
                        <th>Vehicle No.</th>
                        <th>Mobile No.</th>
                        <th>Date</th>
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

        jQuery.validator.addMethod("greaterThan", 
            function(value, element, params) {

            if (!/Invalid|NaN/.test(new Date(value))) {
                return new Date(value) >= new Date($(params).val());
            }

            return isNaN(value) && isNaN($(params).val()) 
                || (Number(value) > Number($(params).val())); 
        },'Must be greater than from date.');

        var from_date_check = $('input[name=from_date]').val();
        $(".date_s").focusout(function(){
            $("#report").validate({
                rules: {
                    to_date: { 
                        required:false,
                        greaterThan: "#from_date" 
                    }
                }
            });
        });


        let conf = {
            ajax: {
                    url: '{{ route('admin.parkassists.list') }}',
                    method: 'post',
                    data: function(d) {
                        d.from_date = $('input[name=from_date]').val();
                        d.to_date = $('input[name=to_date]').val();
                    }
                },
            columns: [
                {data: 'user_id', name: 'user_id'},
                {data: 'vehicle_name', name: 'vehicle_name'},
                {data: 'vehicle_no', name: 'vehicle_no'},
                {data: 'mobile_no', name: 'mobile_no'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable:false, serachable:false, sClass:'text-center'},
            ]
        };
        let table = makeDataTable('#events_list_table', "{{ route('admin.parkassists.list') }}", conf)

        $('.filterBy').click(function(e) {
                table.draw();
                e.preventDefault();
            });
    </script>
@endpush