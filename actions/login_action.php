<?php
    session_start();
    include "../settings/connection.php";

    if (isset($_POST['login']))
    {
        // collect data from the login form 
        $email = mysqli_real_escape_string($CON, $_POST['email']);
        $password = mysqli_real_escape_string($CON, $_POST['password']);

        // select details from the user where the email matches
        $selectuser = "SELECT * FROM Users WHERE Email = '$email'";
        $selectuser_sql = mysqli_query($CON, $selectuser);

        // fetch the results
        $userdata = mysqli_fetch_all($selectuser_sql, MYSQLI_ASSOC);
        if ($userdata)
        {
            foreach($userdata as $row)
            {
                $semail = $row['Email'];
                $hashpassword = $row['hashPassword'];
                $userid = $row['UserID'];
                $rid = $row['RID'];

                // verify the password
                $match = password_verify($password, $hashpassword);

                if ($match)
                {
                    // set the session variables
                    $_SESSION['user_id'] = $userid;
                    $_SESSION['rid'] = $rid;
                    // redirect to the community page if it the password matches
                    header("Location:../view/community_view.php");
                }
                else
                {
                    // redirect back to the login if the password does not match;
                    header("Location:../login/login_view.php");
                }
            }
        } else
        {
            // redirect to the login if the user email is not found 
            header("Location:../login/login_view.php");
        }

    }
    else
    {
        echo mysqli_error($CON);
        header("Location:../login/login_view.php");
    }

?>