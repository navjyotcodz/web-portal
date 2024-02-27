
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
	
}
function validateForm() {
	if(document.contactForm.f_name.value == '')
	{
		alert("Please enter First Name");  
		document.contactForm.f_name.focus();
	return false;
	
	}
	
	if (f_name.value === m_name.value  ) 
             {
			alert("Please enter Other Middle Name");
			document.contactForm.l_name.focus();
			return false;
	}
	if(document.contactForm.m_name.value == '')
	{
		  alert("Please enter Middle Name");     
		document.contactForm.m_name.focus();
	return false;
	
	}
	
	
	if (f_name.value === m_name.value === l_name.value ) 
  {
			alert("Please enter Other Last Name");
			document.contactForm.l_name.focus();
			return false;
	}
	 if	(document.contactForm.l_name.value == '')
	{
		alert("Please enter Last Name");
		document.contactForm.f_name.focus();
	return false;
	
	}
	
	
	if(document.contactForm.gender.value == '')
	{
		alert("Please enter Gender");
		document.contactForm.gender.focus();
		return false;
	}
	
		if(document.contactForm.sel_countries.value == '')
	{
		alert("Please Select Countries");
		document.contactForm.sel_countries.focus();
		return false;
	}
		if(document.contactForm.sel_state.value == '')
	{
		alert("Please Select State");
		document.contactForm.sel_state.focus();
		return false;
	}
		if(document.contactForm.sel_city.value == '')
	{
		alert("Please Select City");
		document.contactForm.sel_city.focus();
		return false;
	}
	
	document.contactForm.action="process.php";
	return true;
}
    
	
	
	
	
    
	