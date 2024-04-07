<?php
include "../settings/connection.php";
// start session
session_start();
// store the current user's user id
$users = $_SESSION["user_id"];

if (isset($_POST['comsbtn']))
{
    // collect post id and comment from the comment form
    $postid = mysqli_real_escape_string($CON, $_POST['postid']);
    $comment = mysqli_real_escape_string($CON, $_POST['content_forcoms']);

    // sql statement to insert data into the table
    $sendcomment = "INSERT INTO Comment (postContent, whoCommented, PID) VALUES ('$comment', '$users', '$postid')";
    $count = "UPDATE Post SET countComment = countComment + 1 WHERE PostID = '$postid'";
    if (mysqli_query($CON, $sendcomment) && mysqli_query($CON, $count))
    {
        // redirect back to the same comment page they made the comment on
        header("Location: ../view/comment_view.php?key2=".$postid);
    }
    else
    {
        // displays an error if it did not work out
        echo mysqli_error($CON);
    }
}

?>