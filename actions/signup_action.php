<?php
    include "../settings/connection.php";

    // receive json from the ajax
    $json_data = file_get_contents("php://input");
    // change from json format 
    $signupData = json_decode($json_data);

    if (isset($signupData))
    {
        // collect the data that was send
        $fname = $signupData -> fname;
        $lname = $signupData -> lname;
        $email = $signupData -> email;
        $password = $signupData -> password;

        // hash password to go into database
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);

        // sql insert statement
        $user_sql = "INSERT INTO Users(fname, lname, Email, hashPassword) VALUES ('$fname', '$lname', '$email', '$hashpassword')";

        // execute the insert query
        if (mysqli_query($CON, $user_sql))
        {
            // response if success
            echo "success";
        }
        else
        {
            // error message if not successful
            echo mysqli_error($CON);
        }
    }



?>