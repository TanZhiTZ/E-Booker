/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */
console.log('Hellow this is a Javascript Code');

function welcome() {
    alert("Welcome to E ★ Booker");
}

function loginUser() {
    var p = document.getElementById("pass").value;
    var length = p.length;
    
     if (length <= 11) {
        alert("Password must be more than 12 characters");
        document.getElementById("loginToIndex").action = "";
        return;
    }
    
}

function savePass() { 
    var p = document.getElementById("password").value;
    var cp = document.getElementById("cpassword").value;
    var length = p.length;
    
    if (length <= 11) {
        alert("Password must be more than 12 characters");
        document.getElementById("registerToLogin").action = "";
        return;
    }
    if (p !== cp) {
        alert("Password does not match.");
        document.getElementById("registerToLogin").action = "";
        return;
    }
    
}

function showPass() {
    var x = document.getElementById("password");
    if (x.type == "password") {
        x.type = "text";
    }
    else {
        x.type = "password";
    }
}



