@extends('admin.layouts.default')
@section('title', 'Contact-Us')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            Contact-Us </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        {{-- <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.contact.us.list') }}" class="kt-subheader__breadcrumbs-home" title="Back"><i class="fa fa-arrow-left"></i></a>
        </div> --}}
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
                   Edit Contact-Us 
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <!--begin::Form-->
        <form class="kt-form" action="{{ route('admin.contact.us.store') }}" id="contact-us-add-from" method="post" enctype="multipart/form-data">
            @csrf
            <div class="kt-portlet__body">
                <div class=" row">
                    <div class="form-group col-lg-6">
                        <label>Phone: <span class="text-danger">*</span></label>
                        <input type="number" minlength="7" maxlength="15" name="phone" placeholder="Enter Phone" value="{{ $contactus->phone ?? old('phone') }}" class="form-control" >
                        <input type="hidden" name="edit_id" value="{{ $contactus->id ?? null }}">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Email:<span class="text-danger">*</span></label>
                        <input type="email" name="email" placeholder="Enter Email" value="{{ $contactus->email ?? old('email') }}" class="form-control" pattern="[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[A-Za-z]{2,}$" >
                    </div>

                    <div class="form-group col-lg-12 ">
                        <label>Address:<span class="text-danger">*</span></label>
                        <textarea name="address" id="address" class="form-control" placeholder="Enter Address" cols="15" rows="3">{{ $contactus->address ?? old('address') }}</textarea>
                    </div>

                    <div class="form-group col-lg-12 ">
                        <label>Contact Us Title:<span class="text-danger">*</span></label>
                        <input type="text" name="contact_us_title" placeholder="Enter Contact Us Title" value="{{ $contactus->contact_us_title ?? old('contact_us_title') }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-12 ">
                        <label>Contact Us Description:</label>
                        <textarea name="contact_us_description" id="contact_us_description" class="form-control" placeholder="Enter Contact Us Description" cols="15" rows="3">{{ $contactus->contact_us_description ?? old('contact_us_description') }} </textarea>
                    </div>
                </div>
                <div class=" row">
                    <div class="form-group col-lg-6 ">
                        <label>Facebook Link</label>
                        <input type="url" name="social_link1" placeholder="Enter Facebook Link" value="{{ $contactus->social_link1 ?? old('social_link1') }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-6 ">
                        <label>Twitter Link</label>
                        <input type="url" name="social_link2" placeholder="Enter Twitter Link" value="{{ $contactus->social_link2 ?? old('social_link2') }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-6 ">
                        <label>Instagram Link</label>
                        <input type="url" name="social_link3" placeholder="Enter Instagram Link" value="{{ $contactus->social_link3 ?? old('social_link3') }}" class="form-control" >
                    </div>

                    <div class="form-group col-lg-6 ">
                        <label>Google Link</label>
                        <input type="url" name="social_link4" placeholder="Enter Google Link" value="{{ $contactus->social_link4 ?? old('social_link4') }}" class="form-control" >
                    </div>

                    <div class="form-group col-lg-12 ">
                        <label>Location :</label>
                        <textarea name="location" class="form-control" placeholder="Google Map Embed Iframe HTML" cols="15" rows="5">{{ $contactus->location ?? old('location') }}</textarea>
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
            phone: {
                required: true,
            },
            email: {
                required: true,
            },
            address: {
                required: true,
            },
            contact_us_title: {
                required: true,
            },
        },
    };
    
    validationChk('#contact-us-add-from',conf);

</script>
@endpush

