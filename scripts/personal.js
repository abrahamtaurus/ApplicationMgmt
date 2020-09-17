$(document).ready(function(){
	
	$('#personalNext').on('click', function(){
		if(validateFormData()){
			vjsnPersonalFormData = getFormDataAsJSON();
			submitJSONtoServer(vjsnPersonalFormData);	
	});
	
	
});



function validateFormData(){
	var vformValid = true;
	var verrMsg = "";
	
	if(trim($('#fname').val())=="") {vformValid= false; verrMsg = "First NAme is empty. <br />"; }
	
	return vformValid;
}



function getFormDataAsJSON(){
	var vjsnFormData = new Object();
	
	vjsnFormData.fName = trim($('#fname').val());	
	vjsnFormData.lName = trim($('#lname').val());
	
	if($('#female').is(':checked')
		vjsnFormData.gender = 'F';
	else
		vjsnFormData.gender = 'M';

	return vjsnFormData;
	
}

function submitJSONtoServer(pjsnPersonalFormData){
	$.ajax({
		url: "PersonalInformationCtl.php",
		data: pjsnPersonalFormData,
		type: "post",
		dataType: "json",
		content: "json",
		success: fucntion(presponse){
			
		},
		failure: function(){
			
		}
	});
}

