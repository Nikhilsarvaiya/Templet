@extends('admin.layouts.default')
@section('title', 'About-Us')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            About-Us </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        {{-- <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.about.us.list') }}" class="kt-subheader__breadcrumbs-home" title="Back"><i class="fa fa-arrow-left"></i></a>
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
                   Edit About-Us 
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <!--begin::Form-->
        <form class="kt-form" action="{{ route('admin.about.us.store') }}" id="about-us-add-from" method="post" enctype="multipart/form-data">
            <div class="kt-portlet__body">
                <div class=" row">
                    <div class="form-group col-lg-12">
                        <label>About Us Title:<span class="text-danger">*</span></label>
                        <input type="text" name="aboutus_title" placeholder="Enter title" value="{{ $aboutus->aboutus_title ?? null }}" class="form-control" >
                        @csrf
                        <input type="hidden" name="edit_id" value="{{ $aboutus->id ?? null }}">
                    </div>
                    <div class="form-group col-lg-12 mt-3">
                        <label>About Us Description :<span class="text-danger">*</span></label>
                        <textarea name="aboutus_description" id="aboutus_description"  class="form-control" placeholder="Enter Description" cols="15" rows="3">{{ $aboutus->aboutus_description ?? null }}</textarea>
                    </div>

                    <div class="form-group col-lg-6 mt-3">
                        <label>About Us Image :<span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <input type="file" name="aboutus_image" class="custom-file-input" id="aboutusImage">
                            <label class="custom-file-label" for="aboutusImage">Choose file</label>
                            @if ( $aboutus && $aboutus->aboutus_image)
                                <!-- <a href='{{ asset("storage/$aboutus->aboutus_image") }}' download="true"> {{ $aboutus->aboutus_image }}</a> -->
                                <img src="{{ asset("storage/$aboutus->aboutus_image") }}" class="h-auto img-thumbnail"  style="width: 100px !important; margin: 10px 0px 50px 0px;" alt="">
                            @endif
                        </div>
                    </div>
                </div>
                <div class=" row">
                    <div class="form-group col-lg-12 mt-3">
                        <label>Programs: <span class="text-danger">*</span></label>
                        <input type="text" name="programs_title" placeholder="Enter Title" value="{{ $aboutus->programs_title ?? null }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-4 mt-3">
                        <label>Programs Description 1:<span class="text-danger">*</span></label>
                        <textarea name="programs_description1" id="programs_description1" class="form-control" placeholder="Enter Description 1" cols="15" rows="3">{{ $aboutus->programs_description1 ?? null }}</textarea>
                    </div>
                    <div class="form-group col-lg-4 mt-3">
                        <label>Programs Description 2:<span class="text-danger">*</span></label>
                        <textarea name="programs_description2" id="programs_description2" class="form-control" placeholder="Enter Description 2" cols="15" rows="3">{{ $aboutus->programs_description2 ?? null }}</textarea>
                    </div>
                    <div class="form-group col-lg-4 mt-3">
                        <label>Programs Description 3:<span class="text-danger">*</span></label>
                        <textarea name="programs_description3" id="programs_description3" class="form-control" placeholder="Enter Description 3" cols="15" rows="3">{{ $aboutus->programs_description3 ?? null }}</textarea>
                    </div>
                </div>
                <div class=" row">
                    <div class="form-group col-lg-12 mt-3">
                        <label>Our Mission Title:<span class="text-danger">*</span></label>
                        <input type="text" name="ourmission_title" placeholder="Enter Title" value="{{ $aboutus->ourmission_title ?? null }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-12 mt-3">
                        <label>Our Mission Description:<span class="text-danger">*</span></label>
                        <textarea name="ourmission_description" id="ourmission_description" class="form-control" placeholder="Enter Description" cols="15" rows="3">{{ $aboutus->ourmission_description ?? null }}</textarea>
                    </div>
                </div>
                <div class=" row">
                    <div class="form-group col-lg-12 mt-3">
                        <label>History:<span class="text-danger">*</span></label>
                        <input type="text" name="history_title" placeholder="Enter Title" value="{{ $aboutus->history_title ?? null }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-4 mt-3">
                        <label>History Description 1:<span class="text-danger">*</span></label>
                        <textarea name="history_description1" id="history_description1" class="form-control" placeholder="Enter Description 1" cols="15" rows="3">{{ $aboutus->history_description1 ?? null }}</textarea>
                    </div>
                    <div class="form-group col-lg-4 mt-3">
                        <label>History Description 2:<span class="text-danger">*</span></label>
                        <textarea name="history_description2" id="history_description2" class="form-control" placeholder="Enter Description 2" cols="15" rows="3">{{ $aboutus->history_description2 ?? null }}</textarea>
                    </div>
                    <div class="form-group col-lg-4 mt-3">
                        <label>History Description 3:<span class="text-danger">*</span></label>
                        <textarea name="history_description3" id="history_description3" class="form-control" placeholder="Enter Description 3" cols="15" rows="3">{{ $aboutus->history_description3 ?? null }}</textarea>
                    </div>
                    <div class="form-group col-lg-6 mt-3">
                        <label>History Image :<span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <input type="file" name="history_image" class="custom-file-input" id="aboutusImage">
                            <label class="custom-file-label" for="aboutusImage">Choose file</label>
                            @if ( $aboutus->history_image)
                                <!-- <a href='{{ asset("storage/$aboutus->history_image") }}' download="true"> {{ $aboutus->history_image }}</a> -->
                                <img src="{{ asset("storage/$aboutus->history_image") }}" class="h-auto img-thumbnail"  style="width: 100px !important; margin: 10px 0px 50px 0px;" alt="">
                            @endif
                        </div>
                    </div>
                </div>
                <div class=" row">
                    <div class="form-group col-lg-6 mt-3">
                        <label>Title 1:<span class="text-danger">*</span></label>
                        <input type="text" name="whoweare_title" placeholder="Enter Title" value="{{ $aboutus->whoweare_title ?? null }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-6 mt-3">
                        <label>Title 2:<span class="text-danger">*</span></label>
                        <input type="text" name="whatarewe_title" placeholder="Enter Title" value="{{ $aboutus->whatarewe_title ?? null }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-6 mt-3">
                        <label>Description 1:</label>
                        <textarea name="whoweare_description" id="whoweare_description" class="form-control" placeholder="Enter Description" cols="15" rows="3">{{ $aboutus->whoweare_description ?? null }}</textarea>
                    </div>
                    <div class="form-group col-lg-6 mt-3">
                        <label>Description 2:</label>
                        <textarea name="whatarewe_description" id="whatarewe_description" class="form-control" placeholder="Enter Description" cols="15" rows="3">{{ $aboutus->whatarewe_description ?? null }}</textarea>
                    </div>
                </div>
                <div class=" row">
                    <div class="form-group col-lg-12 mt-3">
                        <label>Objectives:<span class="text-danger">*</span></label>
                        <input type="text" name="objectives_title" placeholder="Enter Title" value="{{ $aboutus->objectives_title ?? null }}" class="form-control" >
                    </div>
                    <div class="form-group col-lg-4 mt-3">
                        <label>Objectives Description 1:<span class="text-danger">*</span></label>
                        <textarea name="objectives_description1" id="objectives_description1" class="form-control" placeholder="Enter Description 1" cols="15" rows="3">{{ $aboutus->objectives_description1 ?? null }}</textarea>
                    </div>
                    <div class="form-group col-lg-4 mt-3">
                        <label>Objectives Description 2:<span class="text-danger">*</span></label>
                        <textarea name="objectives_description2" id="objectives_description2" class="form-control" placeholder="Enter Description 2" cols="15" rows="3">{{ $aboutus->objectives_description2 ?? null }}</textarea>
                    </div>
                    <div class="form-group col-lg-4 mt-3">
                        <label>Objectives Description 3:<span class="text-danger">*</span></label>
                        <textarea name="objectives_description3" id="objectives_description3" class="form-control" placeholder="Enter Description 3" cols="15" rows="3">{{ $aboutus->objectives_description3 ?? null }}</textarea>
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
            aboutus_title: {
                required: true,
            },
            aboutus_description: {
                required: true,
            },
            aboutus_image: {
                // required: {{ isset($home_slider->id) ? 'false' : 'true' }},
            },
            programs_title: {
                required: true,
            },
            programs_description1: {
                required: true,
            },
            programs_description2: {
                required: true,
            },
            programs_description3: {
                required: true,
            },
            ourmission_title: {
                required: true,
            },
            ourmission_description: {
                required: true,
            },
            history_title: {
                required: true,
            },
            history_description1: {
                required: true,
            },
            history_description2: {
                required: true,
            },
            history_description3: {
                required: true,
            },
            history_image: {
                // required: {{ isset($home_slider->id) ? 'false' : 'true' }},
            },
            whoweare_title: {
                required: true,
            },
            whoweare_description: {
                // required: true,
            },
            whatarewe_title: {
                required: true,
            },
            whatarewe_description: {
                // required: true,
            },
            objectives_title: {
                required: true,
            },
            objectives_description1: {
                required: true,
            },
            objectives_description2: {
                required: true,
            },
            objectives_description3: {
                required: true,
            },
        },
    };
    
    validationChk('#about-us-add-from',conf);

    ClassicEditor.create( document.querySelector( '#whoweare_description' ), {
        height : 150,
    })
    .catch( error => {
        console.log( error );
    } );
    
    ClassicEditor.create( document.querySelector( '#whatarewe_description' ), {
        height : 150,
    })
    .catch( error => {
        console.log( error );
    } );


</script>
@endpush

