function validateForm() {
	input = document.forms["signupForm"]["passwordInput"].value;
	input2 = document.forms["signupForm"]["retypepassword"].value;
		
	if (input === "") {
		document.getElementById("passwordErrorLabel").style.color = 'red';
		alert("Password can not be blank.");
		return false;
	} else if (input.length < 4) {
		document.getElementById("passwordErrorLabel").style.color = 'red';
		alert("Password must be at least 4 characters long.");
		return false;
	} else if (input !== input2) {
		document.getElementById("passwordErrorLabel").style.color = 'red';
		alert("Passwords do not match");
		return false;
	} else {
		document.getElementById("passwordErrorLabel").style.color = 'black';
	}	
	alert("Sucessful");
		
	return true;
}