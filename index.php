<?php
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/test.css">
</head>
<body>
    <div class="grid_container">
        <!-- page header -->
        <div class="hheader_container">
            <div class="com_info">
                <!-- blog logo -->
                <img src="assets/live.png" alt="Logo" width="100px" height="100px" id="plogo">
                <!-- blog title -->
                <h1 id="title">Live Actually</h1>
            </div>

            <div class="action_buttons">
                <div>
                    <!-- login button -->
                    <button class="action_btn" id="loginbtn"> Login </button>
                </div>
                <div>
                    <!-- signup button -->
                    <button class="action_btn" id="signupbtn"> Sign up </button>
                </div>
            </div>
        </div>

        <!-- page content -->
        <div class="hmain_container">
            <div class="widget_container">
                <div class="widget">
                    <div class="widget_text">
                       <h1>Where Imagination Takes Flight</h1>
                        <p>A haven for writers and storytellers to share their voices and ignite inspiration.</p>
                    </div>
                    <img src="assets/girl.svg" alt="girl" width="250px" height="250px">
                </div>
                
                
            </div>
            <div class="text_container">
                <h2> Take a look at what people are saying </h2>
            </div>
            <div class="button">
                <button class="action_btn" id=combtn> Visit our Community Today </button>
            </div>
        </div>
    </div>
</body>
<script>
    let login = document.getElementById('loginbtn');
    login.addEventListener('click', () => {
        window.location.href = "login/login_view.php";
    });

    let signup = document.getElementById('signupbtn');
    signup.addEventListener('click', ()=> {
        window.location.href = "login/signup_view.php";
    })

    let btn = document.getElementById('combtn');
    btn.addEventListener('click', () =>{
        window.location.href = "view/community_view.php";
    })
</script>
</html>