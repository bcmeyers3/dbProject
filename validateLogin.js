function validateForm() {
	input = document.forms["signupForm"]["username"].value;
	input2 = document.forms["signupForm"]["passwordInput"].value;
		
	if (input === "") {
		document.getElementById("usernameError").style.color = 'red';
		alert("Username can not be blank.");
		return false;
	} else if (input2 === "") {
		document.getElementById("usernameError").style.color = 'red';
		alert("Password must be at least 4 characters long.");
		return false;
	} else {
		document.getElementById("passwordErrorLabel").style.color = 'black';
	}	
	alert("Sucessful");
		
	return true;
}