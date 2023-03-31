//Kiem tra username
function ValidateID() {
    var user = document.getElementById("username").value;
    var pattern = /^[a-zA-Z0-9_]{6,20}$/;
    var strError = "Only letters, numbers, underscore and at least 6 character long is allowed!";
    if (!pattern.test(user)) { document.getElementById("v-user").innerHTML = "<font color=\"\#f44336\">" + strError + "</font>"; } else { document.getElementById("v-user").innerHTML = "" };
}
//Kiem tra email
function ValidateMail() {
    var email = document.getElementById("email").value;
    var pattern = /^[A-Za-z][\w$.]+@[\w]+\.\w+$/;
    var strError = "Invalid email format!";
    if (!pattern.test(email)) { document.getElementById("v-email").innerHTML = "<font color=\"\#f44336\">" + strError + "</font>"; } else { document.getElementById("v-email").innerHTML = "" };
}
//Kiem tra mat khau
function ValidatePwd() {
    var pwd = document.getElementById("password").value;
    var pattern = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/;
    var strError = "Password must contains at least one capitalize letters, number and special character!";
    if (!pattern.test(pwd)) { document.getElementById("v-pwd").innerHTML = "<font color=\"\#f44336\">" + strError + "</font>"; } else { document.getElementById("v-pwd").innerHTML = "" };
}
//Xac nhan lai mat khau
function ValidateRePwd() {
    var pwd = document.getElementById("password").value;
    var repwd = document.getElementById("comfirm_password").value;
    var strError = "Password does not match!";
    if (pwd != repwd) { document.getElementById("v-repwd").innerHTML = "<font color=\"\#f44336\">" + strError + "</font>"; } else { document.getElementById("v-repwd").innerHTML = "" };
}
//Kiem tra checkbox
function ValidateCB() {
    var cb = document.querySelector('.form-check-input').checked;
    var strError = "You must agree before submitting.";
    if (!cb) { document.getElementById("v-terms").innerHTML = "<font color=\"\#f44336\">" + strError + "</font>"; } else { document.getElementById("v-terms").innerHTML = "" };
}