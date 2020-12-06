
function validate() {

//var form = document.getElementById('form');
var fname = document.getElementById('fn').value;
var lname = document.getElementById('ln').value;
var pword = document.getElementById('pw').value;
var email = document.getElementById('em').value;


    if(fname === '' || fname == null){
        msg.push('Firstname is required!');
        e.preventDefault();
        errMsg.innerText = msg.join(', ');
        alert('Invalid');
        return false;

    }
    else if(alpha.test(fname)){
        msg.push('Firstname must be an alphanumeric[a-z,0-9,@-*]!');
        e.preventDefault();
        errorMsg.innerText = msg.join(', ');
        alert('Invalid');
        return false;
    }
    else if(lname === '' || lname == null){
        msg.push('Lastname is required!');
        e.preventDefault();
        errMsg.innerText = msg.join(', ');
        alert('Invalid');
        return false;  
    }
    else if(alpha.test(fname)){
        msg.push('Lastname must be an alphanumeric[a-z,0-9,@-*]!');
        e.preventDefault();
        errorMsg.innerText = msg.join(', ');
        alert('Invalid');
        return false;
    }
    else if(pword === '' || pword == null){
        msg.push('password is required!');
        e.preventDefault();
        errMsg.innerText = msg.join(', ');
        alert('Invalid');
        return false; 
    }
    else if(alpha.test(fname)){
        msg.push('password must be an alphanumeric[a-z,0-9,@-*]!');
        e.preventDefault();
        errorMsg.innerText = msg.join(', ');
        alert('Invalid');
        return false;
    }
    else if(email === '' || email == null){
        msg.push('email is required!');
        e.preventDefault();
        errMsg.innerText = msg.join(', ');
        alert('Invalid');
        return false;       
    }
    else{
        alert('Valid');
        return True;
    }
    
}




