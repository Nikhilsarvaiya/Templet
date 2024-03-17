@extends('admin.layouts.default')
@section('title', 'Add Home Slider')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
           Home Slider </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('admin.home.slider.list') }}" class="kt-subheader__breadcrumbs-home" title="Back"><i class="fa fa-arrow-left"></i></a>
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
                    {{ isset($home_slider->id) ? 'Edit Home Slider' : 'Add Home Slider' }} 
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <!--begin::Form-->
        <form class="kt-form" action="{{ ($home_slider) ? route('admin.home.slider.update') : route('admin.home.slider.store') }}" id="home-slider-add-from" enctype="multipart/form-data" method="post" >
            @csrf
            <div class="kt-portlet__body">
                <div class="form-group row">
                    <div class="col-lg-8">
                        <label>Title: <span class="text-danger">*</span></label>
                        <input type="text" name="title" placeholder="Enter title" value="{{ $home_slider->title ?? null }}" class="form-control" >
                        
                        <input type="hidden" name="edit_id" value="{{ $home_slider->id ?? null }}">
                    </div>
                    <div class="col-lg-4">
                        <label>Sequence:</label>
                        <input type="number" min="0" name="sequence" placeholder="Enter Sequence" value="{{ $home_slider->sequence ?? null }}" class="form-control" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Image: <span class="text-danger">*</span> (Upload By 1372 X 649) (Type: jpeg,png,jpg)</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="homeSlider">
                            <label class="custom-file-label" for="homeSlider">Choose file</label>
                             @if ( $home_slider && $home_slider->image)
                                <img src="{{ $home_slider->image_full_path }}" class="h-auto img-thumbnail"  style="width: 100px !important; " alt="">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label>Url 1:</label>
                        <input type="url" name="url" placeholder="Enter URL" value="{{ $home_slider->url ?? null }}" class="form-control" >
                    </div>
                    <div class="col-lg-3">
                        <label>Url 2:</label>
                        <input type="url" name="url2" placeholder="Enter URL" value="{{ $home_slider->url2 ?? null }}" class="form-control" >
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
            title: {
                required: true,
            },
            image: {
                required: {{ isset($home_slider->id) ? 'false' : 'true' }},
            },
        },
    };
    
    validationChk('#home-slider-add-from',conf);

    // sidebar edit active start
    $(function(){
            var current = window.location.href;
            var mode = "{{ isset($home_slider->id) ? '1' : '0' }}";
            console.log(current+mode);
            if(current && mode=='1'){
                $(".homeslider-edit-smenu").addClass('kt-menu__item kt-menu__item--active kt-menu__item--open');
            }
        })
    // sidebar edit active end

</script>
@endpush

