<?php
    include "../settings/connection.php";

    if(isset($_POST['submit']))
    {
        // collect the data from the edit form 
        $title = mysqli_real_escape_string($CON, $_POST["blogtitle"]);
        $content = mysqli_real_escape_string($CON, $_POST["blogcontent"]);
        $tag = mysqli_real_escape_string($CON, $_POST["tagopt"]);
        $id = mysqli_real_escape_string($CON, $_POST["postid"]);
        echo $postid;
        // update post where the user id matches
        $update = "UPDATE Post SET postTitle = '$title', postContent = '$content', TID = '$tag' WHERE PostID = '$id'";

        if (mysqli_query($CON, $update))
        {
            // return to the post page
            header("Location:../view/posts_view.php");
        }
        else
        {
            // error message
            echo mysqli_error($CON);
        }
    }
?>