<?php
include "../settings/connection.php";
// variable with the current user's id
session_start();
$currentuser  = $_SESSION["user_id"];

if(isset($_POST['submitgoal']))
{
    $likegoal = mysqli_real_escape_string($CON, $_POST['likegoal']);
    $commentgoal = mysqli_real_escape_string($CON, $_POST['commentgoal']);
    
    $goalupdate = "UPDATE Users SET goalLikes = '$likegoal', goalComment = '$commentgoal' WHERE UserID = '$currentuser'";
    if (mysqli_query($CON, $goalupdate))
    {
        header("Location: ../view/analytics_view.php");
    }else
    {
        echo mysqli_error($CON);
    }
}

?>