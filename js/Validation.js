function ContactUsValidation(){
	if(document.Contact.Name.value==""){
		alert("Fill the text field");
		document.Contact.Name.focus;
		return false;
	}
	if(document.Contact.Email.value==""){
		alert("Fill the text field");
		document.Contact.Email.focus;
		return false;
	}
	if(document.Contact.Message.value==""){
		alert("Fill the text field");
		document.Contact.Message.focus;
		return false;
	}
	return true;
}

function LoginValidation(){
	if(document.Login.UName.value==""){
		alert("User Name can not be Empty");
		document.Login.UName.focus();
		return false
	}
	if(document.Login.Pass.value==""){
		alert("Password can not be Empty");
		document.Login.Pass.focus();
		return false;
	}
	return true;
}

function RegValidation(){
	if(document.Reg.FName.value==""){
		alert("Full Name can not be Empty");
		document.Reg.FName.focus();
		return false;
	}
	if(document.Reg.LName.value==""){
		alert("Full Name can not be Empty");
		document.Reg.LName.focus();
		return false;
	}
	if(document.Reg.UName.value==""){
		alert("User Name can not be Empty");
		document.Reg.UName.focus();
		return false;
	}
	if(document.Reg.Pass.value==""){
		alert("Password can not be Empty");
		document.Reg.Pass.focus();
		return false;
	}
	if(document.Reg.Email.value==""){
		alert("Email can not be Empty");
		document.Reg.Email.focus();
		return false;
	}
	if(/^\w+\*@\?\w+\*\w{2,3}\$/(document.Reg.Email.value)){
		alert("Email can be in @ or 2 characters");
		document.Reg.Email.focus();
		return false;
	}
	if(document.Reg.TpNo.value==""){
		alert("Telephone Number can not be Empty");
		document.Reg.TpNo.focus();
		return false;
	}
	if(document.Reg.Address.value==""){
		alert("Pay Pal ID can not be Empty");
		document.Reg.Address.focus();
		return false;
	}
	
	return true;
}