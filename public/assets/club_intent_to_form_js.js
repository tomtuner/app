$(document).ready(function(){
    
    $("#intent_to_form").validate({
        onkeyup: false, //must be false for remote validation - otherwise server side will be spammed
        rules: {
            // simple rule, converted to {required:true}
            'club_name' : {
                required: true,
                remote: {
                    url: "/api/organization/validate-organization.json",
                    type: "post",
                    dataType:"json",
                    data: {
                        organization_name: function() {
                            return $("#club_name").val();
                        }
                    },
                    dataFilter: function(data) {
                        var json = JSON.parse(data);
                        if(json.status == "false") {
                            return "\"" + json.errorMessage + "\"";
                        } else {
                            //remote function requires a string true is returned
                            if(json.results.is_valid_organization == false)
                            {
                                return 'true';
                            }
                            return 'false';
                        }

                    }
                }
            },
            'club_acronym' : {
                required: true,
                maxlength: 10
            },
            'club_description' : {
                required: true,
                minlength: 10
            },
            'is_sports_club' : "required"
        },
        messages: {
            "club_name":{
                remote: "Club Name Is Already Taken"
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
            form.submit();
        }
    });
    
});