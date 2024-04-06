function  validateSignup(e){
    let fname = document.forms["Signupform"]["fname"].value;
    let lname = document.forms["Signupform"]["lname"].value;
    let email = document.forms["Signupform"]["email"].value;
    let password = document.forms["Signupform"]["password"].value;
    let spassword = document.forms["Signupform"]["spassword"].value;

    if (fname == "") {
        alert("First Name must be filled");
        event.preventDefault();
        } else if (!/^[a-zA-Z]+([' -][a-zA-Z]+)?$/.test(fname)) {
            alert("Please enter a valid first name");
            event.preventDefault();
        } else if (lname == "") {
            alert("Last Name must be filled");
            event.preventDefault();
        } else if (!/^[a-zA-Z]+([ '-][a-zA-Z]+)*/.test(lname)) {
            alert("Please enter a valid last name");
            event.preventDefault();
        } else if (email == "") {
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
        } else if (!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/.test(spassword)) {
            alert("Please enter a valid password");
            event.preventDefault();
        } else if (password !== spassword) {
            alert("Password does not match");
            event.preventDefault();
        } else {
            event.preventDefault();
            userSignup();
        }
}

function userSignup()
{
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function () {
        if (xhttp.status === 200) {
        document.location.href = "../login/login_view.php";
        }
    };

    xhttp.open("POST", "../actions/signup_action.php", true)

    xhttp.setRequestHeader("Content-type", "application/json");

    let signupData = {
        fname: document.getElementById("fname").value,
        lname: document.getElementById("lname").value,
        email: document.getElementById("email").value,
        password: document.getElementById("password").value,
    }

    let signup = JSON.stringify(signupData);

    xhttp.send(signup);

}

let logo = document.getElementById('plogo');
    logo.addEventListener('click', () => {
        window.location.href = "../index.php";
    });

    let title = document.getElementById('title');
    title.addEventListener('click', ()=> {
        window.location.href = "../index.php";
    })