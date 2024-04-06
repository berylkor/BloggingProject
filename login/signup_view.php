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
                        <input type="button" value="Sign up" id="signup" name="signup" onclick="return validateSignup()">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
<script>
    let logo = document.getElementById('plogo');
    logo.addEventListener('click', () => {
        window.location.href = "../index.php";
    });

    let title = document.getElementById('title');
    title.addEventListener('click', ()=> {
        window.location.href = "../index.php";
    })
</script>
<script src="../js/signup.js"></script>
</html>