    <script src="{{ asset('assets/user/js/jquery.min.js') }}?v={{ config('services.scripts.version') }}"></script>
    <script src="{{ asset('assets/user/js/jquery-ui.js') }}?v={{ config('services.scripts.version') }}"></script>

    <!-- fancybox -->
    <script src="{{ asset('assets/user/js/fancybox.min.js') }}?v={{ config('services.scripts.version') }}"></script>
    <script src="{{ asset('assets/user/js/fancybox_script.js') }}?v={{ config('services.scripts.version') }}"></script>
    <!-- fancybox_end -->

    <script src="{{ asset('assets/user/js/owl.carousel.js') }}?v={{ config('services.scripts.version') }}"></script>
    <script src="{{ asset('assets/user/js/bootstrap.js') }}?v={{ config('services.scripts.version') }}"></script>
    <script src="{{ asset('assets/user/js/bootstrap-select.js') }}?v={{ config('services.scripts.version') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script src="{{ asset('assets/user/js/select2.min.js') }}?v={{ config('services.scripts.version') }}"></script>

    
    
    <script src="{{ asset('assets/user/js/menu.js') }}?v={{ config('services.scripts.version') }}"></script>
    <script src="{{ asset('assets/user/js/wow.min.js') }}?v={{ config('services.scripts.version') }}"></script>
    <script src="{{ asset('assets/user/js/scripts_ctm.js') }}?v={{ config('services.scripts.version') }}"></script>
    <script
        src="{{ asset('assets/user/js/jquery-validation/dist/jquery.validate.js') }}?v={{ config('services.scripts.version') }}"
        type="text/javascript"></script>
    <script
        src="{{ asset('assets/user/js/sweetalert2/package/dist/sweetalert2.min.js') }}?v={{ config('services.scripts.version') }}"
        type="text/javascript"></script>
    
    <script src="{{ asset('assets/user/js/custom.js') }}?v={{ config('services.scripts.version') }}"></script>

    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js'></script> -->

    <script src="{{ asset('assets/user/js/intlTelInput.js') }}?v={{ config('services.scripts.version') }}"></script>

    <!-- <script src="{{ asset('plugins/form-validator/jquery.form-validator.min.js') }}?v={{ config('services.scripts.version') }}" type="text/javascript"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        // $.validate({
        //     modules: 'security,file',
        //     scrollToTopOnError: false,
        //     validateHiddenInputs: true,
        //     onSuccess: function($form) {
        //         $('.submit').prop('disabled', true);
        //     }
        // });
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}'
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: '{{ session('error') }}'
                });
            @endif


            $("#park-login-form").validate({
                ignore: [],
                rules: {
                    email: {
                        required: true,
                        email:true,
                        regex: true
                    },
                    password: {
                        required: true,
                    },
                },
                messages: {
                    // name: {
                    //     required: "Please enter name",
                    // },
                },
            });
            
            $("#park-add-form").validate({
                ignore: [],
                rules: {
                    vehicle_name: {
                        required: true,
                    },
                    vehicle_no: {
                        required: true,
                    },
                    mobile_no: {
                        required: true,
                    },
                },
                messages: {
                    // name: {
                    //     required: "Please enter name",
                    // },
                },
            });

            $("#park-search-form").validate({
                ignore: [],
                rules: {
                    vehicle_no: {
                        required: true,
                    },
                },
                messages: {
                    // name: {
                    //     required: "Please enter name",
                    // },
                },
            });

            $("#park-update-form").validate({
                ignore: [],
                rules: {
                    vehicle_name: {
                        required: true,
                    },
                    vehicle_no: {
                        required: true,
                    },
                    mobile_no: {
                        required: true,
                    },
                },
                messages: {
                    // name: {
                    //     required: "Please enter name",
                    // },
                },
            });
            

            $.validator.addMethod("regex", function(value, element) {
                var regex = /^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i
                return regex.test(value);
            }, "It dose not seem valid email");

        });

        $(document).on('click', '.toggle-password', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $(".form_control_pw");
            input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
        });


        // Set all char lower to uppercase
        $('.uppercase').keyup(function() {
            this.value = this.value.toLocaleUpperCase();
        });

    </script>


    <script>
        $(document).ready(() => {

            const backToTop = $('#backToTop')
            const amountScrolled = 300

            $(window).scroll(() => {
                $(window).scrollTop() >= amountScrolled ?
                    backToTop.fadeIn('fast') :
                    backToTop.fadeOut('fast')
            })

            backToTop.click(() => {
                $('body, html').animate({
                    scrollTop: 0
                }, 600)
                return false
            })
        })
    </script>

    <script>
        var $ = jQuery.noConflict();
        $(document).ready(function () {
            $(".nav-toggle-sm").on("click", function () {
                if ($("html").hasClass("body-menu-opened")) {
                $("html")
                    .removeClass("body-menu-opened")
                    .addClass("body-menu-close");
                } else {
                $("html")
                    .addClass("body-menu-opened")
                    .removeClass("body-menu-close");
                }
            });
        });
    </script>
    <script>
        $("#carouselExampleControls").carousel({
            interval: 1700,
            cycle: true,
            pause: false,
        });
    </script>
    <script>
        $(document).on("click", ".navbar-toggler", function () {
            $("#navbarNavDropdown").slideToggle();
        });
    </script>

    <script type="text/javascript">
        // -----Country Code Selection
        // $("#mobile_code").intlTelInput({
        // initialCountry: "gb",
        // separateDialCode: true,
        // // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
        // });
    </script>

    <script type="text/javascript">
        // -----Country Code Selection
        // $("#mobile_code").intlTelInput({
        // initialCountry: "gb",
        // separateDialCode: true,
        // hiddenInput:"code",
        // // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
        // });

        window.makeIntlInput = ($el) => {
            let input = document.querySelector($el);
            let hiddenInputEl = $($(input).data('hidden-input'));
            let countrySortNameEl = $($(input).data('hidden-sort-name'));

            let geoIpLookupCountryCode = '';
            let telInput = window.intlTelInput(input, {
                separateDialCode:true,
                initialCountry: "gb",
                hiddenInput:"code",
                // initialCountry: "auto",
                geoIpLookup: async function (callback) {
                    if(countrySortNameEl.val().length === 0){
                        await $.get('https://ipinfo.io', function () {}, "jsonp").always(function (resp) {
                            geoIpLookupCountryCode = (resp && resp.country) ? resp.country : "gb";
                        });
                    } else {
                        geoIpLookupCountryCode = countrySortNameEl.val();
                    }
                    callback(geoIpLookupCountryCode);
                },
                preferredCountries: ["gb","us"],
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js",
            });

            setTimeout(()=>{
                let d1 = telInput.getSelectedCountryData();
                if(!(d1 && d1.hasOwnProperty('iso2'))){
                    telInput.setCountry(geoIpLookupCountryCode);
                }
            },500);

            input.addEventListener("countrychange", function() {
                let data = telInput.getSelectedCountryData();
                if(hiddenInputEl.length > 0){
                    hiddenInputEl.val('+' + data.dialCode).change();
                }
                if(countrySortNameEl.length > 0){
                    countrySortNameEl.val(data.iso2).change();
                }
            });

            return telInput;
        }

        $(function() {
            $(document).on('keydown keyup','.only-mobile', function(e) {
                if (
                    (e.keyCode >= 48 && e.keyCode <= 57 && e.originalEvent.shiftKey === false) ||
                    (e.keyCode >= 96 && e.keyCode <= 105) ||
                    (e.keyCode === 65 && e.originalEvent.ctrlKey === true) ||
                    (e.keyCode === 82 && e.originalEvent.ctrlKey === true && e.originalEvent.shiftKey === true) ||
                    e.keyCode === 45 ||
                    e.keyCode === 46 ||
                    e.keyCode === 8 ||
                    e.keyCode === 37 ||
                    e.keyCode === 39 ||
                    e.keyCode === 9 ||
                    e.keyCode === 116 ||
                    e.keyCode === 32
                ) {
                    return true;
                }  else {
                    return false;
                }
            });
        });
    </script>
