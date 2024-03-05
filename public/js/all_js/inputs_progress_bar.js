function get_page_inputs(){
    var url = window.location.href;
    var input_nbr = $('form.row.g-3 input').length + $('form.row.g-3 textarea').length;





    //Done
    if( url.includes('/form/contract/partner/nda') === true ){
        var select_1 = $('#first-side').val();
        var select_1_v = { 'firstsideoption1': 3, 'firstsideoption2': 7, 'firstsideoption3': 4 };
        input_nbr -= 15;
        input_nbr += select_1_v[ select_1 ];
        if( $('#show_cin').val() == "off" )
            input_nbr -= 2;
    }
    if( url.includes('/form/contract/partner/project') === true ){
        var select_1 = $('#first-side').val();
        var select_2 = $('#price').val();
        var select_1_v = { 'firstsideoption1': 3, 'firstsideoption2': 4, 'firstsideoption3': 7 };
        var select_2_v = { 'priceoption1-done': 1, 'priceoption2-done': 3, 'priceoption3-done': 3 };
        input_nbr -= 22;
        input_nbr += select_1_v[ select_1 ];
        input_nbr += select_2_v[ select_2 ];
        if( $('#show_cin').val() == "off" )
            input_nbr -= 2;
    }
    if( url.includes('/form/contract/supplier/nda') === true ){
        if( $('#show_penality').val() == "off" )
            input_nbr -= 2;
    }
    if( url.includes('/form/contract/supplier/castagreement') === true ){
        if( $('#show_contractprice').val() == "off" )
            input_nbr -= 1;
    }
    if( url.includes('/form/contract/supplier') === true ){
        if( $('#show_penality').val() == "off" )
            input_nbr -= 2;
    }
    if( url.includes('/form/offer_price') === true ){
        var select_1 = $('#first-side').val();
        var select_1_v = { 'financialselect1': 5, 'financialselect2-2': 3, 'financialselect3': 5 };
        input_nbr -= 13;
        input_nbr += select_1_v[ select_1 ];
        if( $('#show_tin').val() == "off" )
            input_nbr -= 2;
    }
    if( url.includes('/form/three_in_one') === true ){
        var select_1 = $('#first-side').val();
        var select_1_v = { 'financialselect1': 5, 'financialselect2-2': 3, 'financialselect3': 5 };
        input_nbr -= 13;
        input_nbr += select_1_v[ select_1 ];
        if( $('#show-partner-tax').val() == "off" )
            input_nbr -= 1;
        if( $('#show_tin').val() == "off" )
            input_nbr -= 2;
    }



    //clients
    if( url.includes('/clients/') === true ){
        input_nbr -= 1;
    }

    return input_nbr;
}