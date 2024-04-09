<?php
include "../settings/connection.php";
session_start();
// collect ID of current user
$current_user = $_SESSION["user_id"];

// set like goal to 0
$delete = "UPDATE Users SET goalLikes = 0 WHERE UserID = '$current_user'";
if (mysqli_query($CON, $delete))
{
    // redirect if successful
    header("Location: ../view/analytics_view.php");
}else
{
    echo mysqli_error($CON);
}

?>