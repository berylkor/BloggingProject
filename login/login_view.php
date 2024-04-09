<?php
session_start();
if (isset($_SESSION['user_not_found'] ))
{
    // error message if the user data does much what is in the database
    echo '<script> alert("User not found") </script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/test.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/favicon_io/favicon.ico" type="image/x-icon">
    <link rel="manifest" href="../assets/favicon_io/site.webmanifest">
    <link rel="shortcut icon" href="../assets/favicon_io/favicon-16x16.png" type="image/png" sizes="16x16">
    <link rel="shortcut icon" href="../assets/favicon_io/favicon-32x32.png" type="image/png" sizes="32x32">
</head>
<body>
    <div class="grid_container">
        <!-- Page Header -->
        <div class="header_container">
            <!-- Blog Logo -->
            <img src="../assets/live.png" alt="Logo" width="100px" height="100px" id="plogo">
            <!-- Blog Name -->
            <h1 id="title">Live Actually</h1>
        </div>

        <!-- Page Content -->
        <div class="main_container">
            <div class="form_container">
                <form action="../actions/login_action.php" method="post" id="Loginform">
                    <!-- Login form title -->
                    <h2> Login </h2>
                    <!-- login fields -->
                    <div class="form_content">
                        <div class="form_field">
                            <!-- email entry -->
                            <div>
                                <label for="email">Email</label>
                                <div class="icon_box">
                                    <img src="../assets/mail.svg" alt="mail icon" width="26px" height="26px">
                                </div>
                            </div>
                            <input type="email" name="email" id="email" placeholder="Enter your email">
                        </div>
                        <div class="form_field">
                            <!-- password entry -->
                            <div>
                                <label for="password">Password</label>
                                <div class="icon_box">
                                    <img src="../assets/lock.svg" alt="lock icon" width="26px" height="26px">
                                </div>
                            </div>
                            <input type="password" name="password" id="password" placeholder="Enter your password">
                        </div>
                        <!-- link to the register page -->
                        <div class="action_link">
                            <p class="alink"> Don't have an account? <a href="../login/signup_view.php"> Sign up </a> </p>
                        </div>
                    </div>
                    <!-- button to submit -->
                    <div class="button_container">
                        <input type="submit" value="Login" id="login" name="login" onclick="return validateLogin()">
                    </div>
                </form>
            </div>
            <div id="message">
                <!-- message for validation -->
                <div id="email_message">
                    <h3 id="epresent" class="invalid">Email must be filled</h3>
                </div>
                <div id="pass_message">
                    <h3 id="ppresent" class="invalid">Password must be filled</h3>
                </div>
            </div>
        </div>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="../js/login.js"></script>
</html>