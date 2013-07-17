$(document).ready(function(){
    $(".btn-delete-eboard-member").hide();

    $("#club_meeting_time").timepicker({
        'step': '15'
    });
    
    $("#sports_coach_phone_number").mask("(999)-999-9999");
	
    $("#organization_id").change(function(){
        $.ajax({
            type: "POST",
            url: "/app/club-portal/club-recognition/club-recognition-status",
            data: {
                organization_id: $(this).val()
            },
            dataType: "json"
        }).done(function(msg) {
            if(msg.results.status == true)
            {
                bootbox.dialog("<h4>The club recognition application for this club has already been submitted</h4>", {
                    "label": "Home",
					"icon"  : "icon-home icon-white",
                    "callback": function() {
                        location.href = 'http://campuslife.rit.edu/app/club-portal';
                    }
                });
            }
        });
    });
    
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
        onkeyup: false, //must be false for remote validation - otherwise server side will be spammed
        rules: {
            // simple rule, converted to {required:true}
            'organization_id': "required",
            'club_acronym' : {
                required: true,
                maxlength: 10
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
                    url: "/app/api/ldap/validate_username.json",
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
			'eboard_member_username' : {
				required: true,
                remote: {
                    url: "/app/api/ldap/validate_username.json",
                    type: "post",
                    dataType:"json",
                    data: {
                        user_name: function() {
                            return $("#eboard_member_username").val();
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
            'submitter_position_id' : "required",
            'club_membership_fee' : {
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
            "advisor_username":{
                remote: "Invalid RIT User Account"
            },
			"eboard_member_username":{
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
            
            checkDuplicateSelectedEboardPositions();
            checkDuplicateEboardUsernames();
            checkForDefaultPositions();
			
			if(dialogErrorMessages.length > 0)
			{
				var errorList = $("<ul></ul>");
				
				for(var i = 0; i < dialogErrorMessages.length; i++)
				{
					errorList.append(dialogErrorMessages[i]);
				}
				
				//reset error messages
				dialogErrorMessages = [];
				
				bootbox.dialog(errorList, {
					"label": "OK"
				});
				
				return false;
			}
            
            $(".eboard-member-row").each(function(){
                var username = $(this).find('.eboard_member_username').val();
                var position_id = $(this).find('.eboard_member_position').val();

                //insert this into the form
                var eBoardMembershipFormField = $('<input/>')
                .attr('type', 'hidden')
                .attr('value', username + ',' + position_id)
                .attr('name', 'eboard_memberships[]')
                .attr('id', 'eboard_memberships');

                $("#club_recognition_form").append(eBoardMembershipFormField);
                
                //insert club name
                var clubNameFormField = $('<input/>')
                .attr('type', 'hidden')
                .attr('value', $("#organization_id option:selected").text())
                .attr('name', 'club_name')
                .attr('id', 'club_name');
                
                $("#club_recognition_form").append(clubNameFormField);
            });
            
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
		
		var fieldName = 'eboard_member_username' + new Date().getTime();
		
        newRow.find('#eboard_member_username')
        .attr('id', fieldName)
        .attr('name', fieldName)
        .val('');
        
        //unique id for eboard_position_id and clear existing value for new row
        newRow.find('#eboard_member_position')
        .attr('id', 'eboard_member_position' + new Date().getTime())
        .attr('name', 'eboard_member_position' + new Date().getTime())
        .val('');
                
        newRow.find('label').removeClass('success').removeClass('error');
		newRow.find('.control-group').removeClass('success').removeClass('error');
        
        $(".eboard-member-row").last().after(newRow);
                    
            $('#'+fieldName).rules("add", {
                remote: {
                    url: "/app/api/ldap/validate_username.json",
                    type: "post",
                    dataType:"json",
                    data: {
                        user_name: function() {
							return $('#'+fieldName).val();
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
				},
				messages:{
					remote: "Invalid RIT User Account"
				}
             });
                        
            $("#"+$(this).attr('name')).rules("add", "required");
			
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
	
	var dialogErrorMessages = new Array();
    
    function checkDuplicateSelectedEboardPositions()
    {
        var usedNames = {};
        
        $(".eboard_member_position").each(function() {            
            if(usedNames[$(this).val()]) {
				dialogErrorMessages.push('<li>This position ' + $(this).find("option:selected").text() +' has already been selected</li>');
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
				dialogErrorMessages.push('<li>The user ' + $(this).val() +' cannot hold more than one position</li>');
            } else {
                usedNames[$(this).val()] = $(this).val();
            }
        });
    }
    
    function checkForDefaultPositions()
    {
         var usedNames = {};

         $(".eboard_member_position").each(function() {
            usedNames[$(this).find("option:selected").text()] = $(this).find("option:selected").text();
         });
		
		 if((usedNames['President'] != 'President')) {
				dialogErrorMessages.push('<li>You must have a <b>President</b></li>');
		 }
			
		 if((usedNames['Treasurer'] != 'Treasurer')){
			dialogErrorMessages.push('<li>You must have a <b>Treasurer<b/></li>');
		 }
    }
    
});