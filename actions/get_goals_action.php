<?php

include "../settings/connection.php";
$countuser = $_SESSION["user_id"];

// select the like and comment counts, like and comment goal where the user is the current user
//  $numlikescomments = "SELECT COUNT(Likes.LikesID) AS countlikes, COUNT(Comment.CommentID) AS countComments, Users.goalLikes, Users.goalComment 
//                     FROM  Users JOIN  Post ON Users.UserID = Post.UnID LEFT JOIN  Likes ON Post.PostID = Likes.PID
//                     LEFT JOIN  Comment ON Post.PostID = Comment.PID WHERE  Users.UserID = '$currentuser' GROUP BY  Users.UserID";

$numlikes = "SELECT Post.countLike AS countlikes, Users.goalLikes FROM Users JOIN Post ON Users.UserID = Post.UnID WHERE Users.UserID = '$currentuser' ORDER BY countlikes DESC LIMIT 1";
$numcomments = "SELECT Post.countComment AS countComments, User.goalComment FROM Users JOIN Post ON Users.UserID = Post.UnID WHERE Users.UserID = '$currentuser' ORDER BY countComments DESC LIMIT 1";

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
    print_r($numlikescomments_info);
    exit;
    // return $numlikescomments_info;
}
?>