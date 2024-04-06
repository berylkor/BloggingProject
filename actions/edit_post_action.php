<?php
    include "../settings/connection.php";

    if(isset($_POST['submit']))
    {
       
        $title = mysqli_real_escape_string($CON, $_POST['blogtitle']);
        $content = mysqli_real_escape_string($CON, $_POST['blogcontent']);
        $id = mysqli_real_escape_string($CON, $_POST['id']);
        $update = "UPDATE Post SET postTitle = '$title', postContent = '$content' WHERE PostID = '$id'";

        if (mysqli_query($CON, $update))
        {
            header("Location:../view/posts_view.php");
        }
        else
        {
            echo mysqli_error($CON);
        }
    }
?>