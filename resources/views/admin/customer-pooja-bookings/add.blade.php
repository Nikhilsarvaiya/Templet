@extends('admin.layouts.default')
@section('title', 'Add Customer Pooja Bookings')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
           Customer Pooja Bookings </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.customer.pooja.bookings.list') }}" class="kt-subheader__breadcrumbs-home" title="Back"><i class="fa fa-arrow-left"></i></a>
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
                    {{ isset($customer_pooja_bookings->id) ? 'Edit Customer Pooja Bookings' : 'Add Customer Pooja Bookings' }} 
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <!--begin::Form-->
        <form class="kt-form" action="{{ ($customer_pooja_bookings) ? route('admin.customer.pooja.bookings.store') : route('admin.customer.pooja.bookings.store') }}" id="faq-form" enctype="multipart/form-data" method="post" >
            @csrf
            <div class="kt-portlet__body">
                <input type="hidden" id="edit_id" name="edit_id" value="{{ $customer_pooja_bookings->id ?? null }}">
                <div class="">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Pooja: <span class="text-danger">*</span></label>
                            <select id="pooja_creation_id" name="pooja_creation_id" class="form-control" onchange="poojaCreationId()">
                                <option value="">Select Pooja</option>
                                @if(!empty($poojaCreations))
                                    @foreach($poojaCreations as $poojaCreation)
                                        <option data-name="{{ $poojaCreation->pooja_name }}" value="{{$poojaCreation->id}}" {{ ($customer_pooja_bookings->pooja_creation_id ?? 0)==$poojaCreation->id ? 'selected' : '' }}>{{ $poojaCreation->id }} {{ $poojaCreation->pooja_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label>Customer Name: <span class="text-danger">*</span></label>
                            <input type="text" name="customer_name" placeholder="Enter Customer Name" value="{{ $customer_pooja_bookings->customer_name ?? null }}" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6" >
                            <div class="">
                                <div class="">
                                    <label>Customer Mobile Number: <span class="text-danger">*</span></label>
                                </div>
                                <input type="tel" id="customer_number" name="customer_number" minlength="7" maxlength="15" placeholder="" value="{{$customer_pooja_bookings ? '+'.($customer_pooja_bookings->country_code.''.$customer_pooja_bookings->customer_number) : null }}" class="form-control only-mobile">
                            </div>
                            <label id="customer_number-error" class="error" for="customer_number"></label>
                        </div>
                        <div class="col-lg-6">
                            <label>Date: <span class="text-danger">*</span></label>
                            <input type="date" id="date" name="date" placeholder="Enter Date" value="{{ $customer_pooja_bookings->date ?? null }}" class="form-control valid" onchange="mainDate(this);" min="<?= date('Y-m-d'); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12 slot-selection-checkbox">
                            <div class="col-lg-2">
                                <label>Select Slot: <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-10 slot-selection-checkbox">
                                <div id="all_slot_data" class="slot-selection-checkbox"></div>
                            </div>
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
    // let conf = {
    //     rules: {
    //         pooja_creation_id: {
    //             required: true,
    //         },
    //         customer_name: {
    //             required: true,
    //         },
    //         customer_number: {
    //             required: true,
    //         },
    //         date: {
    //             required: true,
    //         },
    //         // 'slots[]': {
    //         //     required: true,
    //         // },
    //     },
    // };
    
    // validationChk('#faq-form',conf);


    if ($("#faq-form").length > 0) {
        $("#faq-form").validate({
            ignore: [],
            rules: {
                pooja_creation_id: {
                    required: true,
                },
                customer_name: {
                    required: true,
                },
                customer_number: {
                    required: true,
                },
                date: {
                    required: true,
                },
                
            },
            messages: {
                pooja_creation_id: {
                    required: "This field is required",
                },
                customer_name: {
                    required: "This field is required",
                },
                customer_number: {
                    required: "This field is required",
                },
                date: {
                    required: "This field is required",
                },
            },
        })
    }


    // sidebar edit active start
    $(function(){
        var current = window.location.href;
        var mode = "{{ isset($customer_pooja_bookings->id) ? '1' : '0' }}";
        console.log(current+mode);
        if(current && mode=='1'){
            $(".customer_pooja_bookings-edit-smenu").addClass('kt-menu__item kt-menu__item--active kt-menu__item--open');
        }
    })
    // sidebar edit active end

    function poojaCreationId(){
        $("#all_slot_data").html("<p class='ml-2'>No Slot Available.</p>");
        document.getElementById("date").value = "";
    }

    // phone code
    $(document).ready(function () {
        let edit_date = "{{ $customer_pooja_bookings->date ?? null }}";
        if(edit_date){
            // alert(edit_date);
            mainDateEdit(edit_date);
        }
    });

    function mainDate(event){
        let pooja_creation_id = $('#pooja_creation_id').val();
        var sel = document.getElementById('pooja_creation_id');
        var selected = sel.options[sel.selectedIndex];
        let pooja_creation_name = selected.getAttribute('data-name');
        let date = $(event).val();

        if(!pooja_creation_id){
            alert("Please select before pooja then after date.");
            document.getElementById("date").value = "";
        } else {
            $.ajax({
            url: "{{route('admin.customer.pooja.bookings.get.date')}}",
            type: 'get',
            data: {pooja_creation_name:pooja_creation_name,date:date},
            dataType: 'json',
            success: function(response) {
                if (response != null && response !="") {
                    $("#all_slot_data").html(response);
                } else {
                    $("#all_slot_data").html("<p class='ml-2'>No Slot Available.</p>");
                }
            }
        });
        }

    }

    function mainDateEdit(event){
        let pooja_creation_id = $('#pooja_creation_id').val();
        var sel = document.getElementById('pooja_creation_id');
        var selected = sel.options[sel.selectedIndex];
        let pooja_creation_name = selected.getAttribute('data-name');
        let date = event;
        var edit_id = $('#edit_id').val();

        if(!pooja_creation_id){
            alert("Please select before pooja then after date.");
            document.getElementById("date").value = "";
        } else {
            $.ajax({
            url: "{{route('admin.customer.pooja.bookings.get.date.edit')}}",
            type: 'get',
            data: {edit_id:edit_id,pooja_creation_name:pooja_creation_name,date:date},
            dataType: 'json',
            success: function(response) {
                if (response != null && response !="") {
                    $("#all_slot_data").html(response);
                } else {
                    $("#all_slot_data").html("<p class='ml-2'>No Slot Available.</p>");
                }
            }
        });
        }

    }


    // mobile country code start
        const input = document.querySelector("#customer_number");
        const button = document.querySelector("#btn");
        const errorMsg = document.querySelector("#error-msg");
        const validMsg = document.querySelector("#valid-msg");

        // here, the index maps to the error code returned from getValidationError - see readme
        const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

        if($('#customer_number').length > 0) {
            var iti = window.intlTelInput(document.querySelector("#customer_number"), {
                separateDialCode: true,
                preferredCountries:["gb"],
                hiddenInput: "mobile",
                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
            });

            $("form").submit(function() {
                $("#customer_number").append('<input type="hidden" name="country_code" value="'+iti.getSelectedCountryData().dialCode+'" /> ');
            });
        }

        const reset = () => {
            input.classList.remove("error");
            // errorMsg.innerHTML = "";
            // errorMsg.classList.add("hide");
            // validMsg.classList.add("hide");
        };

        // on click button: validate
        input.addEventListener('blur', () => {
            $("#customer_number").append('<input type="hidden" name="country_code" value="'+iti.getSelectedCountryData().dialCode+'" /> ');
            reset();
            // if (input.value.trim()) {
            //     if (input.isValidNumber()) {
            //             validMsg.classList.remove("hide");
            //     } else {
            //             input.classList.add("error");
            //             const errorCode = input.getValidationError();
            //             errorMsg.innerHTML = errorMap[errorCode];
            //             errorMsg.classList.remove("hide");
            //     }
            // }
        });
        // on keyup / change flag: reset
        input.addEventListener('change', reset);
        input.addEventListener('keyup', reset);
    // mobile country code end

</script>

@endpush

