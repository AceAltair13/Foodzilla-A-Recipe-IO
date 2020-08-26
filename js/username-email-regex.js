
function validate(thisform) {

    var username = thisform.inputUsername.value;
    var psw = thisform.inputPassword.value;
    var rpsw = thisform.reenterPassword.value;

    if(username.length < 6) {
        alert("Username should be atleast 6 characters long. Your input has " + username.length + " characters");
        thisform.inputUsername.focus();
        return false;
    }

    if(psw != rpsw) {
        alert("Password does not match!");
        thisform.reenterPassword.focus();
        return false;
    }

    if(psw.length < 6) {
        alert("Password should be atleast 6 characters long!");
        thisform.inputPassword.focus();
        return false;
    }
}