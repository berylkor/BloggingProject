    // redirect to home when the logo and title are clicked
    let logo = document.getElementById('plogo');
    logo.addEventListener('click', () => {
        window.location.href = "../index.php";
    });

    let title = document.getElementById('title');
    title.addEventListener('click', ()=> {
        window.location.href = "../index.php";
    })

    // variables to store ids for sign up fields
    let fname = document.forms["Signupform"]["fname"];
    let lname = document.forms["Signupform"]["lname"];
    let email = document.forms["Signupform"]["email"];
    let password = document.forms["Signupform"]["password"];
    let spassword = document.forms["Signupform"]["spassword"];

    // variables to store id for validation message
    let upper = document.getElementById("upper");
    let lower = document.getElementById("lower");
    let number = document.getElementById("val_number");
    let length = document.getElementById("val_length");
    let present = document.getElementById("present");
    let upperlower = document.getElementById("upperlower");
    let atpresent = document.getElementById("atpresent");
    let epresent = document.getElementById("epresent");
    let cpresent = document.getElementById("cpresent");
    let match = document.getElementById("match");

    // show message when first name field is clicked
    fname.onfocus = function()
    {
        document.getElementById("message").style.display = "block";
        document.getElementById("pass_message").style.display = "none";
        document.getElementById("fname_title").style.display = "block";
        document.getElementById("lname_title").style.display = "none";
        document.getElementById("name_message").style.display = "block";
        document.getElementById("email_message").style.display = "none";
        document.getElementById("conpass_message").style.display = "none";
    }

    // hide message when first name field is not active
    fname.onblur = function()
    {
        document.getElementById("message").style.display = "none";
    }

    fname.onkeyup = function()
    {
        // validate lower or upper case
        var valupperlower = /[a-zA-Z]/g;
        if(fname.value.match(valupperlower))
        {
            upperlower.classList.remove("invalid");
            upperlower.classList.add("valid");
        }else
        {
            upperlower.classList.remove("valid");
            upperlower.classList.add("invalid");
        }

        // validate length
        if(fname.value.length >= 1)
        {
            present.classList.remove("invalid");
            present.classList.add("valid");  
        }
        else
        {
            present.classList.remove("valid");
            present.classList.add("invalid");
        }
    }

    // show message when last name field is clicked
    lname.onfocus = function()
    {
        document.getElementById("message").style.display = "block";
        document.getElementById("pass_message").style.display = "none";
        document.getElementById("fname_title").style.display = "none";
        document.getElementById("lname_title").style.display = "block";
        document.getElementById("name_message").style.display = "block";
        document.getElementById("email_message").style.display = "none";
        document.getElementById("conpass_message").style.display = "none";
    }

    // hide message when last name field is not active
    lname.onblur = function()
    {
        document.getElementById("message").style.display = "none";
    }

    lname.onkeyup = function()
    {
        // validate lower or upper case
        var valupperlower = /[a-zA-Z]/g;
        if(lname.value.match(valupperlower))
        {
            upperlower.classList.remove("invalid");
            upperlower.classList.add("valid");
        }else
        {
            upperlower.classList.remove("valid");
            upperlower.classList.add("invalid");
        }

        // validate length
        if(lname.value.length >= 1)
        {
            present.classList.remove("invalid");
            present.classList.add("valid");  
        }
        else
        {
            present.classList.remove("valid");
            present.classList.add("invalid");
        }
    }

    // show message when email field is clicked
    email.onfocus = function()
    {
        document.getElementById("message").style.display = "block";
        document.getElementById("pass_message").style.display = "none";
        document.getElementById("name_message").style.display = "none";
        document.getElementById("email_message").style.display = "block";
        document.getElementById("conpass_message").style.display = "none";
    }

    // hide message when email field is not active
    email.onblur = function()
    {
        document.getElementById("message").style.display = "none";
    }

    email.onkeyup = function()
    {
        // validate at sign 
        var valatsign = /@/;
        if(email.value.match(valatsign))
        {
            atpresent.classList.remove("invalid");
            atpresent.classList.add("valid");
        }else
        {
            atpresent.classList.remove("valid");
            atpresent.classList.add("invalid");
        }

        // validate length
        if(email.value.length >= 1)
        {
            epresent.classList.remove("invalid");
            epresent.classList.add("valid");  
        }
        else
        {
            epresent.classList.remove("valid");
            epresent.classList.add("invalid");
        }
    }

    // show message when password field is clicked
    password.onfocus = function()
    {
        document.getElementById("message").style.display = "block";
        document.getElementById("pass_message").style.display = "block";
        document.getElementById("name_message").style.display = "none";
        document.getElementById("email_message").style.display = "none";
        document.getElementById("conpass_message").style.display = "none";
    }

    // hide message when the password field is not active
    password.onblur = function()
    {
        document.getElementById("message").style.display = "none";
        document.getElementById("pass_message").style.display = "none";
    }

    password.onkeyup = function()
    {
        // validate lower case
        var valLower = /[a-z]/g;
        if(password.value.match(valLower))
        {
            lower.classList.remove("invalid");
            lower.classList.add("valid");
        }else
        {
            lower.classList.remove("valid");
            lower.classList.add("invalid");
        }

        // validate upper case
        var valUpper = /[A-Z]/g;
        if(password.value.match(valUpper))
        {
            upper.classList.remove("invalid");
            upper.classList.add("valid");
        }else
        {
            upper.classList.remove("valid");
            upper.classList.add("invalid");
        }

        // validate numbers
        var valNumber = /[0-9]/g;
        if(password.value.match(valNumber))
        {
            number.classList.remove("invalid");
            number.classList.add("valid");
        }else
        {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // validate length
        if(password.value.length >= 8)
        {
            length.classList.remove("invalid");
            length.classList.add("valid");  
        }
        else
        {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }

    // show message when password field is clicked
    spassword.onfocus = function()
    {
         document.getElementById("message").style.display = "block";
         document.getElementById("pass_message").style.display = "none";
         document.getElementById("name_message").style.display = "none";
         document.getElementById("email_message").style.display = "none";
         document.getElementById("conpass_message").style.display = "block";
    }
 
    // hide message when the password field is not active
    spassword.onblur = function()
    {
         document.getElementById("message").style.display = "none";
         document.getElementById("conpass_message").style.display = "none";
    }
 
    spassword.onkeyup = function()
    {
        // validate length
        if(spassword.value.length >= 8)
        {
            cpresent.classList.remove("invalid");
            cpresent.classList.add("valid");  
        }
        else
        {
            cpresent.classList.remove("valid");
            cpresent.classList.add("invalid");
        }
        
        if(spassword.value.match(password))
        {
            match.classList.remove("invalid");
            match.classList.add("valid");
        }else
        {
            match.classList.remove("valid");
            match.classList.add("invalid");
        }
    }


    function validatesignup()
    {
        // function for validating the sign up form
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
            usersignup();
        }
}


function usersignup()
{
    // create a new request object
    const xhttp = new XMLHttpRequest();

    // function to direct to the login page after the request is sent
    xhttp.onload = function () {
        if (xhttp.status === 200) {
        document.location.href = "../login/login_view.php";
        }
    };

    // initiate a method for post request to signup action
    xhttp.open("POST", "../actions/signup_action.php", true)

    // submit data
    xhttp.setRequestHeader("Content-type", "application/json");

    // data to be sent 
    let signupData = {
        fname: document.getElementById("fname").value,
        lname: document.getElementById("lname").value,
        email: document.getElementById("email").value,
        password: document.getElementById("password").value,
    }

    // convert data to JSON
    let signup = JSON.stringify(signupData);

    // send the data
    xhttp.send(signup);

}