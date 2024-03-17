var $ = jQuery.noConflict();
	$(document).ready(function () {

	    $('.nav-toggle-sm').on('click', function(){
	        if ($('html').hasClass('body-menu-opened')) {
	            $('html').removeClass('body-menu-opened').addClass('body-menu-close');
	        } else {
	            $('html').addClass('body-menu-opened').removeClass('body-menu-close');
	        }
	    });

});