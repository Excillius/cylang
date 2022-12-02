function rot13(s) {
    return s.replace(/[a-zA-Z]/g, function (c) {
        return String.fromCharCode((c <= 'Z' ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c - 26);
    });
}

function base64(s){
    return btoa(s);
}

function toHex(s){
    let a = ""
    var len = s.length
    for(i=0;i<len;i++){
        a = a + s.charCodeAt(i).toString(16) + ' ';
    }
    return a
}

function toDecimal(s){
    let a = ""
    var len = s.length
    for(i=0;i<len;i++){
        a = a +  s.charCodeAt(i) + ' ';
    }
    return a
}

function encrypt(s, i) {
    if (i == "rot13"){
        return rot13(s);
    }
    else if (i == "base64"){
        return base64(s);
    }
    else if (i == "hexadecimal"){
        return toHex(s);
    }
    else if (i == "decimal"){
        return toDecimal(s);
    }
}


function update() {
    let input = document.getElementById('textbox-input').value
    let type = document.getElementById('type-crypt').value
    document.getElementById('textbox-output').value = encrypt(input, type);
}

function removeCookie() {
        document.cookie = "session=-1";
}
