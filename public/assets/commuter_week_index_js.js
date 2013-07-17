$(document).ready(function(){
    
    $("#commuter_registration_form").validate({
        rules: {
            'city_name' : "required", 
            'graduation_class_year' : {
                "required" : true,
                "digits" : true,
                "minlength" : 4
            },
            'rit_college_id' : "required",
            'zip_code' : {
                "required" : true,
                "digits" : true,
                "minlength" : 5
            },
            'roommate_type_id' : "required",
            'dwelling_choice_id' : "required",
            'apartment_complex_name' : {
                "required": function(element) {
                    return $("#dwelling_choice_id option:selected").text() == 'Apartment';
                }
            }
        },
        messages:{
            'graduation_class_year' : {
                "minlength" : 'Please enter 4 digit year (i.e. 2007)'
            },
            'zip_code' : {
                "minlength" : 'Zip Code Must be 5 digits (i.e. 97220)'
            }
        }
    });
    
});