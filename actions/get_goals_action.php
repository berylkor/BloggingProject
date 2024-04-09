<?php

include "../settings/connection.php";
$countuser = $_SESSION["user_id"];

// select the like and comment counts, like and comment goal where the user is the current user
 $numlikescomments = "SELECT COUNT(Likes.LikesID) AS countlikes, COUNT(Comment.CommentID) AS countComments, Users.goalLikes, Users.goalComment 
                    FROM  Users JOIN  Post ON Users.UserID = Post.UnID LEFT JOIN  Likes ON Post.PostID = Likes.PID
                    LEFT JOIN  Comment ON Post.PostID = Comment.PID WHERE  Users.UserID = '$currentuser' GROUP BY  Users.UserID";

// execute the query
$numlikescomments_sql = mysqli_query($CON, $numlikescomments);
// fect the results
$numlikescomments_info = mysqli_fetch_all($numlikescomments_sql, MYSQLI_ASSOC);

function getlikescomments()
{
    global $numlikescomments_info;
    return $numlikescomments_info;
}
?>