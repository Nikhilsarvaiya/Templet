@extends('admin.layouts.default')
@section('title', 'Add Footer Setting')
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            Add Footer Setting </h3>
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
                    <i class="kt-font-brand flaticon-user-settings"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Add Footer Setting
                </h3>
            </div>
        </div>
        <!--begin::Portlet-->
        <!--begin::Form-->
        <form class="kt-form" action="{{ Route('admin.footer.setting.store') }}" enctype="multipart/form-data" id="footer-setting-add-from" method="post" >
            <div class="kt-portlet__body">
                <div class="form-group row">
                    @csrf
                    <input type="hidden" name="id" value="{{ isset($footer_setting->id) ? $footer_setting->id : null }}">
                    <div class="col-lg-12 mt-3">
                        <label>Attention Investors <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="attention_investors"  placeholder="Attention Investors" 
                        value="{{ isset($footer_setting->attention_investors) ? $footer_setting->attention_investors : old('attention_investors') }}">
                    </div>
                    <div class="col-lg-12 mt-3">
                        <label>Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title"  placeholder="Title" 
                        value="{{ isset($footer_setting->title) ? $footer_setting->title : old('title') }}">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label>Corporate Address <span class="text-danger">*</span></label>
                        <!-- <input type="text" class="form-control" name="corporate_address"  placeholder="Corporate Office Address" 
                        value="{{ isset($footer_setting->corporate_address) ? $footer_setting->corporate_address : old('corporate_address') }}"> -->
                        <textarea name="corporate_address" id="corporate_address" class="form-control" 
                        rows="5">{{ isset($footer_setting->corporate_address) ? $footer_setting->corporate_address : old('corporate_address') }}
                        </textarea>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Registered Address <span class="text-danger">*</span></label>
                        <!-- <input type="text" class="form-control" name="registered_address"  placeholder="Registered Office Address" 
                        value="{{ isset($footer_setting->registered_address) ? $footer_setting->registered_address : old('registered_address') }}"> -->
                        <textarea name="registered_address" id="registered_address" class="form-control" 
                        rows="5">{{ isset($footer_setting->registered_address) ? $footer_setting->registered_address : old('registered_address') }}
                        </textarea>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Phone <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" name="phone"  placeholder="Phone" 
                        value="{{ isset($footer_setting->phone) ? $footer_setting->phone : old('phone') }}">
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email"  placeholder="Email" 
                        value="{{ isset($footer_setting->email) ? $footer_setting->email : old('email') }}">
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Google play Link </label>
                        <input type="url" class="form-control" name="google_play_link"  placeholder="Google play Link" 
                        value="{{ isset($footer_setting->google_play_link) ? $footer_setting->google_play_link : old('google_play_link') }}">
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>App Store Link </label>
                        <input type="url" class="form-control" name="app_store_link"  placeholder="App Store Link" 
                        value="{{ isset($footer_setting->app_store_link) ? $footer_setting->app_store_link : old('app_store_link') }}">
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Facebook Link </label>
                        <input type="url" class="form-control" name="facebook_link"  placeholder="Facebook Link" 
                        value="{{ isset($footer_setting->facebook_link) ? $footer_setting->facebook_link : old('facebook_link') }}">
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Linkedin Link</label>
                        <input type="url" class="form-control" name="linkedin_link"  placeholder="Linkedin Link" 
                        value="{{ isset($footer_setting->linkedin_link) ? $footer_setting->linkedin_link : old('linkedin_link') }}">
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Twitter Link</label>
                        <input type="url" class="form-control" name="twitter_link"  placeholder="Twitter Link" 
                        value="{{ isset($footer_setting->twitter_link) ? $footer_setting->twitter_link : old('twitter_link') }}">
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Instagram Link</label>
                        <input type="url" class="form-control" name="instagram_link"  placeholder="Instagram Link" 
                        value="{{ isset($footer_setting->instagram_link) ? $footer_setting->instagram_link : old('instagram_link') }}">
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Whatsapp Link</label>
                        <input type="url" class="form-control" name="whatsapp_link"  placeholder="Whatsapp Link" 
                        value="{{ isset($footer_setting->whatsapp_link) ? $footer_setting->whatsapp_link : old('whatsapp_link') }}">
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Telegram Link</label>
                        <input type="url" class="form-control" name="telegram_link"  placeholder="Telegram Link" 
                        value="{{ isset($footer_setting->telegram_link) ? $footer_setting->telegram_link : old('telegram_link') }}">
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Quora Link</label>
                        <input type="url" class="form-control" name="quora_link"  placeholder="Quora Link" 
                        value="{{ isset($footer_setting->quora_link) ? $footer_setting->quora_link : old('quora_link') }}">
                    </div>

                    <div class="col-lg-4 mt-3">
                        <label>Footer Logo:</label>
                        <div class="custom-file">
                            <input type="file" name="footer_logo" class="custom-file-input" id="footer_logo">
                            <label class="custom-file-label" for="FooteImage">Choose file</label>
                            
                        </div>
                    </div>
                    <div class="col-lg-2 mt-3">
                        @if ( $footer_setting && $footer_setting->footer_logo)
                            <img src="{{ $footer_setting->image_full_path }}" class="h-auto img-thumbnail"  style="width: 100px !important; background-color:black " alt="">
                        @endif
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Content 1: <span class="text-danger">*</span></label>
                        <textarea name="content_1" id="content_1" class="form-control" 
                        rows="5">{{ isset($footer_setting->content_1) ? $footer_setting->content_1 : old('content_1') }}
                        </textarea>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label>Content 2: <span class="text-danger">*</span></label>
                        <textarea name="content_2" id="content_2" class="form-control" 
                        rows="5">{{ isset($footer_setting->content_2) ? $footer_setting->content_2 : old('content_2') }}
                        </textarea>
                    </div>

                    <div class="col-lg-3 mt-3">
                        <label>Footer Link Title 1</label>
                        <input type="text" class="form-control" name="footer_link_title_1"  placeholder="Footer Link Title 1" value="{{ isset($footer_setting->footer_link_title_1) ? $footer_setting->footer_link_title_1 : old('footer_link_title_1') }}">
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label>Footer Link 1</label>
                        <input type="url" class="form-control" name="footer_link_1"  placeholder="Footer Link 1" 
                        value="{{ isset($footer_setting->footer_link_1) ? $footer_setting->footer_link_1 : old('footer_link_1') }}">
                    </div>

                    <div class="col-lg-3 mt-3">
                        <label>Footer Link Title 2</label>
                        <input type="text" class="form-control" name="footer_link_title_2"  placeholder="Footer Link Title 2" value="{{ isset($footer_setting->footer_link_title_2) ? $footer_setting->footer_link_title_2 : old('footer_link_title_2') }}">
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label>Footer Link 2</label>
                        <input type="url" class="form-control" name="footer_link_2"  placeholder="Footer Link 2" 
                        value="{{ isset($footer_setting->footer_link_2) ? $footer_setting->footer_link_2 : old('footer_link_2') }}">
                    </div>

                    <div class="col-lg-3 mt-3">
                        <label>Footer Link Title 3</label>
                        <input type="text" class="form-control" name="footer_link_title_3"  placeholder="Footer Link Title 3" value="{{ isset($footer_setting->footer_link_title_3) ? $footer_setting->footer_link_title_3 : old('footer_link_title_3') }}">
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label>Footer Link 3</label>
                        <input type="url" class="form-control" name="footer_link_3"  placeholder="Footer Link 3" 
                        value="{{ isset($footer_setting->footer_link_3) ? $footer_setting->footer_link_3 : old('footer_link_3') }}">
                    </div>

                    <div class="col-lg-3 mt-3">
                        <label>Footer Link Title 4</label>
                        <input type="text" class="form-control" name="footer_link_title_4"  placeholder="Footer Link Title 4" value="{{ isset($footer_setting->footer_link_title_4) ? $footer_setting->footer_link_title_4 : old('footer_link_title_4') }}">
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label>Footer Link 4</label>
                        <input type="url" class="form-control" name="footer_link_4"  placeholder="Footer Link 4" 
                        value="{{ isset($footer_setting->footer_link_4) ? $footer_setting->footer_link_4 : old('footer_link_4') }}">
                    </div>

                    <div class="col-lg-3 mt-3">
                        <label>Footer Link Title 5</label>
                        <input type="text" class="form-control" name="footer_link_title_5"  placeholder="Footer Link Title 5" value="{{ isset($footer_setting->footer_link_title_5) ? $footer_setting->footer_link_title_5 : old('footer_link_title_5') }}">
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label>Footer Link 5</label>
                        <input type="url" class="form-control" name="footer_link_5"  placeholder="Footer Link 5" 
                        value="{{ isset($footer_setting->footer_link_5) ? $footer_setting->footer_link_5 : old('footer_link_5') }}">
                    </div>

                    <div class="col-lg-3 mt-3">
                        <label>Footer Link Title 6</label>
                        <input type="text" class="form-control" name="footer_link_title_6"  placeholder="Footer Link Title 6" value="{{ isset($footer_setting->footer_link_title_6) ? $footer_setting->footer_link_title_6 : old('footer_link_title_6') }}">
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label>Footer Link 6</label>
                        <input type="url" class="form-control" name="footer_link_6"  placeholder="Footer Link 6" 
                        value="{{ isset($footer_setting->footer_link_6) ? $footer_setting->footer_link_6 : old('footer_link_6') }}">
                    </div>

                    <div class="col-lg-3 mt-3">
                        <label>Footer Link Title 7</label>
                        <input type="text" class="form-control" name="footer_link_title_7"  placeholder="Footer Link Title 7" value="{{ isset($footer_setting->footer_link_title_7) ? $footer_setting->footer_link_title_7 : old('footer_link_title_7') }}">
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label>Footer Link 7</label>
                        <input type="url" class="form-control" name="footer_link_7"  placeholder="Footer Link 7" 
                        value="{{ isset($footer_setting->footer_link_7) ? $footer_setting->footer_link_7 : old('footer_link_7') }}">
                    </div>

                    <div class="col-lg-3 mt-3">
                        <label>Footer Link Title 8</label>
                        <input type="text" class="form-control" name="footer_link_title_8"  placeholder="Footer Link Title 8" value="{{ isset($footer_setting->footer_link_title_8) ? $footer_setting->footer_link_title_8 : old('footer_link_title_8') }}">
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label>Footer Link 8</label>
                        <input type="url" class="form-control" name="footer_link_8"  placeholder="Footer Link 8" 
                        value="{{ isset($footer_setting->footer_link_8) ? $footer_setting->footer_link_8 : old('footer_link_8') }}">
                    </div>

                    <div class="col-lg-3 mt-3">
                        <label>Footer Link Title 9</label>
                        <input type="text" class="form-control" name="footer_link_title_9"  placeholder="Footer Link Title 9" value="{{ isset($footer_setting->footer_link_title_9) ? $footer_setting->footer_link_title_9 : old('footer_link_title_9') }}">
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label>Footer Link 9</label>
                        <input type="url" class="form-control" name="footer_link_9"  placeholder="Footer Link 9" 
                        value="{{ isset($footer_setting->footer_link_9) ? $footer_setting->footer_link_9 : old('footer_link_9') }}">
                    </div>

                    <div class="col-lg-3 mt-3">
                        <label>Footer Link Title 10</label>
                        <input type="text" class="form-control" name="footer_link_title_10"  placeholder="Footer Link Title 10" value="{{ isset($footer_setting->footer_link_title_10) ? $footer_setting->footer_link_title_10 : old('footer_link_title_10') }}">
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label>Footer Link 10</label>
                        <input type="url" class="form-control" name="footer_link_10"  placeholder="Footer Link 10" 
                        value="{{ isset($footer_setting->footer_link_10) ? $footer_setting->footer_link_10 : old('footer_link_10') }}">
                    </div>

                    <div class="col-lg-3 mt-3">
                        <label>Footer Link Title 11</label>
                        <input type="text" class="form-control" name="footer_link_title_11"  placeholder="Footer Link Title 11" value="{{ isset($footer_setting->footer_link_title_11) ? $footer_setting->footer_link_title_11 : old('footer_link_title_11') }}">
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label>Footer Link 11</label>
                        <input type="url" class="form-control" name="footer_link_11"  placeholder="Footer Link 11" 
                        value="{{ isset($footer_setting->footer_link_11) ? $footer_setting->footer_link_11 : old('footer_link_11') }}">
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
    ClassicEditor.create( document.querySelector('#content_1'),{
            height : 150,
            removePlugins: [ 'image' ],
            removeButtons: [ 'image' ],
            removetoolbar: [ 'image' ],
            // toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'link' ]
        })
        .catch( error => {
            console.log( error );
        } );
    ClassicEditor.create( document.querySelector('#content_2'),{
            height : 150,
            removePlugins: [ 'image' ],
            removeButtons: [ 'image' ],
            removetoolbar: [ 'image' ],
            // toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'link' ]
        })
        .catch( error => {
            console.log( error );
        } );

    ClassicEditor.create( document.querySelector('#corporate_address'),{
            height : 150,
            removePlugins: [ 'image' ],
            removeButtons: [ 'image' ],
            removetoolbar: [ 'image' ],
            // toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'link' ]
        })
        .catch( error => {
            console.log( error );
        } );

    ClassicEditor.create( document.querySelector('#registered_address'),{
            height : 150,
            removePlugins: [ 'image' ],
            removeButtons: [ 'image' ],
            removetoolbar: [ 'image' ],
            // toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'link' ]
        })
        .catch( error => {
            console.log( error );
        } );

       
    let conf = {
        rules: {
            corporate_address: {
                required: true,
            },
            registered_address: {
                required: true,
            },
            phone: {
                required: true,
                number: true,
                maxlength: 13,
            },
            email: {
                required: true,
                email: true,
            },
            content_1: {
                required: true,
            },
            footer_logo:{
                required:{{ isset($footer_setting->id) ? 'false' : 'true' }}
            }
        },
    };
    
    validationChk('#footer-setting-add-from',conf);

</script>
@endpush

