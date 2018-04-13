// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

//Ensure Two Fields are the same -- Case Sensitive
function BothFieldsIdenticalCaseSensitive() {
var one = document.FormName.FieldA.value;
var another = document.FormName.FieldB.value;
if(one == another) { return true; }
alert("Oops, both fields must be identical.");
return false;
}

//Ensure Two Fields are the same -- Case Insensitive
function BothFieldsIdenticalCaseInsensitive() {
var one = document.form1.psw.value.toLowerCase();
var another = document.form1.psw-repeat.value.toLowerCase();
if(one == another) { return true; }
alert("Oops, both fields must be identical.");
return false;
}



