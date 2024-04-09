<?php
include "../settings/connection.php";
session_start();
// variable with the current user's id
$currentuser  = $_SESSION["user_id"];

if(isset($_POST['submitgoal']))
{
    // receive data from goals form
    $likegoal = mysqli_real_escape_string($CON, $_POST['likegoal']);
    $commentgoal = mysqli_real_escape_string($CON, $_POST['commentgoal']);
    
    // set like and comment goal 
    $goalupdate = "UPDATE Users SET goalLikes = '$likegoal', goalComment = '$commentgoal' WHERE UserID = '$currentuser'";
    if (mysqli_query($CON, $goalupdate))
    {
        // redirect back to the dashboard if successful
        header("Location: ../view/analytics_view.php");
    }else
    {
        // error message
        echo mysqli_error($CON);
    }
}

?>