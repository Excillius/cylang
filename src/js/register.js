function validateForm(){
    let validateName = document.register.username.value;
    if (validateName.length <= 0) {
      alert("Name must be filled out");
      return false;
    }
  
    let validateEmail = document.register.email.value;
    let firstValidation = validateEmail.indexOf("@");
    let secondValidation = validateEmail.indexOf(".");

    if (firstValidation < 1 || secondValidation < 1 || secondValidation === validateEmail.length - 1){
      alert("Email is not valid");
      return false;
    }

    let password1 = document.register.pass1.value;
    let password2 = document.register.pass2.value;
    if (password1.length <= 0 ){
        alert("Password must be filled out");
        return false;
    }

    else if (password2.length <= 0){
        alert("Retype password must be filled out");
        return false;
    }

    if (password1 != password2){
        alert("Passwords do not match");
        return false;
    }
}

