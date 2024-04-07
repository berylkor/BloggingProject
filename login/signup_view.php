<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="../css/test.css">
</head>
<body>
    <div class="grid_container">
        <!-- Page Header -->
        <div class="header_container">
            <!-- Blog Logo -->
            <img src="../assets/live.png" alt="Logo" width="100px" height="100px" id="plogo">
            <!-- Blog Name -->
            <h1 id="title"> Live Actually</h1>
        </div>
   

        <div class="main_container">
            <!-- Page content -->
            <div class="form_container">
                <form action="" id="Signupform">
                    <!-- Signup form title -->
                    <h2 id= "signuptext"> Sign up </h2>
                    <!-- sign up fields -->
                    <div class="sform_content">
                        <div class="form_field">
                            <!-- first name entry -->
                            <div>
                                <label for="fname">First Name</label>
                                <div class="icon_box">
                                    <img src="../assets/person.svg" alt="profile icon" width="26px" height="26px">
                                </div>
                            </div>
                            <input type="text" name="fname" id="fname" placeholder="Enter your first name">
                        </div>
                            <!-- last name entry -->
                            <div class="form_field">
                                <div>
                                    <label for="lname">Last Name</label>
                                    <div class="icon_box">
                                        <img src="../assets/person.svg" alt="profile icon" width="26px" height="26px">
                                    </div>
                                </div>
                                <input type="text" name="lname" id="lname" placeholder="Enter your last name">
                            </div>

                            <!-- Email entry -->
                            <div class="form_field">
                                <div>
                                    <label for="email">Email</label>
                                    <div class="icon_box">
                                        <img src="../assets/mail.svg" alt="mail icon" width="26px" height="26px">
                                    </div>
                                </div>
                                <input type="email" name="email" id="email" placeholder="Enter your email">
                            </div>

                            <!-- Password entry -->
                            <div class="form_field">
                                <div>
                                    <label for="password">Password</label>
                                    <div class="icon_box">
                                        <img src="../assets/lock.svg" alt="lock icon" width="26px" height="26px">
                                    </div>
                                </div>
                                <input type="password" name="password" id="password" placeholder="Enter your password (Abcd@12345)">
                            </div>
                            
                            <!-- Password re-entry -->
                            <div class="form_field">
                                <div>
                                    <label for="password">Confirm Password</label>
                                    <div class="icon_box">
                                        <img src="../assets/lock.svg" alt="lock icon" width="26px" height="26px">
                                    </div>
                                </div>
                                <input type="password" name="spassword" id="spassword" placeholder="Re-enter your password (Abcd@12345)">
                            </div>

                            <!-- link to the register page -->
                            <div class="action_link">
                                <p class="alink"> Already have an account? <a href="../login/login_view.php"> Login </a> </p>
                            </div>
                    </div>
                    <!-- button to submit -->
                    <div class="button_container">
                        <input type="button" value="Sign up" id="signup" name="signup" onclick="usersignup()">
                    </div>
                </form>
                </div>
                <div id="message">
                            <div id="name_message">
                                <h3 id="fname_title">First Name must contain the following:</h3>
                                <h3 id="lname_title">Last Name must contain the following:</h3>
                                <p id="present" class="invalid"> <b> Minimum </b> 1 letter </p>
                                <p id="upperlower" class="invalid"> <b>Upper or lowercase</b> letters</p>   
                            </div>
                            <div id="email_message">
                                <h3>Email must contain the following:</h3>
                                <p id="epresent" class="invalid"> <b> Minimum </b> 1 letter </p>
                                <p id="atpresent" class="invalid"> <b> @ </b> sign </p>
                            </div>
                            <div id="pass_message">
                                <h3>Password must contain the following:</h3>
                                <p id="lower" class="invalid">A <b>lowercase</b> letter</p>
                                <p id="upper" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                <p id="val_number" class="invalid">A <b>number</b></p>
                                <p id="val_length" class="invalid">Minimum <b>8 characters</b></p>
                            </div>
                            <div id="conpass_message">
                                <h3> Confirm Password:</h3>
                                <p id="cpresent" class="invalid"> Minimum <b>8 characters</b> </p>
                                <p id="match" class="invalid"> Match password </p>
                            </div>
            </div>
        </div>
    </div>
    
</body>
<script>
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

function usersignup()
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
</script>
<!-- <script src="../js/signup.js"></script> -->

</html>