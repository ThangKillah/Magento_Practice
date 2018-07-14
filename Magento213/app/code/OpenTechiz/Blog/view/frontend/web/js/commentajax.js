define([
    "jquery",
    "jquery/ui",
    "loadcomment"
], function($, jqueryUi, loadcomment){
    "use strict";
     
    function main(config, element) {
        var $element = $(element);
        var AjaxUrl = config.AjaxUrl;
         
        var dataForm = $('#contact-form');
        dataForm.mage('validation', {});
         
        $(document).on('click','#submit',function() {
             
            if (dataForm.valid()){
            event.preventDefault();
                var param = dataForm.serialize();
                //alert(param);
                    $.ajax({
                        showLoader: true,
                        url: AjaxUrl,
                        data: param,
                        type: "POST"
                    }).done(function (data) {
                        //console.log(data);
                        if(data.result == "success")
                        {
                            $('.note').html(data.message);
                            $('.note').css('color', 'green');
                            document.getElementById("contact-form").reset();
                            loadcomment.loadComments(config);
                            return true;
                        }
                        else
                        {
                            $('.note').html(data.message);
                            $('.note').css('color', 'red');
                            return true;
                        }
                        
                    });
                }
            });
    };
return main;
     
     
});