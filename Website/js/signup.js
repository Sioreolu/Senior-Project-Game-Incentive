// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var frmvalidator = new Validator("id01");
	frmvalidator.EnableOnPageErrorDisplay();
	frmvalidator.EnableMsgsTogether();

	frmvalidator.addValidation("fname","req","Please enter your First Name");
	frmvalidator.addValidation("fname","maxlen=30","Max length for FirstName is 20");
	frmvalidator.addValidation("lname","req");
	frmvalidator.addValidation("lname","maxlen=30");
	frmvalidator.addValidation("email","req");
	frmvalidator.addValidation("email","maxlen=255");
	frmvalidator.addValidation("Email","email");
	frmvalidator.addValidation("usr","req");
	frmvalidator.addValidation("usr","maxlen=30");
	frmvalidator.addValidation("psw","req");
	frmvalidator.addValidation("psw","maxlen=50");
	frmvalidator.addValidation("psw-repeat","req");
	frmvalidator.addValidation("psw-repeat","maxlen=30");

