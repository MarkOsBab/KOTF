
(function ($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
  
  
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    
})(jQuery);

$(document).ready(function() {

  var active1 = false;
  var active2 = false;
  var active3 = false;
  var active4 = false;
  var active5 = false;
  var active6 = false;
  var active7 = false;
  var active8 = false;
  var active9 = false;

    $('.parent2').on('mousedown touchstart', function() {
    
    if (!active1) $(this).find('.test1').css({'background-color': '#2367C3', 'transform': 'translate(0px,125px)'});
    else $(this).find('.test1').css({'background-color': 'dimGray', 'transform': 'none'}); 
     if (!active2) $(this).find('.test2').css({'background-color': '#2367C3', 'transform': 'translate(60px,105px)'});
    else $(this).find('.test2').css({'background-color': 'darkGray', 'transform': 'none'});
      if (!active3) $(this).find('.test3').css({'background-color': '#2367C3', 'transform': 'translate(105px,60px)'});
    else $(this).find('.test3').css({'background-color': 'silver', 'transform': 'none'});
      if (!active4) $(this).find('.test4').css({'background-color': '#2367C3', 'transform': 'translate(125px,0px)'});
    else $(this).find('.test4').css({'background-color': 'silver', 'transform': 'none'});
    if (!active5) $(this).find('.test5').css({'background-color': '#2367C3', 'transform': 'translate(200px,25px)'});
    else $(this).find('.test5').css({'background-color': 'silver', 'transform': 'none'});
    if (!active6) $(this).find('.test6').css({'background-color': '#2367C3', 'transform': 'translate(170px,95px)'});
    else $(this).find('.test6').css({'background-color': 'silver', 'transform': 'none'});
    if (!active7) $(this).find('.test7').css({'background-color': '#2367C3', 'transform': 'translate(120px,150px)'});
    else $(this).find('.test7').css({'background-color': 'silver', 'transform': 'none'});
    if (!active8) $(this).find('.test8').css({'background-color': '#2367C3', 'transform': 'translate(50px,190px)'});
    else $(this).find('.test8').css({'background-color': 'dimGray', 'transform': 'none'}); 
    if (!active9) $(this).find('.test9').css({'background-color': '#2367C3', 'transform': 'translate(255px,70px)'});
    else $(this).find('.test9').css({'background-color': 'dimGray', 'transform': 'none'}); 
    active1 = !active1;
    active2 = !active2;
    active3 = !active3;
    active4 = !active4;
    active5 = !active5;
    active6 = !active6;
    active7 = !active7;
    active8 = !active8;
    active9 = !active9;
      
    });
});

