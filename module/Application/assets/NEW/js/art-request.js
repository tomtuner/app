$(document).ready(function(){
    
    //masked input for phone number
    $("#phone_number").mask("(999) 999-9999");
    
    //date picker
    $("#request_due_date").datepicker();
    $("#event_start_date").datepicker();
    $("#event_end_date").datepicker();
    
    //time picker
    $('#event_start_time').timepicker({'step': '15'});
    $('#event_end_time').timepicker({'step': '15'});
    
    $('#art_request_form').validate();
    //form next button
   /* $(".next_button").click(function(){
        //$(this).prevUntil('.step').next().show();
        //$(this).parent().hide();
        $(this)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .next()
        .show();
        
        $(this)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .hide();
    });
    
    //form back button
    $(".back_button").click(function(){
        $(this).closest('.future_step').hide();
        $(this).closest('.future_step').prev().show();
    });*/
    
});

