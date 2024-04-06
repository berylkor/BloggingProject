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