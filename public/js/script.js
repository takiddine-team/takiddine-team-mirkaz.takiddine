
$(document).on('click', ".projectservices .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"projectservices");
});

//the financial value
$(document).on('click', ".financialdues .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"financialdues");
});

//How to pay, transfer and receive business
$(document).on('click', ".howtopay .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"howtopay");
});

/************ contract_partner_nda ************/
function getSelectedValue() {
    var form = $('#first-side').val();
    $(".req-input input").val('');
    //$(".req-input input").prop('required', false);

    if (form == "default") {
        $('#default').show();
        $('#company,#eskelah-company,#general-authority').hide();
        //$("#default input").prop('required', true);
    }
    else if (form == "company") {
        $('#company').show();
        $('#default,#eskelah-company,#general-authority').hide();
        //$("#company input").prop('required', true);
    }
    else if (form == "eskelah-company") {
        $('#eskelah-company').show();
        $('#default,#company,#general-authority').hide();
        document.getElementById('eskelah-company').style.display = "block";
        //$("#eskelah-company input").prop('required', true);
    }
    else if (form == "general-authority") {
        $('#general-authority').show();
        $('#default,#company,#eskelah-company').hide();
        document.getElementById('general-authority').style.display = "block";
        //$("#general-authority input").prop('required', true);
    }
}

function getFinancialSelect(){
    var form = $('#first-side').val();
    if( form == "firstsideoption1" ){
        $('.all-invoice').show();
        $('.all-invoice-2 input, .all-invoice-2 textarea').val('');
        $('.all-invoice-2').hide();
    }
    if( form == "firstsideoption2" ){
        $('.all-invoice-2').show();
        $('.all-invoice input, .all-invoice textarea').val('');
        $('.all-invoice').hide();
    }
}

$(document).on('change', "#show_cin", function() {
    if(document.getElementById('show_cin').checked === true){
        $('.show_cin').show();
    }
    if(document.getElementById('show_cin').checked === false){
        $('.show_cin').hide();
    }
});

/************ contract_partner_project ************/

$(document).on('click', ".first_t .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"first_t");
});

$(document).on('click', ".second_t .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"second_t");
});

/************ offer_price ************/

$(document).on('keyup', ".before_production .serviceprice,.before_production .numberoftimes", function() {
    var sum = parseFloat($('.before_production .serviceprice').val()) * parseFloat($('.before_production .numberoftimes').val());
    $('.before_production .cost').val(sum);
});

$(document).on('keyup', ".production .serviceprice,.production .numberoftimes", function() {
    var sum = parseFloat($('.production .serviceprice').val()) * parseFloat($('.production .numberoftimes').val());
    $('.production .cost').val(sum);
});

$(document).on('keyup', ".after_production .serviceprice,.after_production .numberoftimes", function() {
    var sum = parseFloat($('.after_production .serviceprice').val()) * parseFloat($('.after_production .numberoftimes').val());
    $('.after_production .cost').val(sum);
});

$(document).on('keyup', "input.dayprice[name='dayprice[]'],input.numberofdays[name='numberofdays[]']", function() {
    calcule_id(this,'dayprice[]','numberofdays[]','cost[]');
});

///production
$(document).on('click', ".production .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"production");
});

/************ three_in_one ************/
/*
$(document).on('keyup', "input.form-control.firstpaymentperc", function() {
    var totam_price = parseFloat( $(".cost[name='cost[]']") .map(function(){return $(this).val();}).get() );
    var firs_price = totam_price - (totam_price * parseFloat($(this).val()) / 100);
    $('input.firstpaymenttotal').val(firs_price);
});*/

$(document).on('change', "#project_execution_date", function() {
    if(document.getElementById('project_execution_date').checked === true){
        $('.div-date-project').show();
    }
    if(document.getElementById('project_execution_date').checked === false){
        $('.div-date-project').hide();
    }
});

$(document).on('change', "#show-partner-tax", function() {
    if(document.getElementById('show-partner-tax').checked === true){
        $('.div-partner-tax').show();
    }
    if(document.getElementById('show-partner-tax').checked === false){
        $('.div-partner-tax').hide();
    }
});

$(document).on('click', ".before_production .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"before_production");
});

$(document).on('keyup', "input[name='price-once[]'],input[name='number[]']", function() {
    calcule_id(this,'price-once[]','number[]','total[]');
});

$(document).on('keyup', "input.firstpaymentperc[name='firstpaymentperc']", function() {
    var perc = $(this).val();
    var all = $(".cost[name='cost[]']").map(function(){return $(this).val();}).get();
    var sum = 0;
    for (var i = 0; i < all.length; i++) {
        sum += all[i] << 0;
    }
    var total = sum * perc/100;
    $('input.firstpaymenttotal[name="firstpaymenttotal"]').val(total);
});

$(document).on('keyup', "input.firstpaymentperc_qubbah[name='firstpaymentperc_qubbah']", function() {
    var perc = $(this).val();
    var all = $("input[name='total[]']").map(function(){return $(this).val();}).get();
    var sum = 0;
    for (var i = 0; i < all.length; i++) {
        sum += all[i] << 0;
    }
    var total = sum * perc/100;
    $('input.firstpaymenttotal[name="firstpaymenttotal"]').val(total);
});

/************  ************/
$(document).on('click', ".projectservices2 .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"projectservices2");
});

$(document).on('click', ".financeoption2 .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"financeoption2");
});

$(document).on('click', ".financeoption3 .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"financeoption3");
});


function getSelectedValuefinance() {
    var form = $('#financialdues').val();

    if (form == "financeoption2") {
        $('#financeoption2').show();
        $('#financeoption1,#financeoption3').hide();
        remove_waldis();
    } else if (form == "financeoption1") {
        $('#financeoption1').show();
        $('#financeoption2,#financeoption3').hide();
        remove_waldis();
    } else if (form == "financeoption3") {
        $('#financeoption3').show();
        $('#financeoption1,#financeoption2').hide();
        remove_waldis();
    }
}

function getSelectedfirstside() {
    var form = $('#first-side').val();

    if (form == "firstsideoption1") {
        $('#firstsideoption1').show();
        $('#firstsideoption2,#firstsideoption3').hide();
    } else if (form == "firstsideoption2") {
        $('#firstsideoption2').show();
        $('#firstsideoption1,#firstsideoption3').hide();
    } else if (form == "firstsideoption3") {
        $('#firstsideoption3').show();
        $('#firstsideoption1,#firstsideoption2').hide();
    }
}


$(document).on('keyup', "input.accrualwithtax[name='accrualwithtax[]']", function() {
    var selected = $('#financialdues').val(), csot ;
    var prev = $(this).prev();
    var prevRow = prev.prev(".row").attr('row_id');
    console.log(prevRow);

    if( selected ===  'financeoption3' ){
        var all = $("input[name='service_cost[]']").map(function(){return $(this).val();}).get();
        csot = all.reduce(function(a, b){
            return parseFloat(a) + parseFloat(b);
        }, 0);
    }
    if( selected ===  'financeoption1' || selected ===  'financeoption2' ){
        csot = $("input."+selected+"[name='cost[]']").val();
    }
    var per = $(this).val();

    var row_idd = $(this).attr('row_id');

    var mon = parseFloat(csot) * parseFloat(per)/100;
    var mon = mon + ( mon * 0.15 );
    $("input.eligibilitydetails[row_id='"+row_idd+"']").val(mon);
});


/************ with_idea ************/

$(document).on('click', ".keywords .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"keywords");
});

$(document).on('click', ".thefinancialvalue .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"thefinancialvalue");
});

/************ meeting_report ************/

$(document).on('click', ".eskelah-crew .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"eskelah-crew");
});

$(document).on('click', ".partner-crew .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"partner-crew");
});

/************ castagreement ************/

$(document).on('change', "#show_contractprice", function() {
    if(document.getElementById('show_contractprice').checked === true){
        $('.show_contractprice').show();
    }
    if(document.getElementById('show_contractprice').checked === false){
        $('.show_contractprice').hide();
    }
});

$(document).on('change', "#show_penality", function() {
    if(document.getElementById('show_penality').checked === true){
        $('.show_penality').show();
    }
    if(document.getElementById('show_penality').checked === false){
        $('.show_penality').hide();
    }
});

$(document).on('change', "#show_firstpayment", function() {
    if(document.getElementById('show_firstpayment').checked === true){
        $('.show_firstpayment').show();
    }
    if(document.getElementById('show_firstpayment').checked === false){
        $('.show_firstpayment').hide();
    }
});

/************************************************ Qubbah ************************************************/
/************************************************ Qubbah ************************************************/
/************************************************ Qubbah ************************************************/
/************************************************ Qubbah ************************************************/
/************************************************ Qubbah ************************************************/
/************************************************ Qubbah ************************************************/

/************ Event Contract ************/

function getSelectedprice() {
    var form = $('#price').val();
    if (form == "priceoption1") {
        $('#priceoption1').show();
        $('#priceoption2,#priceoption3').hide();
    } else if (form == "priceoption2") {
        $('#priceoption2').show();
        $('#priceoption1,#priceoption3').hide();
    } else if (form == "priceoption3") {
        $('#priceoption3').show();
        $('#priceoption2,#priceoption1').hide();
    }
}


$(document).on('click', ".partner_email .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"partner_email");
});
$(document).on('click', ".partner_officer .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"partner_officer");
});
$(document).on('click', ".qubbah_email .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"qubbah_email");
});
$(document).on('click', ".qubbah_officer .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"qubbah_officer");
});
$(document).on('click', ".priceoption1 .row .col-md-2 button.form-control.btn", function() { /*priceoption1*/
    clicked_button(this,"priceoption1");
});
$(document).on('click', ".priceoption2 .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"priceoption2");
});
$(document).on('click', ".priceoption3 .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"priceoption3");
});

$(document).on('submit', "#qubbah_event", function() {

    var pre = $("[name='payment_perce[]']") .map(function(){return $(this).val();}).get();
    var sum = pre.reduce(function(a, b){
        return parseFloat(a) + parseFloat(b);
    }, 0);
    if(sum < 100){
        alert_('معدل الدفعة أقل من 100%');
        $("[name='payment_perce[]']").css("border-color", "red");
        return false;
    }
    if(sum > 100){
        alert_('معدل الدفعة أكثر من 100%');
        $("[name='payment_perce[]']").css("border-color", "red");
        return false;
    }
    $("[name='payment_perce[]']").css("border-color", "#ced4da");
});

$(document).on('keyup', "input[name='payment_perce[]']", function() {
    var selected = $('#price').val(), csot ;

    if( selected ===  'priceoption1' ){
        var all = $("input[name='priceoption1_total[]']").map(function(){return $(this).val();}).get();
        csot = all.reduce(function(a, b){
            return parseFloat(a) + parseFloat(b);
        }, 0);
    }
    if( selected ===  'priceoption2' ){
        var all = $(".priceoption2_total").map(function(){return $(this).val();}).get();
        csot = all.reduce(function(a, b){
            return parseFloat(a) + parseFloat(b);
        }, 0);
    }
    if( selected ===  'priceoption3' ){
        var all = $(".priceoption3_total").map(function(){return $(this).val();}).get();
        csot = all.reduce(function(a, b){
            return parseFloat(a) + parseFloat(b);
        }, 0);
    }
    /**********DONE**********/
    if( selected ===  'priceoption1-done' ){
        var all = $(".priceoption1_total-done").map(function(){return $(this).val();}).get();
        csot = all.reduce(function(a, b){
            return parseFloat(a) + parseFloat(b);
        }, 0);
    }
    if( selected ===  'priceoption2-done' ){
        var all = $(".priceoption2_total-done").map(function(){return $(this).val();}).get();
        csot = all.reduce(function(a, b){
            return parseFloat(a) + parseFloat(b);
        }, 0);
    }
    if( selected ===  'priceoption3-done' ){
        var all = $(".priceoption3_total-done").map(function(){return $(this).val();}).get();
        csot = all.reduce(function(a, b){
            return parseFloat(a) + parseFloat(b);
        }, 0);
    }
    var per = $(this).val();
    var row_idd = $(this).attr('row_id');

    var mon = parseFloat((csot*0.15)+csot) * parseFloat(per)/100;
    $("input.total_per[row_id='"+row_idd+"']").val(mon);
});

$(document).on('keyup', "input[name='priceoption1_price[]'],input[name='priceoption1_nbr[]']", function() {
    calcule_id(this,'priceoption1_price[]','priceoption1_nbr[]','priceoption1_total[]');
});

$(document).on('keyup', "input[name='unit_cost[]'],input[name='clause_nbr[]'],input[name='day_number[]']", function() {
    var id = $(this).attr('row_id');
    var value1 = $('input[name="unit_cost[]"][row_id="'+id+'"]').val();
    var value2 = $('input[name="clause_nbr[]"][row_id="'+id+'"]').val();
    var value3 = $('input[name="day_number[]"][row_id="'+id+'"]').val();
    var total = value1 * value2 * value3;
    $('input[name="clause_total[]"][row_id="'+id+'"]').val(total/*.toFixed(3)*/);
    $('input[name="total[]"][row_id="'+id+'"]').val(total/*.toFixed(3)*/);
});

///////////////////// Event ///////////////////////
$(document).on('click', ".payments .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"payments");
});

///////////////////// three in one //////////////////////////////
//lightscreen service -- three in one
$(document).on('click', ".qubbah_financial_value .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"qubbah_financial_value");
});

$(document).on('click', ".financialselect-2 .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"financialselect-2");
});

$(document).on('click', ".financialselect-3 .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"financialselect-3");
});

$(document).on('click', ".financialselect2 .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"financialselect2");
});

$(document).on('click', ".financialselect2-2 .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"financialselect2-2");
});

$(document).on('click', ".financialselect3 .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"financialselect3");
});

function getFinancialSelectVs(){
    var form = $('#first-side').val();
    if( form == "financialselect1" ){
        $('.financialselect1').show();
        $('.financialselect2').hide();
        $('.financialselect3').hide();
        $('.financialselect2-2').hide();
        $('.financialselect2 input, .financialselect2 textarea , .financialselect3 input, .financialselect3 textarea').val('');
    }
    if( form == "financialselect2" ){
        $('.financialselect2').show();
        $('.financialselect1').hide();
        $('.financialselect3').hide();
        $('.financialselect2-2').hide();
        $('.financialselect1 input, .financialselect1 textarea , .financialselect3 input, .financialselect3 textarea').val('');
    }
    if( form == "financialselect2-2" ){
        $('.financialselect2-2').show();
        $('.financialselect1').hide();
        $('.financialselect3').hide();
        $('.financialselect1 input, .financialselect1 textarea , .financialselect3 input, .financialselect3 textarea').val('');
    }
    if( form == "financialselect3" ){
        $('.financialselect3').show();
        $('.financialselect1').hide();
        $('.financialselect2').hide();
        $('.financialselect2-2').hide();
        $('.financialselect2 input, .financialselect2 textarea , .financialselect1 input, .financialselect1 textarea').val('');
    }
}

/************ meeting_report ************/
$(document).on('click', ".qubbah-crew .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"qubbah-crew");
});

$(document).on('click', ".projectgoal .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"projectgoal");
});

$(document).on('click', "#content_sources", function() {
    if(document.getElementById('content_sources').checked === true){
        $('.div_content_sources').show();
    }
    if(document.getElementById('content_sources').checked === false){
        $('.div_content_sources').hide();
    }
});
/********** with_idea **********/
$(document).on('click', ".financeoffer .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"financeoffer");
});
$(document).on('click', ".creativeproposal .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"creativeproposal");
});
$(document).on('click', ".visualreferences .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"visualreferences");
});
$(document).on('click', ".project_itinerary .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"project_itinerary");
});


//***************************degital marketing **************************** */
/** Event **/
$(document).on('keyup', "input.service_cost[name='service_cost[]'],input.repeat_number[name='repeat_number[]']", function() {
    calcule_id(this,'service_cost[]','repeat_number[]','service_total[]');
});
/**three in one */
$(document).on('click', ".degital-invoice .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"degital-invoice");
});
$(document).on('click', ".all-invoice-2 .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"all-invoice-2");
});
/**offer price */
$(document).on('click', ".digital-offer-price .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"digital-offer-price");
});

function getSelectedsecondside() {
    var form = document.getElementById("second-side").value;
    if (form == "secondsideoption1") {
        document.getElementById('secondsideoption1').style.display = "block";
        document.getElementById('secondsideoption2').style.display = "none";

    } else if (form == "secondsideoption2") {
        document.getElementById('secondsideoption2').style.display = "block";
        document.getElementById('secondsideoption1').style.display = "none";

    }
}

/**contract_partner_project */
$(document).on('click', ".financeoption_digital .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"financeoption_digital");
});

$(document).on('click', ".howtopay_digital .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"howtopay_digital");
});

// $(document).on('submit', "#form-contract-digital", function() {
//     var pree = $(".servicerice[name='serviceporcentage[]']") .map(function(){return $(this).val();}).get();
//     var summ = pree.reduce(function(a, b){
//         return parseFloat(a) + parseFloat(b);
//     }, 0);
//     if(summ < 100){
//         alert_('نسبة الخدمة من اجمالي العقد أقل من 100%');
//         $(".servicerice[name='serviceporcentage[]']").css("border-color", "red");
//         return false;
//     }
//     if(summ > 100){
//         alert_('نسبة الخدمة من اجمالي العقد أكثر من 100%');
//         $(".servicerice[name='serviceporcentage[]']").css("border-color", "red");
//         return false;
//     }
//     $(".servicerice[name='serviceporcentage[]']").css("border-color", "#ced4da");
// });

//invoice three in one
function getFinancialSelectQub(){
    var form = $('#first-side').val();
    if( form == "financialselect-1" ){
        $('.financialselect-1').show();
        $('.financialselect-2').hide();
        $('.financialselect-3').hide();
        $('.financialselect-2 input, .financialselect-2 textarea , .financialselect-3 input, .financialselect-3 textarea').val('');
    }
    if( form == "financialselect-2" ){
        $('.financialselect-2').show();
        $('.financialselect-1').hide();
        $('.financialselect-3').hide();
        $('.financialselect-1 input, .financialselect-1 textarea , .financialselect-3 input, .financialselect-3 textarea').val('');
    }
    if( form == "financialselect-3" ){
        $('.financialselect-3').show();
        $('.financialselect-1').hide();
        $('.financialselect-2').hide();
        $('.financialselect-2 input, .financialselect-2 textarea , .financialselect-1 input, .financialselect-1 textarea').val('');
    }
}

///placeholder to value
/*function remove_value(){
    $('form.row.g-3 input[name="text"]').each(function() {
        var $t = $(this);
        $t.attr({ value: '' });//.removeAttr('placeholder');
    });
    $('form.row.g-3 textarea').each(function() {
        var $t = $(this);
        $t.val( '' );
    });
}
function placeholder_to_value(){
    $('form.row.g-3 input:visible').each(function() {
        var $t = $(this);
        $t.attr({ value: $t.attr('placeholder') });//.removeAttr('placeholder');
    });
    $('form.row.g-3 textarea:visible').each(function() {
        var $t = $(this);
        $t.val( $t.attr('placeholder') );
    });
}
placeholder_to_value();

$(document).on('change', "form.row.g-3 input, form.row.g-3 textarea", function() {
    placeholder_to_value();
});
$(document).on('change', "form.row.g-3 select", function() {
    remove_value();
    placeholder_to_value();
});*/
///End placeholder to value
$(document).on('change', "form.row.g-3 select", function() {
    /*var div_class = $(this).val()
    $('.'+div_class+' input, .'+div_class+' input').val('');*/
    //$('.row[row_id]').remove(); ghili
    //$('.col-md-2.zayd').show();
});

$(document).on('keyup', "#form-contract-digital input.service_cost[name='service_cost[]'],#form-contract-digital  input.repeat_number[name='repeat_number[]']", function() {

    var all = $("#form-contract-digital input[name='service_total[]']").map(function(){return $(this).val();}).get();
    csot = all.reduce(function(a, b){
        return parseFloat(a) + parseFloat(b);
    }, 0);
    if( isNaN(csot) === false ){
        $('.total_net').text(csot);
        $('.total_tva').text( csot + (csot*0.15) );
    }
});


/**********  KIT  *********/
/**********  KIT  *********/
/**********  KIT  *********/
/**three in one */
$(document).on('click', ".kit_financial .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"kit_financial");
});

$(document).on('click', ".kitfinancial-2 .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"kitfinancial-2");
});

$(document).on('click', ".kitfinancial-3 .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"kitfinancial-3");
});

$(document).on('keyup', ".kit_calcule input.quantity[name='quantity[]'],.kit_calcule input.dayprice[name='dayprice[]'],.kit_calcule input.numberofdays[name='numberofdays[]']", function() {
    calcule_three_id(this,'quantity[]','dayprice[]','numberofdays[]','cost[]');
});
/**offer price details */
$(document).on('click', ".kit-crew-quantity .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"kit-crew-quantity");
});

$(document).on('click', ".kit-equipment-quantity .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"kit-equipment-quantity");
});

$(document).on('click', ".kit-logistics-quantity .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"kit-logistics-quantity");
});

$(document).on('click', ".kit-project-payments .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"kit-project-payments");
});

//calcule kit
$(document).on('keyup', ".kit-crew-quantity input[name='crew_quantity[]'],.kit-crew-quantity input[name='crew_days[]'],.kit-crew-quantity input[name='crew_cos_per_day[]']", function() {
    calcule_three_id(this,'crew_quantity[]','crew_days[]','crew_cos_per_day[]','crew_total_cost[]');
});

$(document).on('keyup', ".kit-equipment-quantity input[name='equipment_quantity[]'],.kit-equipment-quantity input[name='equipment_days[]'],.kit-equipment-quantity input[name='equipment_cos_per_day[]']", function() {
    calcule_three_id(this,'equipment_quantity[]','equipment_days[]','equipment_cos_per_day[]','equipment_total_cost[]');
});

$(document).on('keyup', ".kit-logistics-quantity input[name='logistics_quantity[]'],.kit-logistics-quantity input[name='logistics_days[]'],.kit-logistics-quantity input[name='logistics_cos_per_day[]']", function() {
    calcule_three_id(this,'logistics_quantity[]','logistics_days[]','logistics_cos_per_day[]','logistics_total_cost[]');
});

$(document).on('change', "#show_tin", function() {
    if(document.getElementById('show_tin').checked === true){
        $('.show_tin').show();
    }
    if(document.getElementById('show_tin').checked === false){
        $('.show_tin').hide();
    }
});

$(document).on('change', "#select-kit-price", function() {
    var form = $(this).val();

    if (form == "kitfinancial-1") {
        $('.kitfinancial-1').show();
        $('#kitfinancial-2').hide();
        $('.kitfinancial-3').hide();
    }
    else if (form == "kitfinancial-2") {
        $('#kitfinancial-2').show();
        $('.kitfinancial-1').hide();
        $('.kitfinancial-3').hide();
    }
    else if (form == "kitfinancial-3") {
        $('.kitfinancial-3').show();
        $('.kitfinancial-1').hide();
        $('#kitfinancial-2').hide();
    }
});


$(document).on('keyup', ".kit-project-payments input[name='payments_percent[]']", function() {
    var sum_crew        = 0;
    var sum_equipment   = 0;
    var sum_logistics   = 0;
    var all_total       = 0;
    var payment_perc    = $(this).val();
    var this_row        = $(this).attr('row_id');
    $('[name="crew_total_cost[]"]').each(function(){
        sum_crew += +$(this).val();
    });
    $('[name="equipment_total_cost[]"]').each(function(){
        sum_equipment += +$(this).val();
    });
    $('[name="logistics_total_cost[]"]').each(function(){
        sum_logistics += +$(this).val();
    });
    all_total = sum_crew + sum_equipment + sum_logistics;
    var total = (all_total*payment_perc)/100;
    $("[row_id='"+this_row+"'] input[name='payments_total[]']").val(total);
});







$(document).on('change', "form.row.g-3 input", function() {
    var val_ = $(this).val();
    var class_ = $(this).attr('class');
    isArabic( val_,class_,this );
});


$(document).on('keyup change', ".div_1 input , .div_1 textarea", function() {
    show_div(1);
});
$(document).on('keyup change', ".div_2 input , .div_2 textarea", function() {
    show_div(2);
});
$(document).on('keyup change', ".div_3 input , .div_3 textarea", function() {
    show_div(3);
});
$(document).on('keyup change', ".div_4 input , .div_4 textarea", function() {
    show_div(4);
});
$(document).on('keyup change', ".div_5 input , .div_5 textarea", function() {
    show_div(5);
});
$(document).on('keyup change', ".div_6 input , .div_6 textarea", function() {
    show_div(6);
    show_div(7);
});
$(document).on('keyup change', ".div_7 input , .div_7 textarea", function() {
    show_div(7);
});



$(document).on('keyup change', "input, textarea, select", function() {

    $("input:hidden, textarea:hidden").each(function(){
        if( $(this).attr('type') !== 'checkbox' )
            $(this).prop('required',false);
    });
    $("input:visible, textarea:visible").each(function(){
        if( $(this).attr('type') !== 'checkbox' && $(this).attr('type') !== 'password' )
            $(this).prop('required',true);
    });
    
    if( window.location.href.includes('/edit/') === true ){
        $("input:visible, textarea:visible").each(function(){
            if( $(this).attr('type') == "file" )
                $(this).prop('required',false);
        });
    }

    if( window.location.href.includes('/history') === true ){
        $("input:visible, textarea:visible").each(function(){
            $(this).prop('required',false);                
        });
    }

});


/**check all visual production */

$(document).on('click','body .vp_check_all',function(){
    $('.pv_permission').not(this).prop('checked',this.checked);

});
$(document).on('change','body .pv_permission',function(){
    if ($('.pv_permission:checked').length == $('.pv_permission').length)
        $('.vp_check_all').prop('checked', true);
    else
        $('.vp_check_all').prop('checked', false);
});

/**check all digital marketing */
$(document).on('click','body .dm_check_all',function(){
    $('.dm_permission').not(this).prop('checked',this.checked);

});
$(document).on('change','body .dm_permission',function(){
    if ($('.dm_permission:checked').length == $('.dm_permission').length)
        $('.dm_check_all').prop('checked', true);
    else
        $('.dm_check_all').prop('checked', false);
});


/**check all qubbah */

$(document).on('click','body .qubbah_check_all',function(){
    $('.qubbah_permission').not(this).prop('checked',this.checked);

});
$(document).on('change','body .qubbah_permission',function(){
    if ($('.qubbah_permission:checked').length == $('.qubbah_permission').length)
        $('.qubbah_check_all').prop('checked', true);
    else
        $('.qubbah_check_all').prop('checked', false);
});

/**check all kit */

$(document).on('click','body .kit_check_all',function(){
    $('.kit_permission').not(this).prop('checked',this.checked);

});
$(document).on('change','body .kit_permission',function(){
    if ($('.kit_permission:checked').length == $('.kit_permission').length)
        $('.kit_check_all').prop('checked', true);
    else
        $('.kit_check_all').prop('checked', false);
});

/*************done***************/
function getSelectedprice_done() {
    var form = $('#price').val();
    if (form == "priceoption1-done") {
        $('#priceoption1-done').show();
        $('#priceoption2-done,#priceoption3-done').hide();
    } else if (form == "priceoption2-done") {
        $('#priceoption2-done').show();
        $('#priceoption1-done,#priceoption3-done').hide();
    } else if (form == "priceoption3-done") {
        $('#priceoption3-done').show();
        $('#priceoption2-done,#priceoption1-done').hide();
    }
}

$(document).on('click', ".priceoption1-done .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"priceoption1-done");
});

$(document).on('click', ".priceoption2-done .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"priceoption2-done");
});

$(document).on('click', ".priceoption3-done .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"priceoption3-done");
});

$(document).on('click', ".done_project_step .row .col-md-2 button.form-control.btn", function() {
    clicked_button(this,"done_project_step");
});

/**** delete user */

$(document).on('click','.delete-confirm', function (event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    const url = $(this).attr('url');
    swal({
        title: 'هل أنت متأكد أنك تريد الحذف؟',
        text: ' سيتم حذف هذا المستخدم وتفاصيله نهائيا!',
        icon: 'warning',
        buttons: ["تراجع", "حذف"],
    }).then(function(value) {
        if (value) {
            form.submit();
        }
    });
});


//check porcentage of contract
function pcontract(){
    var pree = $(".servicerice[name='serviceporcentage[]']") .map(function(){return $(this).val();}).get();
    var summ = pree.reduce(function(a, b){
        return parseFloat(a) + parseFloat(b);
    }, 0);
    if(summ < 100){
        alert_('نسبة الخدمة من اجمالي العقد أقل من 100%');
        $(".servicerice[name='serviceporcentage[]']").css("border-color", "red");
        return false;
    }
    if(summ > 100){
        alert_('نسبة الخدمة من اجمالي العقد أكثر من 100%');
        $(".servicerice[name='serviceporcentage[]']").css("border-color", "red");
        return false;
    }
    $(".servicerice[name='serviceporcentage[]']").css("border-color", "#ced4da");

    var pre = $(".accrualwithtax[name='accrualwithtax[]']") .map(function(){return $(this).val();}).get();
    var sum = pre.reduce(function(a, b){
        return parseFloat(a) + parseFloat(b);
    }, 0);
    if(sum < 100){
        alert_('معدل الدفعة أقل من 100%');
        $(".accrualwithtax[name='accrualwithtax[]']").css("border-color", "red");
        return false;
    }
    if(sum > 100){
        alert_('معدل الدفعة أكثر من 100%');
        $(".accrualwithtax[name='accrualwithtax[]']").css("border-color", "red");
        return false;
    }
    $(".accrualwithtax[name='accrualwithtax[]']").css("border-color", "#ced4da");
}


//////////////// Ajax submite //////////////////
$('form.row.g-3[data-toggle="validator"]').submit(function (e) {

    //Check
    var error = false;
    //$('form.row.g-3[data-toggle="validator"] input[required], form.row.g-3[data-toggle="validator"] textarea[required], form.row.g-3[data-toggle="validator"] input:visible, form.row.g-3[data-toggle="validator"] textarea:visible').each(function(){
    $(this).find('input[required], textarea[required], input:visible, textarea:visible').each(function(){
        if( $(this).attr('type') != 'checkbox' && $(this).attr('type') != 'file' ){
            if( $(this).val().trim().length <= 0 ){
                $(this).closest('.form-group').removeClass('has-success').removeClass('has-green');
                $(this).closest('.form-group').addClass('has-error').addClass('has-red');
                error = true;
                alert_('يجب تعبئة جميع الحقول');
            }else{
                $(this).closest('.form-group').removeClass('has-error').removeClass('has-red');
                $(this).closest('.form-group').addClass('has-success').addClass('has-green');
            }
        }
        if( $(this).attr('type') == 'file' ){
            $(this).prop('required', false);
        }
    });
    if ( error ) {
        return false;
    }
    if( $(this).attr('id') == "form-contract" && pcontract() == false ){
        return false;
    }
    //End check

  
    var formData = new FormData();
    e.preventDefault();
    e.stopPropagation();

    $(".form-check-input").attr('type', 'hidden');
    
    var html      = $(this).html();
    if( $('#page_type').val() === "عرض سعر مفصل   فاتورة أو عرض سعر" ){
       var html      = $(".offer_price_three_in_one, .offer_price_div, .offer_price_details").html();
    }


    var url       = $(this).attr('action');
    var serialize = $(this).serialize();
    var page_title = $('body h3.page-title').text();

    $('[type="file"]').each(function() {
        var name = $(this).attr('name');
        var file = $(this).prop('files')[0];

        formData.append(name, file);
    });

    if( window.location.href.includes('/kit/form/offer_price/details') === true ){
        var html      = $(".offer_price_details").html();
    }
    
    var token = $('input[name="_token"]').val();
    formData.append('_token', token);
    formData.append('html', html);
    formData.append('inputs', serialize);
    formData.append('page_title', page_title);

    var old         = $(this).find('button.btn.btn-primary').text();
    var this_btn    = $(this).find('button.btn.btn-primary');


    $.ajax({
            url: url,
            type: 'POST',
            processData: false, // important
            contentType: false, // important
            data: formData, 
            cache: false,
        beforeSend: function () {
            $('i.fab.fa-wpforms').hide();
            this_btn.append( '<i class="fas fa-spinner"></i>' );
            $('button.btn.btn-primary').attr('disabled', true);
        },
        success: function (response) {
            $(".form-check-input").attr('type', 'checkbox');
            this_btn.html( old );
            $('button.btn.btn-primary').attr('disabled', false);
            window.open('/pdf/'+response,"_blank");
        },
        error: function (response) {
            $(".form-check-input").attr('type', 'checkbox');            
            this_btn.html( old );
            $('button.btn.btn-primary').attr('disabled', false);
            alert('an error! please try again');
        }
    });
    
    return false;
});


/////Clients
$('[name="companyname[]"], [name="companyname"], [name="partner"], [name="clientname-ar"]').attr('list','ClientsList');
$('[name="companyname[]"], [name="companyname"], [name="partner"], [name="clientname-ar"]').attr('autocomplete','none');
/////
//en
$('input.form-control.nexa-light[name="companyname"], [name="clientname-en"]').attr('list','');
///get data-attr
$(document).on('change', '[name="companyname[]"], [name="companyname"], [name="partner"], [name="clientname-ar"]', function() {
    if( $(this).val() !== '' ){
        var input_name = $(this).val();
        $("#ClientsList option").each(function(index){
            if( $(this).val() == input_name ){
                $('[name="clientname-en"]').val($(this).attr('data-name'));
                $('[name="companycountry[]"]').val($(this).attr('data-country'));
                $('[name="commercialregister[]"], [name="commercialregister"]').val($(this).attr('data-crn'));
                $('[name="partner_tax"]').val($(this).attr('data-tax'));
                $('[name="companyaddress[]"], [name="addresscompany"], [name="companyaddress"]').val($(this).attr('data-address'));
            }
        });
    }
}); 