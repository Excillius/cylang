function removeCookie() {
        document.cookie = "session=-1";
}

function rot13(s) {
    return s.replace(/[a-zA-Z]/g, function (c) {
        return String.fromCharCode((c <= 'Z' ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c - 26);
    });
}

function base64(s){
    return atob(s);
}

function fromHex(s){
    var hex = s.toString();
    var hex = hex.replace(/\s+/g, '')
    var len = hex.length;
    let a = "";
    for (var i=0;i<len;i+=2){
        if (hex.substr(i, 1) != " ")
        a = a + String.fromCharCode(parseInt(hex.substr(i, 2), 16));
    }
    return a
}

function fromDecimal(s){
    var dec = s.toString();
    var dec = dec.split(' ');
    var len = dec.length;
    let a = "";
    for(var i=0;i<len; i++){ 
        a = a + String.fromCharCode(parseInt(dec[i]));
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
        return fromHex(s);
    }
    else if (i == "decimal"){
        return fromDecimal(s);
    }
    else if (i =="massive"){
        return massive(s);
    }
    else if (i =="massive"){
        return massive(s);
    }
}


function update() {
    let input = document.getElementById('textbox-input').value
    let type = document.getElementById('type-crypt').value
    document.getElementById('textbox-output').value = encrypt(input, type);
}
