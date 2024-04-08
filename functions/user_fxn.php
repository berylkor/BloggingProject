<?php
    include "../settings/connection.php";
    // stores the id of the current user
    $current_user = $_SESSION["user_id"];
    // sql statement to find the details of current user
    $getuser = "SELECT * FROM Users WHERE UserID = '$current_user'";
    // execute sql statement
    $getuser_sql = mysqli_query($CON, $getuser);
    // fetch the results 
    $getuser_info = mysqli_fetch_all($getuser_sql, MYSQLI_ASSOC);

    function displaycurrentuser()
    {
        global $getuser_info;
        foreach ($getuser_info as $user)
        {
            echo "<p>".$user["fName"]." ".$user["lName"]."</p>";
        }
    }

?>