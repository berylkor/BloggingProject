<?php
session_start();
include "../settings/connection.php";
$user =  $_SESSION['user_id'];

// update the user role to 2
$changeuser = "UPDATE Users SET RID = 2 WHERE UserID = '$user'";
if (mysqli_query($CON, $changeuser))
{
    // reset the session role variable
    $_SESSION['rid'] = 2;
    // redirect to the community page
    header("Location: ../view/community_view.php");
}else
{
    echo mysqli_error($CON);
}

?>