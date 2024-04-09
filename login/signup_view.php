<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="../css/test.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/favicon_io/favicon.ico" type="image/x-icon">
    <link rel="manifest" href="../assets/favicon_io/site.webmanifest">
    <link rel="shortcut icon" href="../assets/favicon_io/favicon-16x16.png" type="image/png" sizes="16x16">
    <link rel="shortcut icon" href="../assets/favicon_io/favicon-32x32.png" type="image/png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="../assests/favicon_io/apple-touch-icon.png">
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
                        <input type="button" value="Sign up" id="signup" name="signup" onclick="validatesignup()">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="../js/signup.js"></script>

</html>