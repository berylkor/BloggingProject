<?php
    session_start();
    include "../settings/connection.php";

    if (isset($_POST['login']))
    {
        $email = mysqli_real_escape_string($CON, $_POST['email']);
        $password = mysqli_real_escape_string($CON, $_POST['password']);


        $selectuser = "SELECT * FROM Users WHERE Email = '$email'";
        $selectuser_sql = mysqli_query($CON, $selectuser);

        $userdata = mysqli_fetch_all($selectuser_sql, MYSQLI_ASSOC);
        if ($userdata)
        {
            foreach($userdata as $row)
            {
                $semail = $row['Email'];
                $hashpassword = $row['hashPassword'];
                $userid = $row['UserID'];
                $rid = $row['RID'];

                $match = password_verify($password, $hashpassword);

                if ($match)
                {
                    $_SESSION['user_id'] = $userid;
                    $_SESSION['rid'] = $rid;
                    header("Location:../view/community_view.php");
                }
                else
                {
                    // echo $_SESSION['user_not_found'] = "User not found";
                    header("Location:../login/login_view.php");
                }
            }
        } else
        {
            header("Location:../login/login_view.php");
        }

    }
    else
    {
        echo mysqli_error($CON);
        header("Location:../login/login_view.php");
    }

?>