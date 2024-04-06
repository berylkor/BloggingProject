<?php
    session_start();
    include "../settings/connection.php";

    if(isset($_POST['submit']))
    {
        $title= mysqli_real_escape_string($CON, $_POST['blogtitle']);
        $content = mysqli_real_escape_string($CON, $_POST['blogcontent']);
        $tag = mysqli_real_escape_string($CON, $_POST['tagopt']);
        $UnID = $_SESSION['user_id'];
        $post_sql = "INSERT INTO post(postTitle, postContent, UnID, TID) VALUES ('$title', '$content', '$UnID','$tag')";

        if (mysqli_query($CON, $post_sql))
        {
            header ('Location: ../view/posts_view.php');
        }
        else
        {
            echo mysqli_error($CON);
        }
    }

?>