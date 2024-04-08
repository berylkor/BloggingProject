let email = document.forms["Loginform"]["email"];
let password = document.forms["Loginform"]["password"];

// show message when email field is clicked
email.onfocus = function()
{
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

    if (email == "") {
        alert("Email must be filled");
        event.preventDefault();
    } else if (!/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/.test(email)) {
        alert("Please enter a valid email address");
        event.preventDefault();
    } else if (password == "") {
        alert("Please enter a password");
        event.preventDefault();
    } else if (!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/.test(password)) {
        alert("Please enter a valid password");
        event.preventDefault();
    } 
    
}