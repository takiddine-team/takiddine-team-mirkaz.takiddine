jQuery(document).ready(function($) {
    $('body .services.price td.tozzomt').each(function(){
            var element = $(this);
            var modifiedText = element.text().replace(/\d+/g, '<span class="nmr-ftr">$&</span>');
            element.html(modifiedText);
    }); 
});



jQuery(document).ready(function($) {
    $('body .container .content p.para-justify').each(function(){
            var element = $(this);
            var e_class = element.attr('class');            
            if(  typeof e_class !== "undefined" ){
                if( e_class.includes("nexa-light") === true ){
                    var modifiedText = element.text().replace(/\d+/g, '<span class="nexa-light">$&</span>');
                    element.html(modifiedText);
                }
            }            
    }); 
});