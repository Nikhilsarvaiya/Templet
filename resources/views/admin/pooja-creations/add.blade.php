@extends('admin.layouts.default')
@section('title', 'Add Pooja Creations')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
           Pooja Creations </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.pooja.creations.list') }}" class="kt-subheader__breadcrumbs-home" title="Back"><i class="fa fa-arrow-left"></i></a>
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
                    {{ isset($pooja_creations->id) ? 'Edit Pooja Creations' : 'Add Pooja Creations' }} 
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <!--begin::Form-->
        <form class="kt-form" action="{{ ($pooja_creations) ? route('admin.pooja.creations.update') : route('admin.pooja.creations.store') }}" id="faq-form" enctype="multipart/form-data" method="post" >
            @csrf
            <div class="kt-portlet__body">
                <input type="hidden" name="edit_id" value="{{ $pooja_creations->id ?? null }}">
                <div class="form-group row">
                    <div class="col-lg-8">
                        <label>Name: <span class="text-danger">*</span></label>
                        <select id="pooja_id" name="pooja_id" class="form-control" onchange="getPoojaData()" required>
                            <option value="">Select Pooja</option>
                            @if(!empty($poojaMasters))
                                @foreach($poojaMasters as $poojaMaster)
                                    <option value="{{$poojaMaster->id}}" {{ ($pooja_creations->pooja_id ?? 0)==$poojaMaster->id ? 'selected' : '' }}>{{ $poojaMaster->pooja_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Description:</label>
                        <textarea name="pooja_desc" id="pooja_desc" class="form-control" placeholder="Enter Description" cols="15" rows="5">{{ $pooja_creations->pooja_desc ?? null }}</textarea>
                    </div>
                    <div class="col-lg-6">
                        <label>Samagri List: </label>
                        <textarea name="samagri_list" id="samagri_list" class="form-control" placeholder="Enter Samagri List" cols="15" rows="5">{{ $pooja_creations->samagri_list ?? null }}</textarea>
                    </div>
                </div>
                <div class="" id="dynamicAddRemove">
                    <div class="form-group row">
                        <div class="col-lg-11" id="parent-id-0">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Date: <span class="text-danger">*</span></label>
                                    <input type="date" name="date[1]" placeholder="Enter Date" value="{{ $pooja_creations->date ?? '' }}" class="form-control valid" required onchange="mainDate(this);">
                                </div>
                                <div class="col-lg-3 blocked-radio-top">
                                    <div class="blocked-radio">
                                        <label>Morning Blocked: <span class="text-danger">*</span></label><br>
                                        <input type="radio" id="morning_blocked10" name="morning_blocked[1]" value="1" class="blocked-radio-btn" onclick="hideMorning(this)">
                                        <label for="morning_blocked1">Yes</label><br>
                                        <input type="radio" id="morning_blocked00" name="morning_blocked[1]" value="0" class="blocked-radio-btn" checked onclick="showMorning(this)">
                                        <label for="morning_blocked0">No</label><br>
                                    </div>
                                </div>
                                <div class="col-lg-3 blocked-radio-top">
                                    <div class="blocked-radio">
                                        <label>Evening Blocked: <span class="text-danger">*</span></label><br>
                                        <input type="radio" id="evening_blocked10" name="evening_blocked[1]" value="1" class="blocked-radio-btn" onclick="hideEvening(this)">
                                        <label for="evening_blocked1">Yes</label><br>
                                        <input type="radio" id="evening_blocked00" name="evening_blocked[1]" value="0" class="blocked-radio-btn" checked onclick="showEvening(this)">
                                        <label for="evening_blocked0">No</label><br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3 morning-hide-show0">
                                    <label for="morning_start_time">Morning Start Time: <span class="text-danger">*</span></label>
                                    <input type="time" id="morning_start_time0" name="morning_start_time[1]" placeholder="Enter Morning Start Time" value="{{ $pooja_creations->morning_start_time ?? '' }}" class="form-control valid" onchange="morningStartTime(this)" step="" />
                                    <div id="morning_start_time-error0" class="error " ></div>
                                </div>
                                <div class="col-lg-3 morning-hide-show0">
                                    <label for="morning_end_time">Morning End Time: <span class="text-danger">*</span></label>
                                    <input type="time" id="morning_end_time0" name="morning_end_time[1]" placeholder="Enter Morning End Time" value="{{ $pooja_creations->morning_end_time ?? '' }}" class="form-control valid" onchange="morningEndTime(this)" step="" />
                                    <div id="morning_end_time-error0" class="error " ></div>                        
                                </div>
                                <div class="col-lg-3 evening-hide-show0">
                                    <label for="evening_start_time">Evening Start Time: <span class="text-danger">*</span></label>
                                    <input type="time" id="evening_start_time0" name="evening_start_time[1]" placeholder="Enter Evening Start Time" value="{{ $pooja_creations->evening_start_time ?? '' }}" class="form-control valid" onchange="eveningStartTime(this)" step="" />
                                    <div id="evening_start_time-error0" class="error " ></div>
                                </div>
                                <div class="col-lg-3 evening-hide-show0">
                                    <label for="evening_end_time">Evening End Time: <span class="text-danger">*</span></label>
                                    <input type="time" id="evening_end_time0" name="evening_end_time[1]" placeholder="Enter Evening End Time" value="{{ $pooja_creations->evening_end_time ?? '' }}" class="form-control valid" onchange="eveningEndTime(this)" step="" />
                                    <div id="evening_end_time-error0" class="error " ></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <button type="button" name="add" class="btn btn-outline-primary add-main custom-style-add" id="dynamic-ar">Add </button>
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

    let editor_pooja_desc;
    let editor_samagri_list;

    ClassicEditor.create( document.querySelector( '#pooja_desc' ), {
        height : 150,
        removePlugins: [ 'image' ],
        removeButtons: [ 'image' ],
        removetoolbar: [ 'image' ],
        // toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'link' ]
    })
    .then( newEditor => {
        editor_pooja_desc = newEditor;
    } )
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
    .then( newEditor => {
        editor_samagri_list = newEditor;
    } )
    .catch( error => {
        console.log( error );
    } );
    let conf = {
        rules: {
            'pooja_id[]': {
                required: true,
            },
            'date[]': {
                required: true,
            },
        },
    };
    
    validationChk('#faq-form',conf);


    // multiple add start
    let i = 1;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('  \
            <div class="form-group row main-remove">\
                <div class="col-lg-11" id="parent-id-'+i+'">\
                    <div class="form-group row">\
                        <div class="col-lg-6">\
                            <label>Date: <span class="text-danger">*</span></label>\
                            <input type="date" name="date['+i+']" placeholder="Enter Date" value="" class="form-control valid" required onchange="mainDate(this);">\
                        </div>\
                        <div class="col-lg-3 blocked-radio-top">\
                            <div class="blocked-radio">\
                                <label>Morning Blocked: <span class="text-danger">*</span></label><br>\
                                <input type="radio" id="morning_blocked1'+i+'" name="morning_blocked['+i+']" value="1" class="blocked-radio-btn" onclick="hideMorning(this)">\
                                <label for="morning_blocked1">Yes</label><br>\
                                <input type="radio" id="morning_blocked0'+i+'" name="morning_blocked['+i+']" value="0" class="blocked-radio-btn" checked onclick="showMorning(this)">\
                                <label for="morning_blocked0">No</label><br>\
                            </div>\
                        </div>\
                        <div class="col-lg-3 blocked-radio-top">\
                            <div class="blocked-radio">\
                                <label>Evening Blocked: <span class="text-danger">*</span></label><br>\
                                <input type="radio" id="evening_blocked1'+i+'" name="evening_blocked['+i+']" value="1" class="blocked-radio-btn" onclick="hideEvening(this)">\
                                <label for="evening_blocked1">Yes</label><br>\
                                <input type="radio" id="evening_blocked0'+i+'" name="evening_blocked['+i+']" value="0" class="blocked-radio-btn" checked onclick="showEvening(this)">\
                                <label for="evening_blocked0">No</label><br>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="form-group row">\
                        <div class="col-lg-3 morning-hide-show'+i+'">\
                            <label for="morning_start_time">Morning Start Time: <span class="text-danger">*</span></label>\
                            <input type="time" id="morning_start_time'+i+'" name="morning_start_time['+i+']" placeholder="Enter Morning Start Time" value="{{ $pooja_creations->morning_start_time ?? '' }}" class="form-control valid" onchange="morningStartTime(this)" step="" />\
                            <div id="morning_start_time-error'+i+'" class="error " ></div>\
                        </div>\
                        <div class="col-lg-3 morning-hide-show'+i+'">\
                            <label for="morning_end_time">Morning End Time: <span class="text-danger">*</span></label>\
                            <input type="time" id="morning_end_time'+i+'" name="morning_end_time['+i+']" placeholder="Enter Morning End Time" value="{{ $pooja_creations->morning_end_time ?? '' }}" class="form-control valid" onchange="morningEndTime(this)" step="" />\
                            <div id="morning_end_time-error'+i+'" class="error " ></div>\
                        </div>\
                        <div class="col-lg-3 evening-hide-show'+i+'">\
                            <label for="evening_start_time">Evening Start Time: <span class="text-danger">*</span></label>\
                            <input type="time" id="evening_start_time'+i+'" name="evening_start_time['+i+']" placeholder="Enter Evening Start Time" value="{{ $pooja_creations->evening_start_time ?? '' }}" class="form-control valid" onchange="eveningStartTime(this)" step="" />\
                            <div id="evening_start_time-error'+i+'" class="error " ></div>\
                        </div>\
                        <div class="col-lg-3 evening-hide-show'+i+'">\
                            <label for="evening_end_time">Evening End Time: <span class="text-danger">*</span></label>\
                            <input type="time" id="evening_end_time'+i+'" name="evening_end_time['+i+']" placeholder="Enter Evening End Time" value="{{ $pooja_creations->evening_end_time ?? '' }}" class="form-control valid" onchange="eveningEndTime(this)" step="" />\
                            <div id="evening_end_time-error'+i+'" class="error " ></div>\
                        </div>\
                    </div>\
                </div>\
                <div class="col-lg-1">\
                    <button type="button" class="btn btn-outline-danger add-main custom-style-add remove-input-field">Remove </button>\
                </div>\
            </div>');
    });
    $(document).on('click', '.remove-input-field', function (e) {
        $(this).parents('.main-remove').remove();
        e.preventDefault();
    });
    // multiple add end

    // getPoojaData
    function getPoojaData(){

        // get value of option
        var sel1 = document.getElementById("pooja_id");
        var strUser1 = sel1.options[sel1.selectedIndex].value;
        console.log(strUser1);

        // get text of option
        var sel2 = document.getElementById("pooja_id");
        var strUser2 = sel2.options[sel2.selectedIndex].text;
        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", "pooja_name");
        input.setAttribute("value", strUser2);
        //append to form element that you want .
        document.getElementById("faq-form").appendChild(input);

        // ajax call to get pooja desc and samagri
        $.ajax({
            url: "{{route('admin.pooja.get.data')}}",
            type: 'get',
            data: {id:strUser1},
            dataType: 'json',
            success: function(response) {
                if (response != null) {
                    editor_pooja_desc.setData( response.pooja_desc );
                    editor_samagri_list.setData( response.samagri_list );
                }
            }
        });
    }

    // mainDate on add time
    function mainDate(event){

        var tralse = true;
        var selectRound_arr = []; // for contestant name
        $('.valid').each(function(k, v) {
            var getVal = $(v).val();
            // alert(getVal);
            if (getVal && $.trim(selectRound_arr.indexOf(getVal)) != -1) {
                tralse = false;
                //it should be if value 1 = value 1 then alert, and not those if -select- = -select-. how to avoid those -select-
                alert('Date cannot be same');
                $(v).val("");
                return false;
            } else {
                selectRound_arr.push($(v).val());
            }
        });
        if (!tralse) {
            return false;
        }


        let date = $(event).val();
        var parent_div_id = $(event).parent().parent().parent().attr('id');
        const myArray = parent_div_id.split("-");
        // ajax call to get panditji availability
        $.ajax({
            url: "{{route('admin.pooja.get.panditji.data')}}",
            type: 'get',
            data: {date:date},
            dataType: 'json',
            success: function(response) {
                if (response != null) {
                    if(response.date){
                        console.log(response);
                        if(response.morning=="0"){
                            document.getElementById("morning_start_time"+myArray[2]).required = false;
                            document.getElementById("morning_end_time"+myArray[2]).required = false;
                            document.getElementById("morning_start_time"+myArray[2]).classList.remove('is-invalid');
                            document.getElementById("morning_end_time"+myArray[2]).classList.remove('is-invalid');
                            // morning-hide-show
                            $(".morning-hide-show"+myArray[2]).hide();
                            document.getElementById("morning_start_time"+myArray[2]).value = "";
                            document.getElementById("morning_end_time"+myArray[2]).value = "";
                            // morning_blocked1
                            document.getElementById("morning_blocked1"+myArray[2]).checked = true;
                            document.getElementById("morning_blocked0"+myArray[2]).checked = false;
                            document.getElementById("morning_blocked1"+myArray[2]).disabled = true;
                            document.getElementById("morning_blocked0"+myArray[2]).disabled = true;
                        } else{
                            document.getElementById("morning_start_time"+myArray[2]).required = true;
                            document.getElementById("morning_end_time"+myArray[2]).required = true;
                            // morning-hide-show
                            $(".morning-hide-show"+myArray[2]).show();
                            // morning_blocked1
                            document.getElementById("morning_blocked1"+myArray[2]).checked = false;
                            document.getElementById("morning_blocked0"+myArray[2]).checked = true;
                            document.getElementById("morning_blocked1"+myArray[2]).disabled = false;
                            document.getElementById("morning_blocked0"+myArray[2]).disabled = false;
                        }
                        if(response.evening=="0"){
                            document.getElementById("evening_start_time"+myArray[2]).required = false;
                            document.getElementById("evening_end_time"+myArray[2]).required = false;
                            document.getElementById("evening_start_time"+myArray[2]).classList.remove('is-invalid');
                            document.getElementById("evening_end_time"+myArray[2]).classList.remove('is-invalid');
                            // evening-hide-show
                            $(".evening-hide-show"+myArray[2]).hide();
                            document.getElementById("evening_start_time"+myArray[2]).value = "";
                            document.getElementById("evening_end_time"+myArray[2]).value = "";
                            // evening_blocked1
                            document.getElementById("evening_blocked1"+myArray[2]).checked = true;
                            document.getElementById("evening_blocked0"+myArray[2]).checked = false;
                            document.getElementById("evening_blocked1"+myArray[2]).disabled = true;
                            document.getElementById("evening_blocked0"+myArray[2]).disabled = true;
                        } else{
                            document.getElementById("evening_start_time"+myArray[2]).required = true;
                            document.getElementById("evening_end_time"+myArray[2]).required = true;
                            // evening-hide-show
                            $(".evening-hide-show"+myArray[2]).show();
                            // evening_blocked1
                            document.getElementById("evening_blocked1"+myArray[2]).checked = false;
                            document.getElementById("evening_blocked0"+myArray[2]).checked = true;
                            document.getElementById("evening_blocked1"+myArray[2]).disabled = false;
                            document.getElementById("evening_blocked0"+myArray[2]).disabled = false;
                        }
                    } else {
                        $(".morning-hide-show"+myArray[2]).show();
                        $(".evening-hide-show"+myArray[2]).show();
                        document.getElementById("morning_start_time"+myArray[2]).required = true;
                        document.getElementById("morning_end_time"+myArray[2]).required = true;
                        document.getElementById("evening_start_time"+myArray[2]).required = true;
                        document.getElementById("evening_end_time"+myArray[2]).required = true;
                        document.getElementById("morning_blocked1"+myArray[2]).checked = false;
                        document.getElementById("morning_blocked0"+myArray[2]).checked = true;
                        document.getElementById("evening_blocked1"+myArray[2]).checked = false;
                        document.getElementById("evening_blocked0"+myArray[2]).checked = true;
                        document.getElementById("morning_blocked1"+myArray[2]).disabled = false;
                        document.getElementById("morning_blocked0"+myArray[2]).disabled = false;
                        document.getElementById("evening_blocked1"+myArray[2]).disabled = false;
                        document.getElementById("evening_blocked0"+myArray[2]).disabled = false;
                    }
                }
            }
        });
    }

    $(function() {
        let edit_id = "{{ $pooja_creations->id ?? null }}";
        if(edit_id){
            let edit_date = "{{ $pooja_creations->date ?? null }}";
            mainDateEdit(edit_date);
        }
    });

    // show/hide Morning by radio
    function hideMorning(event){
        var parent_div_id = $(event).parent().parent().parent().parent().attr('id');
        const myArray = parent_div_id.split("-");

        $(".morning-hide-show"+myArray[2]).hide();
        document.getElementById("morning_start_time"+myArray[2]).required = false;
        document.getElementById("morning_end_time"+myArray[2]).required = false;
        document.getElementById("morning_start_time"+myArray[2]).classList.remove('is-invalid');
        document.getElementById("morning_end_time"+myArray[2]).classList.remove('is-invalid');
        document.getElementById("morning_start_time"+myArray[2]).value = "";
        document.getElementById("morning_end_time"+myArray[2]).value = "";
    }
    function showMorning(event){
        var parent_div_id = $(event).parent().parent().parent().parent().attr('id');
        const myArray = parent_div_id.split("-");
        
        $(".morning-hide-show"+myArray[2]).show();
        document.getElementById("morning_start_time"+myArray[2]).required = true;
        document.getElementById("morning_end_time"+myArray[2]).required = true;
    }

    // show/hide Evening by radio
    function hideEvening(event){
        var parent_div_id = $(event).parent().parent().parent().parent().attr('id');
        const myArray = parent_div_id.split("-");

        $(".evening-hide-show"+myArray[2]).hide();
        document.getElementById("evening_start_time"+myArray[2]).required = false;
        document.getElementById("evening_end_time"+myArray[2]).required = false;
        document.getElementById("evening_start_time"+myArray[2]).classList.remove('is-invalid');
        document.getElementById("evening_end_time"+myArray[2]).classList.remove('is-invalid');
        document.getElementById("evening_start_time"+myArray[2]).value = "";
        document.getElementById("evening_end_time"+myArray[2]).value = "";
    }
    function showEvening(event){
        var parent_div_id = $(event).parent().parent().parent().parent().attr('id');
        const myArray = parent_div_id.split("-");

        $(".evening-hide-show"+myArray[2]).show();
        document.getElementById("evening_start_time"+myArray[2]).required = true;
        document.getElementById("evening_end_time"+myArray[2]).required = true;
    }

    // morningStartTime
    function morningStartTime(event){
        var parent_div_id = $(event).parent().parent().parent().attr('id');
        const myArray = parent_div_id.split("-");

        let hour = $(event).val().slice(0, 2);
        let start_full_hrs = $(event).val();
        // some if else here
        if(start_full_hrs < "00:00:00" || start_full_hrs > "12:00:00"){
            document.getElementById("morning_start_time-error"+myArray[2]).innerHTML = "Must be between 00:00 to 12:00 (AM)";
            alert("Must be between 00:00 to 12:00 (AM)");
            document.getElementById("morning_start_time"+myArray[2]).value = "";
        }else{
            document.getElementById("morning_start_time-error"+myArray[2]).innerHTML = "";
        }

        let end_full_hrs = $('#morning_end_time'+myArray[2]).val();
        var stt = new Date("March 14, 2024 " + start_full_hrs);
        stt = stt.getTime();
        var endt= new Date("March 14, 2024 " + end_full_hrs);
        endt = endt.getTime();

        if(end_full_hrs){
            if(stt >endt){
                document.getElementById("morning_start_time-error"+myArray[2]).innerHTML = "Start time should be smaller than end time!";
                document.getElementById("morning_start_time"+myArray[2]).value = "";
            }else{
                document.getElementById("morning_start_time-error"+myArray[2]).innerHTML = "";
            }
        }
    }

    // morningEndTime
    function morningEndTime(event){
        var parent_div_id = $(event).parent().parent().parent().attr('id');
        const myArray = parent_div_id.split("-");

        let hour = $(event).val().slice(0, 2);
        let end_full_hrs = $(event).val();

        // some if else here
        if(end_full_hrs < "00:00:00" || end_full_hrs > "12:00:00"){
            document.getElementById("morning_end_time-error"+myArray[2]).innerHTML = "Must be between 00:00 to 12:00 (AM)";
            alert("Must be between 00:00 to 12:00 (AM)");
            document.getElementById("morning_end_time"+myArray[2]).value = "";
        }else{
            document.getElementById("morning_end_time-error"+myArray[2]).innerHTML = "";
        }

        let start_full_hrs = $('#morning_start_time'+myArray[2]).val();
        var stt = new Date("March 14, 2024 " + start_full_hrs);
        stt = stt.getTime();
        var endt= new Date("March 14, 2024 " + end_full_hrs);
        endt = endt.getTime();

        if(stt >endt){
            document.getElementById("morning_end_time-error"+myArray[2]).innerHTML = "Start time should be smaller than end time!";
            // alert("Start time should be smaller than end time!");
            document.getElementById("morning_end_time"+myArray[2]).value = "";
        }else{
            document.getElementById("morning_end_time-error"+myArray[2]).innerHTML = "";
        }

    }

    // eveningStartTime
    function eveningStartTime(event){
        var parent_div_id = $(event).parent().parent().parent().attr('id');
        const myArray = parent_div_id.split("-");

        let hour = $(event).val().slice(0, 2);
        let start_full_hrs = $(event).val();
        // some if else here
        if(start_full_hrs < "12:00:00" || start_full_hrs > "24:00:00"){
            document.getElementById("evening_start_time-error"+myArray[2]).innerHTML = "Must be between 12:00 to 23:59 (PM)";
            alert("Must be between 12:00 to 23:59 (PM)");
            document.getElementById("evening_start_time"+myArray[2]).value = "";
        }else{
            document.getElementById("evening_start_time-error"+myArray[2]).innerHTML = "";
        }

        let end_full_hrs = $('#evening_end_time'+myArray[2]).val();
        var stt = new Date("March 14, 2024 " + start_full_hrs);
        stt = stt.getTime();
        var endt= new Date("March 14, 2024 " + end_full_hrs);
        endt = endt.getTime();

        if(end_full_hrs){
            if(stt >endt){
                document.getElementById("evening_start_time-error"+myArray[2]).innerHTML = "Start time should be smaller than end time!";
                document.getElementById("evening_start_time"+myArray[2]).value = "";
            }else{
                document.getElementById("evening_start_time-error"+myArray[2]).innerHTML = "";
            }
        }
    }

    // eveningEndTime
    function eveningEndTime(event){
        var parent_div_id = $(event).parent().parent().parent().attr('id');
        const myArray = parent_div_id.split("-");

        let hour = $(event).val().slice(0, 2);
        let end_full_hrs = $(event).val();
        // some if else here
        if(end_full_hrs < "12:00:00" || end_full_hrs > "24:00:00"){
            document.getElementById("evening_end_time-error"+myArray[2]).innerHTML = "Must be between 12:00 to 23:59 (PM)";
            alert("Must be between 12:00 to 23:59 (PM)");
            document.getElementById("evening_end_time"+myArray[2]).value = "";
        }else{
            document.getElementById("evening_end_time-error"+myArray[2]).innerHTML = "";
        }

        let start_full_hrs = $('#evening_start_time'+myArray[2]).val();
        var stt = new Date("March 14, 2024 " + start_full_hrs);
        stt = stt.getTime();
        var endt= new Date("March 14, 2024 " + end_full_hrs);
        endt = endt.getTime();

        if(stt >endt){
            document.getElementById("evening_end_time-error"+myArray[2]).innerHTML = "Start time should be smaller than end time!";
            document.getElementById("evening_end_time"+myArray[2]).value = "";
        }else{
            document.getElementById("evening_end_time-error"+myArray[2]).innerHTML = "";
        }
    }


    // sidebar edit active start
    $(function(){
            var current = window.location.href;
            var mode = "{{ isset($pooja_creations->id) ? '1' : '0' }}";
            if(current && mode=='1'){
                $(".pooja_creations-edit-smenu").addClass('kt-menu__item kt-menu__item--active kt-menu__item--open');
            }
        })
    // sidebar edit active end

</script>
@endpush

