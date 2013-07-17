$(document).ready(function(){
    $(".btn-delete-eboard-member").hide();

    $("#club_meeting_time").timepicker({
        'step': '15'
    });
    
    $("#sports_coach_phone_number").mask("(999)-999-9999");
    
    $("#is_sports_club").change(function(){
        if($(this).val() == '1')
        {
            $(".sports-form-field").removeAttr('disabled');
        }
        else
        {
            $(".sports-form-field").attr('disabled', 'disabled');
            
            //clean up form validation if you go back to disabling it
            //removes error label
            $(".sports-form-field").next().hide();
            $(".sports-form-field").closest('.control-group').removeClass('error');
        }
    });
    $("#last_election_date").datepicker();
    $("#club_recognition_form").validate({
        focusCleanup: true,
        onkeyup: false, //must be false for remote validation - otherwise server side will be spammed
        rules: {
            // simple rule, converted to {required:true}
            'club_name': "required",
            'club_acronym' : {
                required: true,
                maxlength: 4
            },
            // compound rule
            'club_email_address': {
                required: true,
                email: true
            },
            'club_category_id' : "required",
            'club_description' : {
                required: true,
                minlength: 10
            },
            'advisor_username' : {
                required: true,
                remote: {
                    url: "/club_portal/public/api/ldap/validate_username.json",
                    type: "post",
                    dataType:"json",
                    data: {
                        user_name: function() {
                            return $("#advisor_username").val();
                        }
                    },
                    dataFilter: function(data) {
                        var json = JSON.parse(data);
                        if(json.status == "false") {
                            return "\"" + json.errorMessage + "\"";
                        } else {
                            //remote function requires a string true is returned
                            if(json.results.is_valid_user == true)
                            {
                                return 'true';
                            }
                            return 'false';
                        }

                    }
                }
            },
            'last_election_date' : {
                required: true,
                dpDate: true
            },
            'submitter_position' : "required",
            'membership_fee' : {
                required: true,
                number: true
            },
            'approximate_membership_count' : {
                required: true,
                digits: true
            },
            'is_sports_club' : "required",
            'club_website' : {
                url: true
            },
            'club_meeting_day' : "required",
            'club_meeting_time' : "required",
            'club_meeting_location' : "required",
            'club_meeting_frequency' : "required",
            'club_fall_event_description' : {
                required: true,
                minlength: 10
            },
            'club_winter_event_description' : {
                required: true,
                minlength: 10
            },
            'club_spring_event_description' : {
                required: true,
                minlength: 10
            },
            'sports_season_name' :{
                required: function(element)
                {
                    return $("#is_sports_club").val() == '1';
                }   
            },
            'sports_coach_first_name' :{
                required: function(element)
                {
                    return $("#is_sports_club").val() == '1';
                }   
            },
            'sports_coach_last_name' :{
                required: function(element)
                {
                    return $("#is_sports_club").val() == '1';
                }   
            },
            'sports_coach_phone_number' :{
                required: function(element)
                {
                    return $("#is_sports_club").val() == '1';
                }
            },
            'sports_coach_email_address' :{
                required: function(element)
                {
                    return $("#is_sports_club").val() == '1';
                },
                email: true
            },
            'sports_league_name' :{
                required: function(element)
                {
                    return $("#is_sports_club").val() == '1';
                }   
            },
            'sports_league_fee' :{
                required: function(element)
                {
                    return $("#is_sports_club").val() == '1';
                },
                number: true
            },
            'is_sports_travel_outside_rochester_area' :{
                required: function(element)
                {
                    return $("#is_sports_club").val() == '1';
                }   
            },
            'sports_additional_expenses_description' :{
                required: function(element)
                {
                    return $("#is_sports_club").val() == '1';
                },
                minlength: 10
            }
        },
        messages: {
            "club_website": {
                url: "Must start with http:// or https:// (i.e. http://www.google.com)"
            },
            "faculty_advisor_rit_username":{
                remote: "Invalid RIT User Account"
            }
        },
        //twitter bootstrap class
        highlight: function(label) {
            $(label).closest('.control-group').addClass('error');
        },
        success: function(label) {
            label.closest('.control-group').addClass('success');
        },
        submitHandler: function(form) {
            
            //checkDuplicateSelectedEboardPositions();
            //checkDuplicateEboardUsernames();
            
            var eBoardMembers = new Array();
            $(".eboard-member-row").each(function(){
                var username = $(this).find('.eboard_member_username').val();
                var position = $(this).find('.eboard_member_position').val();
                
                var role = new Object();
                role.position_id = position;
                role.username = username;
                
                eBoardMembers.push(role);
            });
                        
            //insert this into the form
            var formField = $('<input/>')
            .attr('type', 'hidden')
            .attr('value', eBoardMembers)
            .attr('name', 'eboard_memberships')
            .attr('id', 'eboard_memberships');
                            
            $("#club_recognition_form").append(formField);
           
            form.submit();
        }
    });

    $(document).on('click', ".btn-delete-eboard-member", function(){
        $(this).parent().parent().remove();
        displayEboardMemberDeleteButton();
        maxAddedEboardMembers();
    });
    
    $("#add_eboard_member").click(function(){
        var newRow = $(".eboard-member-row").first().clone();
        
        //unique id for eboard_member_username and clear existing value for new row
        newRow.find('#eboard_member_username')
        .attr('id', 'eboard_member_username' + new Date().getTime())
        .attr('name', 'eboard_member_username' + new Date().getTime())
        .val('');
        
        //unique id for eboard_position_id and clear existing value for new row
        newRow.find('#eboard_member_position')
        .attr('id', 'eboard_member_position' + new Date().getTime())
        .attr('name', 'eboard_member_position' + new Date().getTime())
        .val('');
                
        //@todo : remove any validation elements - fix this
        newRow.find('label').removeClass('success').removeClass('error');
        
        $(".eboard-member-row").last().after(newRow);
        
        $(".eboard_member_username").each(function(){
            var fieldName = "#"+$(this).attr('name');
            
            $(fieldName).rules("add", {
                remote: {
                    url: "/club_portal/public/api/ldap/validate_username.json",
                    type: "post",
                    dataType:"json",
                    data: {
                        user_name: function() {
                            return $(fieldName).val();
                        }
                    },
                    dataFilter: function(data) {
                        var json = JSON.parse(data);
                        if(json.status == "false") {
                            return "\"" + json.errorMessage + "\"";
                        } else {
                            //remote function requires a string true is returned
                            if(json.results.is_valid_user == true)
                            {
                                return 'true';
                            }
                            return 'false';
                        }

                    },
                    statusCode: {
                        404: function() {
                            alert('Error Contacting Username Verification Service');
                        //append error message
                        },
                        500: function()
                        {
                            alert('Error Processing Username Verification Request');
                        //append error message
                        }
                    }
                }
            });
                        
            $("#"+$(this).attr('name')).rules("add", "required");
        });
        
        $(".eboard_member_position").each(function(){
            $("#"+$(this).attr('name')).rules("add", "required");
        });
     
        displayEboardMemberDeleteButton();
        maxAddedEboardMembers();
    });
    
    function displayEboardMemberDeleteButton()
    {
        if($(".eboard-member-row").size() > 1)
        {
            $(".btn-delete-eboard-member").show();
        }
        else
        {
            $(".btn-delete-eboard-member").hide();
        } 
    }
    
    function maxAddedEboardMembers()
    {
        var numberOfEboardMembers = $(".eboard-member-row").size();
        
        /**
         * get the number of e-board positions available in the first row list
         * you have to use :first selector because anyone of the rows could be deleted at anytime
         * you have to subtract one because you don't have the "Select an Option" to be counted
         */
        var numberOfEboardPostions = $(".eboard_member_position:first option").size() - 1;
        
        if(numberOfEboardMembers >= numberOfEboardPostions)
        {
            $("#add_eboard_member").addClass('disabled').attr('disabled', 'disabled').val('Max Members Added');
        }
        else
        {
            $("#add_eboard_member").removeClass('disabled').removeAttr('disabled').val('Add Member');   
        }
       
    }
    
    function checkDuplicateSelectedEboardPositions()
    {
        var usedNames = {};
        
        $(".eboard_member_position").each(function() {            
            if(usedNames[$(this).val()]) {
                alert('This position ' + $(this).val() +' has already been selected');
            } else {
                usedNames[$(this).val()] = $(this).val();
            }
        });
        
    }
    
    function checkDuplicateEboardUsernames()
    {
        var usedNames = {};
        
        $(".eboard_member_username").each(function () {            
            if(usedNames[$(this).val()]) {
                alert('This user ' + $(this).val() +' cannot hold more than one position');
            } else {
                usedNames[$(this).val()] = $(this).val();
            }
        });
    }
    
});