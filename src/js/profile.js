function displayProfile(){
    
    document.getElementById("emailUser").innerHTML = "<?php echo $email; ?>";
    document.getElementById('namaUser').innerHTML = name_local;
    document.getElementById('emailUser').innerHTML = email_local;
    document.getElementById('addressUser').innerHTML = address_local;
}

function removeCookie() {
        document.cookie = "session=-1";
}
