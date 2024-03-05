//include all scripts
$.getScript('/js/all_js/rows.js');
$.getScript('/js/all_js/inputs_progress_bar.js');


//console log
function dd(item){
    console.log(item);
}


//alert
function alert_(msg){
    var id = Math.floor(Math.random() * 100000000);
    var alert_html = '<div id="' +id+ '" class="alert alert-danger calert-error" role="alert"> <a type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></a> <span class="error-msg"> '+msg+' </span> </div>'
    $('.div-alert-error').append(alert_html);
    $(".div-alert-error").show();
    window.setTimeout(function() {
        $('#'+id).fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 5000);
}


//current date & arabic date
var current_url = window.location.href;
if( current_url.indexOf("edit") <= 0 ){
    //today date
    var date = new Date();
    var dd = ("0" + (date.getDate())).slice(-2);
    var mm = ("0" + (date.getMonth() + 　1)).slice(-2);
    var yyyy = date.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    $("input[type='date']").attr("value", today);
    //today date arabic
    var months = ["يناير", "فبراير", "مارس", "إبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"];
    var days =["اﻷحد","اﻷثنين","الثلاثاء","اﻷربعاء","الخميس","الجمعة","السبت"];
    $("input[name='day-ar']").attr("value", days[date.getDay()]);
    $("input[name='day-nbr-ar']").attr("value", ("0" + (date.getDate())).slice(-2));
    $("input[name='day-month-ar']").attr("value", months[date.getMonth()]);
    $("input[name='day-year-ar']").attr("value", date.getFullYear());

}


//on change remove added rows
function remove_waldis(){
    $('.row[hadi=hadi]').remove();
    var myrows = document.querySelectorAll('.financeoption2 > .row');
    if (myrows.length == 2) {
        $('.financeoption2 .zayd').show();
    }
    var myrows = document.querySelectorAll('.financeoption3 > .row');
    if (myrows.length == 2) {
        $('.financeoption3 .zayd').show();
    }
}


//calcule price
function calcule( value1,value2,total_in ){
    var light_price = $('input[name="'+value1+'"]').val();
    var light_nbr = $('input[name="'+value2+'"]').val();
    var total = light_price * light_nbr;
    $('input[name="'+total_in+'"]').val(total/*.toFixed(3)*/);
}


//calcule price
function calcule_id( thiss,value1,value2,total_in ){
    var id = $(thiss).attr('row_id');
    var value1 = $('input[name="'+value1+'"][row_id="'+id+'"]').val();
    var value2 = $('input[name="'+value2+'"][row_id="'+id+'"]').val();
    var total = value1 * value2;
    $('input[name="'+total_in+'"][row_id="'+id+'"]').val(total/*.toFixed(3)*/);
}


//calcule price
function calcule_three_id( thiss,value1,value2,value3,total_in ){
    var id = $(thiss).attr('row_id');
    var value1 = $('input[name="'+value1+'"][row_id="'+id+'"]').val();
    var value2 = $('input[name="'+value2+'"][row_id="'+id+'"]').val();
    var value3 = $('input[name="'+value3+'"][row_id="'+id+'"]').val();
    var total = value1 * value2 * value3;
    $('input[name="'+total_in+'"][row_id="'+id+'"]').val(total/*.toFixed(3)*/);
}


//detect empty input
function isEveryInputEmpty(class_) {
    var allEmpty = true;

    $(class_).each(function() {
        if ($(this).val() === '' && $(this).is(':visible')) {
            if( $(this).attr('type') !== 'checkbox' ){
                allEmpty = false;
                return false;
            }
        }
    });

    return allEmpty;
}


//show next hidden div
function show_div(div_class){
    var class_2 = '.div_'+(div_class+1);
    if( isEveryInputEmpty('.div_'+div_class+' input , .div_'+div_class+' textarea') ){
        $(class_2).show();
        $(class_2+' [type="checkbox"]').prop('checked', true);
    }else{
        $(class_2).hide();
    }
}


//Add qubbah color style
if( window.location.href.includes('/qubbah/') === true ){
    $('head').append('<style> .bg-warning { background-color: #d04055 !important; } button.btn.btn-primary { background: #d04055 !important; color: white !important; } </style>');
}


//check if input is arabic
function isArabic( val_,class_,thiss_ )
{
    var arregex = /[\u0600-\u06FF]/;
    if( val_ !== '' && class_ !== 'form-control en-ar' ){
        if( class_.includes('nexa-light') === true ){
            if ( arregex.test(val_) === true && $(thiss_).attr('type') === 'text' ){
              alert_('يجب كتابة النص بالإنجليزية');
              $(thiss_).val('');
            }
          }else{
            if ( arregex.test(val_) === false && $(thiss_).attr('type') === 'text' ){
              alert_('يجب كتابة النص بالعربية');
              $(thiss_).val('');
            }
        }
    }else if( class_ == 'form-control en-ar' ){
        if ( arregex.test(val_) === true ){
            $(thiss_).css('font-family','SWISSRA-LIGHT');
        }else{
            $(thiss_).css('font-family','nexa-light');
        }
    }
}


//stop form submit on enter button
jQuery(function($) {
    $('form').on('keydown', function(ev) {
      if (ev.key === "Enter" && !$(ev.target).is('textarea')) {
        ev.preventDefault();
      }
    });  
});


//
$(document).on('keyup change', "select", function() {
    load_new();
    
    var select_name = '[name="'+$(this).attr("name")+'"]';
    $(select_name+' option').removeAttr("selected");
    $(select_name+' option:selected').attr("selected", "selected");     
});


//
function load_new(){
    const ids = [];
    $("select option").each(function(){
        var val = $(this).val();
        ids.push(val);
    });

    $(ids).each(function(index){
        var rows = "."+ids[index] +" .row";
        var selected = $('select').val();        
        $("."+ids[index] + " .zayd").css("display","block");
        //$("div#button button").addClass("disabled");

        unselected = jQuery.grep(ids, function(value) {
            return value != selected;
        });

        $(unselected).each(function(index){
            $("."+this + " input, " + "."+this + " textarea").val("");
        });
    
        $(rows).each(function(index){
            //console.log( index+'/'+$(this).prev().attr('class') );
            if( index !== 0 && index !== 1 && "."+ids[index] != selected ){

                //console.log( $(this).prev().attr('class') + " // " +  $("."+ids[index] +" .col-md-10 .row").prev().attr('class') );

                if( $(this) !==  $("."+ids[index] +" .col-md-10 .row") ){
                    if( $(this).parent().attr('class') !== 'col-md-10' ){
                        $(this).remove();
                    }                    
                }                
            }
        });
    });    
}


//add value to checkbox for edit form
$(document).on('click change', "[type='checkbox']", function() {
    var clss = $(this).attr('name');

    //$("."+clss+" input, textarea").each(function(){
    //    $(this).prop('required',false);
    //});

    if( clss == 'selected-service[]' ){
        if( $(this).is(":checked") ){
            $(this).attr('data-value','on');
        }else{
            $(this).attr('data-value','off');
        }
    }    

    $(".form-check.form-switch .form-check-input").each(function() {
        if( $(this).attr('class') == "form-check-input" ){
            if( $(this).is(":checked") ){
                $(this).val("on");
            }else{
                $(this).val("off");
            }
        }
    });

});


//inputs progress bar
$(document).on('keyup change', "input, textarea", function() {

    var inputs = get_page_inputs();

    var nonempty = $('form.row.g-3 input:visible, form.row.g-3 textarea:visible').filter(function () { return !!this.value; }).length;

    var per = (nonempty * 100) / inputs;

    $('.progress-bar.bg-warning').css( 'width',per+'%' );
    $('.progress-bar.bg-warning').attr( 'percentage',per );

    $("input, textarea").each(function() {
        $(this).attr("value", $(this).val());
    });

});