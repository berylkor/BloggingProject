<?php
session_start();
include "../settings/connection.php";
$user =  $_SESSION['user_id'];

$changeuser = "UPDATE Users SET RID = 2 WHERE UserID = '$user'";
if (mysqli_query($CON, $changeuser))
{
    $_SESSION['rid'] = 2;
    header("Location: ../view/community_view.php");
}else
{
    echo mysqli_error($CON);
}

?>