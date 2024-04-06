<?php
include "../settings/connection.php";
session_start();
$users = $_SESSION["user_id"];

if (isset($_POST['comsbtn']))
{
    $comment = mysqli_real_escape_string($CON, $_POST['content_forcoms']);

    $sendcomment = "INSERT INTO Comment (postContent, whoCommented) VALUES ('$comment', '$users')";
    if (mysqli_query($CON, $sendcomment))
    {
        header("Location: ../view/comment_view.php");
    }
    else
    {
        echo mysqli_error($CON);
    }
}

?>