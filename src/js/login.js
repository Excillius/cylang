function validateForm(){
    let validateEmail = document.login.email.value;
    let firstValidation = validateEmail.indexOf("@");
    let secondValidation = validateEmail.indexOf(".");
  
    if (firstValidation < 1 || secondValidation < 1 || secondValidation === validateEmail.length - 1){
      alert("Email is not valid");
      return false;
    }

    let password = document.login.password.value;
    if (password.length <= 0 ){
        alert("Password must be filled out");
        return false;
    }
}