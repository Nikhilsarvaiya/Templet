$(function(){
    $('#EstimateResult').hide();

    $('#field1').rangeslider({
        polyfill:false,
        onInit:function(){
        
            $('#input1').val($('input[type="range"]').val()).trigger('change');
        },
        onSlide:function(position, value){
            //console.log('onSlide');
            //console.log('position: ' + position, 'value: ' + value);
            $('.content #input1').val(value);
        },
        onSlideEnd:function(position, value){
            //console.log('onSlideEnd');
            //console.log('position: ' + position, 'value: ' + value);
        }
    });
    // Change the value of input field when slider changes
    $('#field1').on('input', function() {
        $('#input1').val(this.value);
        // console.log('$'+$('#input1').val());
    });

    // Change the value of slider field when input changes
    $('#input1').on('input', function() {
        if (this.value.length == 0) $('#field1').val(0).change();

        $('#field1').val(this.value).change();
    });
  
  
    $('#field2').rangeslider({
        polyfill:false,
        onInit:function(){
        
            $('#input2').val($('#field2').val()).trigger('change');
        },
        onSlide:function(position, value){
            $('.content #input2').val(value);
        },
        onSlideEnd:function(position, value){
        }
    });
    // Change the value of input field when slider changes
    $('#field2').on('input', function() {
        $('#input2').val(this.value);
        // console.log('$'+$('#input2').val());
    });
    // Change the value of slider field when input changes
    $('#input2').on('input', function() {
        if (this.value.length == 0) $('#field2').val(0).change();

        $('#field2').val(this.value).change();
    });
    

    $('#field3').rangeslider({
        polyfill:false,
        onInit:function(){
        
            $('#input3').val($('#field3').val()).trigger('change');
        },
        onSlide:function(position, value){
            $('.content #input3').val(value);
        },
        onSlideEnd:function(position, value){
        }
    });
    // Change the value of input field when slider changes
    $('#field3').on('input', function() {
        $('#input3').val(this.value);
        // console.log('$'+$('#input3').val());
    });
    // Change the value of slider field when input changes
    $('#input3').on('input', function() {
        if (this.value.length == 0) $('#field3').val(0).change();

        $('#field3').val(this.value).change();
    });


    $('#field4').rangeslider({
        polyfill:false,
        onInit:function(){
        
            $('#input4').val($('#field4').val());
        },
        onSlide:function(position, value){
            $('.content #input4').val(value);
        },
        onSlideEnd:function(position, value){
        }
    });
    // Change the value of input field when slider changes
    $('#field4').on('input', function() {
        $('#input4').val(this.value);
        // console.log('$'+$('#input4').val());
    });
    // Change the value of slider field when input changes
    $('#input4').on('input', function() {
        if (this.value.length == 0) $('#field4').val(0).change();

        $('#field4').val(this.value).change();
    });

});


function settlement(form){
  $("#EstimateResult").slideDown();
  $('html, body').animate({scrollTop:($('#EstimateResult').offset().top)},1500);
  damages=parseFloat($('#field1').val())+parseFloat($('#field2').val())+parseFloat($('#field3').val())+parseFloat($('#field4').val());
  special_damages=parseFloat($('#field1').val());
  low_settlement=(4*special_damages)+damages;
  high_settlement=(7*special_damages)+damages;
  totalDamages=special_damages+damages;
  
  $('#sum').text("$"+totalDamages.toLocaleString());
  $('#low').text("$"+low_settlement.toLocaleString());
  $('#high').text("$"+high_settlement.toLocaleString());
  
  
}