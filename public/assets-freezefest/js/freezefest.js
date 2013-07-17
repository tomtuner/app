$(document).ready(function(){
    
    eventLocationDropdownChanged();
    
    var clubList = [];
        
    $.getJSON('js/clubs.json', function(json) {

	    for (p in json.clubs) {
	    	clubList[p] = json.clubs[p];
	    }

  	});
                
    $("#clubName").autocomplete({
        source: clubList,
        minLength: 1,
        delay: 0,
        autoFocus: true,
    });
    
    $('#eventTimeStart').timepicker();
    
    $('#eventTimeEnd').timepicker();
    
    $.validator.addMethod("inClubList", function(value, element) {
		return ($.inArray(value, clubList) > -1);
	}, "Please select a valid club from the list.");
    
    $("#registrationForm").validate({
	   onkeyup: false,
	   onclick: false,
	   errorClass: "text-error",
	   submitHandler: function(form)
	   {
	   	   if($("#eventLocationDropdown").val() == "Other")
	   	   {
		   	   $("#eventLocation").val($("#eventLocationOther").val());
	   	   } else {
		   	   $("#eventLocation").val($("#eventLocationDropdown").val());
	   	   }
	   	   
	   	   if($("#serviceOther").val() == "")
	   	   {
		   	   $("#serviceOther").remove();
	   	   }
	   	   
		   form.submit();
	   }
	});
	
	$("#eventLocationDropdown").change(function(){
		
		eventLocationDropdownChanged();
		
	});
	
});

function eventLocationDropdownChanged() {
   
   if($("#eventLocationDropdown").val() == "Other") {
	   $("#eventLocationOther").css("display", "inline");
	} else {
		$("#eventLocationOther").css("display", "none");
	}
 
}