<?php

include "../settings/connection.php";
$countuser = $_SESSION["user_id"];

// sql statements to select the post like and comment counts and like and comment goals of the current user
$numlikes = "SELECT Post.countLike AS countlikes, Users.goalLikes FROM Users JOIN Post ON Users.UserID = Post.UnID WHERE Users.UserID = '$currentuser' ORDER BY countlikes DESC LIMIT 1";
$numcomments = "SELECT Post.countComment AS countComments, Users.goalComment FROM Users JOIN Post ON Users.UserID = Post.UnID WHERE Users.UserID = '$currentuser' ORDER BY countComments DESC LIMIT 1";

// execute the query
$numlikes_sql = mysqli_query($CON, $numlikes);
$numcomments_sql = mysqli_query($CON, $numcomments);
// fetch the results
$numlikes_info = mysqli_fetch_all($numlikes_sql, MYSQLI_ASSOC);
$numcomments_info = mysqli_fetch_all($numcomments_sql, MYSQLI_ASSOC);

function getlikes()
{
    // function to return the like query results
    global $numlikes_info;
    return $numlikes_info;
}

function getcomments()
{
    // function to return the comment query results
    global $numcomments_info;
    return $numcomments_info;
}


?>