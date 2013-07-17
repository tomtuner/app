$(document).ready(function(){

    $("#phone_number").mask("(999) 999-9999");
    
    $("#request_due_date").datepicker({
        'minDate': '+14'
    });

    $("#event_start_date").datepicker({
        'minDate': '+14'
    });

    $("#event_end_date").datepicker({
        'minDate': '+14'
    });
    
    $('#event_start_time').timepicker({
        'step': '15'
    });
    $('#event_end_time').timepicker({
        'step': '15'
    });
    
    $("#add_file_attachment").click(function(){
        $(".file-attachment-row").last().after($(".file-attachment-row").first().clone().show());
        $("#remove_file_attachment").show();
    });
        
    $("#remove_file_attachment").hide();

    $(".file-attachment-row").last().after($(".file-attachment-row").first().clone());

    $(".file-attachment-row").first().hide();
    
    $(document).on('click', "#remove_file_attachment", function(){
        $(".file-attachment-row").last().remove();
        if($(".file-attachment-row").size() == 2)
        {
           $("#remove_file_attachment").hide();
        }
        else
        {
           $("#remove_file_attachment").show();
        }
    });

    $("#Banner").change(function(){
       if($(this).is(':checked'))
       {
           $("#banner-request-container").show();
           $('#has_banner_request').val('true');
       }
       else
       {
           $("#banner-request-container").hide();
           $('#has_banner_request').val('false');
       }
    });

    $("#Flyer").change(function(){
       if($(this).is(':checked'))
       {
           $("#flyer-request-container").show();
           $('#has_flyer_request').val('true');
       }
       else
       {
           $("#flyer-request-container").hide();
           $('#has_flyer_request').val('false');
       }
    });

    $.validator.addMethod('atLeastOneChecked', function(value, element) {
        return ($(".checkbox-group:checked").length > 0);
    }, 'Please select at least one option.');
    
    $("#art_request_form").validate({
        rules: {
            'phone_number' : "required",
            'request_due_date' : {
                required: true,
                dpDate: true
            },
            'art_request_type[]' : {
                'atLeastOneChecked' : true
            },
            'event_title': "required",
            'event_location' : "required",
            'event_sponsor' : "required",
            'event_start_time' : "required",
            'event_end_time' : "required",
            'event_description' : {
                required: true,
                minlength: 10
            },
            'event_pricing_member' : {
                required: true,
                number: true
            },
            'event_pricing_student' : {
                required: true,
                number: true
            },
            'event_pricing_staff' : {
                required: true,
                number: true
            },
            'event_pricing_public' : {
                required: true,
                number: true
            },
            'request_description' : {
                required: true,
                minlength: 10            
            },
            'event_start_date': { 
                required: true, 
                dpDate: true,                
                dpCompareDate: {'notAfter' : '#event_end_date'}
            },
            'event_end_date': {
                required: true, 
                dpDate: true,                
                dpCompareDate: {'notBefore' : '#event_start_date'}
            }
        },
        errorPlacement: function(error, element) {
            if (element.attr("type") === "checkbox") 
            {
                error.insertAfter("div[class='checkbox-group-container']");
            }
            else{
            
                if(element.attr("type") === "file")
                {
                    error.insertAfter("div[class='input-append']");
                }
                else{
                    if(element.hasClass('textarea-validation') == true){
                        error.insertAfter($(element).next());
                    }
                    else
                    {
                        error.insertAfter(element);
                    }
                }
                
            }
        },
        highlight: function(label) {
            $(label).closest('.control-group').addClass('error');
        },
        success: function(label) {
            label.closest('.control-group').addClass('success');
        },  
        submitHandler: function(form) {
        	$(".file-attachment-row").first().remove();
            form.submit();
        }
    });
    
});