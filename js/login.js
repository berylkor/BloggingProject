let email = document.forms["Loginform"]["email"];
let password = document.forms["Loginform"]["password"];

// show message when email field is clicked
email.onfocus = function()
{
    // display the message for email while hiding the password message
    document.getElementById("message").style.display = "block";
    document.getElementById("email_message").style.display = "block";
    document.getElementById("pass_message").style.display = "none";
}

// hide message when email field is not active
email.onblur = function()
{
    document.getElementById("message").style.display = "none";
}

email.onkeyup = function()
{
    // validate length
    if(email.value.length >= 1)
    {
        epresent.classList.remove("invalid");
        epresent.classList.add("valid");  
    }
}

password.onfocus = function()
{
    // display the message for password while hiding the email message
    document.getElementById("message").style.display = "block";
    document.getElementById("email_message").style.display = "none";
    document.getElementById("pass_message").style.display = "block";
}

password.onblur = function()
{
    document.getElementById("message").style.display = "none";
}

password.onkeyup = function()
{
    // validate length
    if(password.value.length >= 1)
    {
        ppresent.classList.remove("invalid");
        ppresent.classList.add("valid");  
    }
}

function validateLogin(e){
    let email = document.forms["Loginform"]["email"].value;
    let password = document.forms["Loginform"]["password"].value;
    // validate fields when the login button is clicked
    if (email == "") {
        Swal.fire({
            title: "Email must be filled",
            icon: "warning",
        });
        event.preventDefault();
    } else if (!/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/.test(email)) {
        Swal.fire({
            title: "Incorrect Entry",
            text: "Please enter a valid email address",
            icon: "warning",
        });
        event.preventDefault();
    } else if (password == "") {
        Swal.fire({
            title: "Please enter a password",
            icon: "warning",
        });
        event.preventDefault();
    } else if (!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/.test(password)) {
        Swal.fire({
            title: "Incorrect Entry",
            text: "Please enter a valid password",
            icon: "warning",
        });
        event.preventDefault();
    } 
        else {
            Swal.fire({
                title: "Login Successful",
                icon: "success",
            });
        event.preventDefault();    
    }
    
}

let logo = document.getElementById('plogo');
logo.addEventListener('click', () => {
    window.location.href = "../index.php";
});

let title = document.getElementById('title');
title.addEventListener('click', ()=> {
    window.location.href = "../index.php";
});