function updateProfiles(){
    const updateName = document.update.username.value;
    const updateEmail = document.update.email.value;
    let updateAddress = document.getElementById("address").value
    const updatePass = document.update.newPass.value;
    
    localStorage.setItem("name", updateName);
    localStorage.setItem("email", updateEmail);
    localStorage.setItem("address", updateAddress)
    localStorage.setItem("password", updatePass);

    window.location.replace("./profile.html");
    return false;
}

function displayProfile(){
    const name_local = localStorage.getItem('name');
    document.getElementById('namaUser').innerHTML = name_local;
}

function removeCookie() {
        document.cookie = "session=-1";
}
