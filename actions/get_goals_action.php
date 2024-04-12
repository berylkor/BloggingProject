<?php

include "../settings/connection.php";
$countuser = $_SESSION["user_id"];

$numlikes = "SELECT Post.countLike AS countlikes, Users.goalLikes FROM Users JOIN Post ON Users.UserID = Post.UnID WHERE Users.UserID = '$currentuser' ORDER BY countlikes DESC LIMIT 1";
$numcomments = "SELECT Post.countComment AS countComments, Users.goalComment FROM Users JOIN Post ON Users.UserID = Post.UnID WHERE Users.UserID = '$currentuser' ORDER BY countComments DESC LIMIT 1";

// execute the query
$numlikes_sql = mysqli_query($CON, $numlikes);
$numcomments_sql = mysqli_query($CON, $numcomments);
// fect the results
$numlikes_info = mysqli_fetch_all($numlikes_sql, MYSQLI_ASSOC);
$numcomments_info = mysqli_fetch_all($numcomments_sql, MYSQLI_ASSOC);

function getlikescomments()
{
    global $numlikes_info, $numcomments_info;
    $numlikescomments_info = array_merge($numlikes_info, $numcomments_info);
    return $numlikescomments_info;
}
?>