@extends('admin.layouts.default')
@section('title', ($events) ? 'Edit' : 'Add'.' Events')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title"> Events </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.events.list') }}" class="kt-subheader__breadcrumbs-home" title="Back"><i class="fa fa-arrow-left"></i></a>
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
                    {{ isset($events->id) ? 'Edit Events' : 'Add Events' }} 
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <!--begin::Form-->
        <form class="kt-form" action="{{ ($events) ? route('admin.events.update') : route('admin.events.store') }}" id="events-add-from" enctype="multipart/form-data" method="post" >
            @csrf
            <div class="kt-portlet__body">

                <div class=" row">
                    <div class="form-group col-lg-4">
                        <label>Category<span class="text-danger">*</span></label>
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ ( $events && $events->category_id == $category->id ) ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="edit_id" value="{{ $events->id ?? null }}">
                    </div>

                    <div class="form-group col-lg-8">
                        <label>Title<span class="text-danger">*</span></label>
                        <input type="text" name="title" placeholder="Enter Title" value="{{ $events->title ?? old('title') }}" class="form-control" >
                    </div>
                </div>
                <div class=" row">
                    <div class="form-group col-lg-4">
                        <label>Days<span class="text-danger">*</span></label>
                        <select name="days" class="form-control">
                            <option value="">Select Days</option>
                            <option value="1" {{ ( $events && $events->days == 1 ) ? 'selected' : '' }}>Monday</option>
                            <option value="2" {{ ( $events && $events->days == 2 ) ? 'selected' : '' }}>Tuesday</option>
                            <option value="3" {{ ( $events && $events->days == 3 ) ? 'selected' : '' }}>Wednesday</option>
                            <option value="4" {{ ( $events && $events->days == 4 ) ? 'selected' : '' }}>Thursday</option>
                            <option value="5" {{ ( $events && $events->days == 5 ) ? 'selected' : '' }}>Friday</option>
                            <option value="6" {{ ( $events && $events->days == 6 ) ? 'selected' : '' }}>Saturday</option>
                            <option value="7" {{ ( $events && $events->days == 7 ) ? 'selected' : '' }}>Sunday</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-8">
                        <label>Address</label>
                        <input type="text" name="address" placeholder="Enter Address" value="{{ $events->address ?? old('address') }}" class="form-control" >
                    </div>
                </div>
                <div class=" row mt-3">
                    <div class="form-group col-lg-12">
                        <label>Description</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Enter description" cols="15" rows="5">{{ $events->description ?? old('description') }}</textarea>
                    </div>
                </div>

                <div class=" row">
                    <div class="form-group col-lg-4">
                        <label>Start Date<span class="text-danger">*</span></label>
                        <input type="datetime-local" min="<?=date('Y-m-d\Th:i')?>" step="2" name="start_datetime" id="start_datetime" placeholder="Enter Start Date" value="{{ $events->start_datetime ?? old('start_datetime') }}" class="form-control start_date" >
                    </div>
                    <div class="form-group col-lg-4">
                        <label>End Date<span class="text-danger">*</span></label>
                        <input type="datetime-local" step="2" name="end_datetime" id="end_datetime" placeholder="Enter End Date" value="{{ $events->end_datetime ?? old('end_datetime') }}" class="form-control end_date" >
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Duration</label>
                        <input type="text" name="duration" placeholder="Enter Duration" value="{{ $events->duration ?? old('duration') }}" class="form-control" >
                    </div>
                </div>

                <div class=" row">
                    <div class="form-group col-lg-4">
                        <label>Cost</label>
                        <input type="number" min="0" max="100000000" name="cost" placeholder="Enter Cost" value="{{ $events->cost ?? old('cost') }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-8">
                        <label>Website Url</label>
                        <input type="url" name="website_url" placeholder="Enter Website Url" value="{{ $events->website_url ?? old('website_url') }}" class="form-control" >
                    </div>
                </div>

                <div class=" row">
                    <div class="form-group col-lg-6">
                        <label>Organizer Name</label>
                        <input type="text" name="name" placeholder="Enter Name" value="{{ $events->name ?? old('name') }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Phone</label>
                        <input type="number" minlength="7" maxlength="15" name="phone" placeholder="Enter phone" value="{{ $events->phone ?? old('phone') }}" class="form-control" >
                    </div>
                </div>
                <div class=" row">
                    <div class="form-group col-lg-4">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Enter Email" value="{{ $events->email ?? old('email') }}" class="form-control" pattern="[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[A-Za-z]{2,}$" >
                    </div>
                    <div class="form-group col-lg-8">
                        <label>Organizer Website Url</label>
                        <input type="url" name="organizer_website_url" placeholder="Enter Organizer Website Url" value="{{ $events->organizer_website_url ?? old('organizer_website_url') }}" class="form-control" >
                    </div>
                </div>

                <div class=" row ">
                    <div class="form-group col-lg-6">
                        <label>Venue</label>
                        <input type="text" name="venue" placeholder="Enter Venue" value="{{ $events->venue ?? old('venue') }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Google Map Url</label>
                        <!-- <textarea type="url" name="google_map_url" class="form-control" placeholder="Enter google_map_url" cols="15" rows="1">{{ $events->google_map_url ?? old('google_map_url') }}</textarea> -->
                        <input type="url" name="google_map_url" placeholder="Enter Google Map Url" value="{{ $events->google_map_url ?? old('google_map_url') }}" class="form-control" >
                    </div>
                </div>

                <div class=" row mt-3">
                    <div class="form-group col-lg-6">
                        <label>List Image<span class="text-danger">*</span>( Upload By: 200 X 177 ) (Type: jpeg,png,jpg)</label>
                        <div class="custom-file">
                            <input type="file" name="list_image" class="custom-file-input" id="list_image">
                            <label class="custom-file-label" for="list_image">Choose file</label>
                            @if ( $events && $events->list_image)
                                <img src="{{ asset("storage/$events->list_image") }}" class="h-auto img-thumbnail"  style="width: 125px !important; margin: 10px 0px 50px 0px;" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Detail Page Image<span class="text-danger">*</span>( Upload By: 1142 X 475 ) (Type: jpeg,png,jpg)</label>
                        <div class="custom-file">
                            <input type="file" name="event_image" class="custom-file-input" id="event_image">
                            <label class="custom-file-label" for="event_image">Choose file</label>
                            @if ( $events && $events->event_image)
                                <img src="{{ asset("storage/$events->event_image") }}" class="h-auto img-thumbnail"  style="width: 250px !important; margin: 10px 0px 50px 0px;" alt="">
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

    ClassicEditor.create( document.querySelector( '#description' ), {
        height : 150,
    })
    .catch( error => {
        console.log( error );
    } );

</script>

<script type="text/javascript">
    let conf = {
        rules: {
            category_id: {
                required: true,
            },
            title: {
                required: true,
            },
            days: {
                required: true,
            },
            // address: {
            //     required: true,
            // },
            // description: {
            //     required: true,
            // },
            // cost: {
            //     required: true,
            // },
            // website_url: {
            //     required: true,
            // },
            // name: {
            //     required: true,
            // },
            // phone: {
            //     required: true,
            // },
            // email: {
            //     required: true,
            // },
            // organizer_website_url: {
            //     required: true,
            // },
            // venue: {
            //     required: true,
            // },
            // google_map_url: {
            //     required: true,
            // },
            event_image: {
                required: {{ isset($events->id) ? 'false' : 'true' }},
            },
            list_image: {
                required: {{ isset($events->id) ? 'false' : 'true' }},
            },
            start_datetime: {
                required: {{ isset($events->id) ? 'false' : 'true' }},
                min: {{ isset($events->id) ? 'false' : 'true' }},
                step: false,
            },
            end_datetime: { 
                required: {{ isset($events->id) ? 'false' : 'true' }},
                greaterThan: "#start_datetime",
                step: false
            }
        }
    };
    
    validationChk('#events-add-from',conf);

    jQuery.validator.addMethod("greaterThan", 
    function(value, element, params) {

        if (!/Invalid|NaN/.test(new Date(value))) {
            return new Date(value) > new Date($(params).val());
        }

        return isNaN(value) && isNaN($(params).val()) 
            || (Number(value) > Number($(params).val())); 
    },'Must be greater than start date.');

    
    //Get today's date and split it by "T"
    // var today = new Date().toISOString().split('T')[0];
    // document.getElementById("start_datetime").setAttribute('min', today);



    // sidebar edit active start
    $(function(){
            var current = window.location.href;
            var mode = "{{ isset($events->id) ? '1' : '0' }}";
            console.log(current+mode);
            if(current && mode=='1'){
                $(".events-edit-smenu").addClass('kt-menu__item kt-menu__item--active kt-menu__item--open');
            }
        })
    // sidebar edit active end

</script>

@endpush

