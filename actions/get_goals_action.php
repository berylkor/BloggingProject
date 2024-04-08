<?php

include "../settings/connection.php";
$countuser = $_SESSION["user_id"];

//  "SELECT COUNT(Likes.LikesID) AS countlikes, COUNT(Comment.CommentID), Users.goalLikes, Users.goalComment AS countComments FROM Likes JOIN Post ON Likes.PID = Post.PostID JOIN Comment ON Comment.PID = post.PostID JOIN Users.UserID = post.UnID WHERE Users.UserID = '$currentuser' GROUP BY Post.UnID;";
 $numlikescomments = "SELECT COUNT(Likes.LikesID) AS countlikes, COUNT(Comment.CommentID) AS countComments, Users.goalLikes, Users.goalComment 
                    FROM  Users JOIN  Post ON Users.UserID = Post.UnID LEFT JOIN  Likes ON Post.PostID = Likes.PID
                    LEFT JOIN  Comment ON Post.PostID = Comment.PID WHERE  Users.UserID = '$currentuser' GROUP BY  Users.UserID";

$numlikescomments_sql = mysqli_query($CON, $numlikescomments);
$numlikescomments_info = mysqli_fetch_all($numlikescomments_sql, MYSQLI_ASSOC);

function getlikescomments()
{
    global $numlikescomments_info;
    return $numlikescomments_info;
}
?>