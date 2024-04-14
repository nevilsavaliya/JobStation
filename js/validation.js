//hide/show password
function hideShowPassword() {
	var pass = document.getElementById("pass");
	if (pass.type === "password")
		pass.type = "text";
	else
		pass.type = "password";
}

// client-side validation

// registration validation

// validating firstname
function fnF() {
	document.getElementById("fnV").innerHTML = "";
	document.getElementById("fn").style.boxShadow = "";
	document.getElementById("fnMsg1").innerHTML = "2-20 characters";
	document.getElementById("fnMsg2").innerHTML = "Only alphabets";
}
function fnB() {
	document.getElementById("fnMsg1").innerHTML = "";
	document.getElementById("fnMsg2").innerHTML = "";
}
function fn1() {
	var fnVal = document.getElementById("fn").value;
	if (fnVal.length < 2 || fnVal.length > 20) {
		document.getElementById("fnMsg1").style.color = "red";
		return false;
	} else {
		document.getElementById("fnMsg1").style.color = "green";
		return true;
	}
}
function fn2() {
	var fnVal = document.getElementById("fn").value;
	if (/^[a-zA-Z]+(?: [a-zA-Z]+)*$/.test(fnVal)) {
		document.getElementById("fnMsg2").style.color = "green";
		return true;
	} else {
		document.getElementById("fnMsg2").style.color = "red";
		return false;
	}
}
function fn3() {
	var fnVal = document.getElementById("fn").value;
	if (fnVal != "" && fn1() && fn2()) {
		document.getElementById("fnV").innerHTML = "";
		document.getElementById("fn").style.boxShadow = "";
		return true;
	} else {
		document.getElementById("fnV").innerHTML = "Enter a valid name";
		document.getElementById("fn").style.boxShadow = "0px 0px 1px 2px red";
		return false;
	}
}
function fnCheck() {
	fn1();
	fn2();
}

// validating lastname
function lnF() {
	document.getElementById("lnV").innerHTML = "";
	document.getElementById("ln").style.boxShadow = "";
	document.getElementById("lnMsg1").innerHTML = "2-20 characters";
	document.getElementById("lnMsg2").innerHTML = "Only alphabets";
}
function lnB() {
	document.getElementById("lnMsg1").innerHTML = "";
	document.getElementById("lnMsg2").innerHTML = "";
}
function ln1() {
	var lnVal = document.getElementById("ln").value;
	if (lnVal.length < 2 || lnVal.length > 20) {
		document.getElementById("lnMsg1").style.color = "red";
		return false;
	} else {
		document.getElementById("lnMsg1").style.color = "green";
		return true;
	}
}
function ln2() {
	var lnVal = document.getElementById("ln").value;
	if (/^[a-zA-Z]+$/.test(lnVal)) {
		document.getElementById("lnMsg2").style.color = "green";
		return true;
	} else {
		document.getElementById("lnMsg2").style.color = "red";
		return false;
	}
}
function ln3() {
	var lnVal = document.getElementById("ln").value;
	if (lnVal != "" && ln1() && ln2()) {
		document.getElementById("lnV").innerHTML = "";
		document.getElementById("ln").style.boxShadow = "";
		return true;
	} else {
		document.getElementById("lnV").innerHTML = "Enter a valid last name";
		document.getElementById("ln").style.boxShadow = "0px 0px 1px 2px red";
		return false;
	}
}
function lnCheck() {
	ln1();
	ln2();
}

// email validation
function emailF() {
	document.getElementById("emailV").innerHTML = "";
	document.getElementById("email").style.boxShadow = "";
	document.getElementById("emailMsg").innerHTML = "Valid email address";
}
function emailB() {
	document.getElementById("emailMsg").innerHTML = "";
}
function emailCheck() {
	var emailVal = document.getElementById("email").value;
	if (/^[a-z][a-z0-9]+@(gmail|outlook|hotmail|yahoo|icloud|utu)[.](com|in)$/.test(emailVal)) {
		document.getElementById("emailMsg").style.color = "green";
		return true;
	} else {
		document.getElementById("emailMsg").style.color = "red";
		return false;
	}
}
function email2() {
	var emailVal = document.getElementById("email").value;
	if (emailVal != "" && emailCheck()) {
		document.getElementById("emailV").innerHTML = "";
		document.getElementById("email").style.boxShadow = "";
		return true;
	} else {
		document.getElementById("emailV").innerHTML = "Enter a valid email address";
		document.getElementById("email").style.boxShadow = "0px 0px 1px 2px red";
		return false;
	}
}


// mobile validation
function mobileF() {
	document.getElementById("mobileV").innerHTML = "";
	document.getElementById("mobile").style.boxShadow = "";
	document.getElementById("mobileMsg").innerHTML = "Must contain 10 digits";
}
function mobileB() {
	document.getElementById("mobileMsg").innerHTML = "";
}
function mobileCheck() {
	var mobileVal = document.getElementById("mobile").value;
	if (/^[6-9][0-9]{9}$/.test(mobileVal)) {
		document.getElementById("mobileMsg").style.color = "green";
		return true;
	} else {
		document.getElementById("mobileMsg").style.color = "red";
		return false;
	}
}
function mobile2() {
	var mobileVal = document.getElementById("mobile").value;
	if (mobileVal != "" && mobileCheck()) {
		document.getElementById("mobileV").innerHTML = "";
		document.getElementById("mobile").style.boxShadow = "";
		return true;
	} else {
		document.getElementById("mobileV").innerHTML = "Enter a valid mobile number";
		document.getElementById("mobile").style.boxShadow = "0px 0px 1px 2px red";
		return false;
	}
}

// birthdate validation
function dobF() {
	document.getElementById("dob").style.boxShadow = "";
}
function dobCheck() {
	var dobVal = document.getElementById("dob").value;
	if (dobVal != "") {
		document.getElementById("dob").style.boxShadow = "";
		return true;
	} else {
		document.getElementById("dob").style.boxShadow = "0px 0px 1px 2px red";
		return false;
	}
}


// password validation
function passF() {
	document.getElementById("passV").innerHTML = "";
	document.getElementById("pass").style.boxShadow = "";
	document.getElementById("passMsg1").innerHTML = "8-15 case sensitive characters";
	document.getElementById("passMsg2").innerHTML = "Atleast one small alphabet";
	document.getElementById("passMsg3").innerHTML = "Atleast one capital alphabet";
	document.getElementById("passMsg4").innerHTML = "Atleast one number";
}

function passB() {
	document.getElementById("passMsg1").innerHTML = "";
	document.getElementById("passMsg2").innerHTML = "";
	document.getElementById("passMsg3").innerHTML = "";
	document.getElementById("passMsg4").innerHTML = "";
}
function pass1() {
	var passVal = document.getElementById("pass").value;
	if (passVal.length < 8 || passVal.length > 15) {
		document.getElementById("passMsg1").style.color = "red";
		return false;
	} else {
		document.getElementById("passMsg1").style.color = "green";
		return true;
	}
}
function pass2() {
	var passVal = document.getElementById("pass").value;
	if (/[a-z]/.test(passVal)) {
		document.getElementById("passMsg2").style.color = "green";
		return true;
	} else {
		document.getElementById("passMsg2").style.color = "red";
		return false;
	}
}
function pass3() {
	var passVal = document.getElementById("pass").value;
	if (/[A-Z]/.test(passVal)) {
		document.getElementById("passMsg3").style.color = "green";
		return true;
	} else {
		document.getElementById("passMsg3").style.color = "red";
		return false;
	}
}
function pass4() {
	var passVal = document.getElementById("pass").value;
	if (/[0-9]/.test(passVal)) {
		document.getElementById("passMsg4").style.color = "green";
		return true;
	} else {
		document.getElementById("passMsg4").style.color = "red";
		return false;
	}
}
function pass5() {
	var passVal = document.getElementById("pass").value;
	if (passVal != "" && pass1() && pass2() && pass3() && pass4()) {
		document.getElementById("passV").innerHTML = "";
		document.getElementById("pass").style.boxShadow = "";
		return true;
	} else {
		document.getElementById("passV").innerHTML = "Enter a valid password";
		document.getElementById("pass").style.boxShadow = "0px 0px 1px 2px red";
		return false;
	}
}
function passCheck() {
	const passArray = [pass1(), pass2(), pass3(), pass4()];
	for (var i = 0; i < 4; i++)
		passArray[i];
}


function conPassF() {
	document.getElementById("conPassV").innerHTML = "";
	document.getElementById("conPass").style.boxShadow = "";
	document.getElementById("conPassMsg").innerHTML = "Password & confirm password must match"
}

function conPassB() {
	document.getElementById("conPassMsg").innerHTML = "";
}

function conPass1() {
	var passVal = document.getElementById("pass").value;
	var conPassVal = document.getElementById("conPass").value;
	if (passVal != conPassVal) {
		document.getElementById("conPassMsg").style.color = "red";
		return false;
	} else {
		document.getElementById("conPassMsg").style.color = "green";
		return true;
	}
}

function conPassCheck() {
	var conPassVal = document.getElementById("conPass").value;
	if (passVal != conPassVal) {
		document.getElementById("conPassV").innerHTML = "";
		document.getElementById("conPass").style.boxShadow = "";
		return true;
	} else {
		document.getElementById("conPassV").innerHTML = "Password & confirm password must match";
		document.getElementById("conPass").style.boxShadow = "0px 0px 1px 2px red";
		return false;
	}
}


// otp
function otpF() {
	document.getElementById("otpV").innerHTML = "";
	document.getElementById("otp").style.boxShadow = "";
	document.getElementById("otpMsg").innerHTML = "OTP must contain 6 digits";
}
function otpB() {
	document.getElementById("otpMsg").innerHTML = "";
}
function otpCheck() {
	var otpVal = document.getElementById("otp").value;
	if (/^[0-9]{6}$/.test(otpVal)) {
		document.getElementById("otpMsg").style.color = "green";
		return true;
	} else {
		document.getElementById("otpMsg").style.color = "red";
		return false;
	}
}
function otp2() {
	var otpVal = document.getElementById("otp").value;
	if (otpVal != "" && otpCheck()) {
		document.getElementById("otpV").innerHTML = "";
		document.getElementById("otp").style.boxShadow = "";
		return true;
	} else {
		document.getElementById("otpV").innerHTML = "Enter a valid OTP";
		document.getElementById("otp").style.boxShadow = "0px 0px 1px 2px red";
		return false;
	}
}


// check terms & conditions is checked or not
// function checkTNC() {
	
// 	if (document.getElementById("agree").checked == false) {
// 		alert("Please agree to the terms and conditions");
// 		return false;
// 	} else
// 		return true;
// }

//checking the values are null or not
function nullCheck() {
	var fn = fn3();
//	var ln = ln3();
	var email = email2();
//	var mobile = mobile2();
//	var dob = dobCheck();
	var pass = pass5();
	// if (fn && ln && email && mobile && dob && pass && otp && checkTNC())
	if (fn && email && pass)
		return true;
	else
		return false;
}


// login validation----------------------

// email validation
function loginEmailCheck() {
	var lEmailVal = document.getElementById("lEmail").value;
	if (lEmailVal != "") {
		document.getElementById("lEmailV").innerHTML = "";
		document.getElementById("lEmail").style.boxShadow = "";
		return true;
	}
	else {
		document.getElementById("lEmailV").innerHTML = "Enter a valid email";
		document.getElementById("lEmail").style.boxShadow = "0px 0px 1px 2px red";
		return false;
	}

}
function loginEmail2() {
	var emailVal = document.getElementById("lEmail").value;
	if (emailVal == "" || !/[a-z][a-z0-9]+@(gmail|outlook|hotmail|yahoo|icloud|utu)[.](com|in)/.test(emailVal)) {
		document.getElementById("lEmailV").innerHTML = "Enter a valid email";
		document.getElementById("lEmail").style.boxShadow = "0px 0px 1px 2px red";
		return false;
	} else
		return true;
}

// password validation
function loginPassCheck() {
	var lPassVal = document.getElementById("lPass").value;
	if (lPassVal != "") {
		document.getElementById("lPassV").innerHTML = "";
		document.getElementById("lPass").style.boxShadow = "";
		return true;
	}
	else {
		document.getElementById("lPassV").innerHTML = "Enter a valid password";
		document.getElementById("lPass").style.boxShadow = "0px 0px 1px 2px red";
		return false;
	}
}
function loginPass2() {
	var lPassVal = document.getElementById("lPass").value;
	// if (lPassVal == "" || lPassVal.length < 8 || lPassVal.length > 15 || !/[a-z]/.test(lPassVal) || !/[A-Z]/.test(lPassVal) || !/[0-9]/.test(lPassVal)) {
	// 	document.getElementById("lPassV").innerHTML = "Enter a valid Password";
	// 	document.getElementById("lPass").style.boxShadow = "0px 0px 1px 2px red";
	// 	return false;
	if (lPassVal == "" || lPassVal.length < 8 || lPassVal.length > 15){
		document.getElementById("lPassV").innerHTML = "Enter a valid Password";
			document.getElementById("lPass").style.boxShadow = "0px 0px 1px 2px red";
			return false;

		} else
		return true;
}

//checking the values are null or not
function loginNullCheck() {
	var email = loginEmail2();
	var pass = loginPass2();
	if (email && pass)
		return true;
	else
		return false;
}