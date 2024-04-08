<?php

    include "../settings/connection.php";
    include "../settings/core.php";

    // collect the id of the post liked
    $ped = $_GET['key'];
    // collect the id of the user who posted
    $uped = $_GET['key1']; 
    // store current user
    $user = $_SESSION["user_id"];

    // check if the user has liked the post
    $checklike = "SELECT * FROM Likes WHERE PID = '$ped' AND whoLiked = '$user'";
    // execute the query
    $checklike_sql = mysqli_query($CON, $checklike);

    if (mysqli_num_rows($checklike_sql) > 0)
    {
        // delete the previous like
        $deletelike = "DELETE FROM Likes WHERE PID = '$ped' AND whoLiked = '$user'";
        // decrement the like count
        $deletecount = "UPDATE Post SET countLike = countLike - 1 WHERE PostID = '$ped'";
        if (mysqli_query($CON, $deletelike) && mysqli_query($CON, $deletecount))
        {
            // redirect back to the blog with the post, after deleting like
            header("Location:../view/blog_view.php?key=".$uped);
        }
        else
        {
            echo mysqli_error($CON);
        }
    }else
    {
        // insert like 
        $setlike = "INSERT INTO Likes(PID, whoLiked) VALUES ('$ped', '$user')";
        // update the like count 
        $count = "UPDATE Post SET countLike = countLike + 1 WHERE PostID = '$ped'";
        if(mysqli_query($CON, $setlike) && mysqli_query($CON, $count))
        {
            // redirect back to the blog with the post, after liking
            header("Location:../view/blog_view.php?key=".$uped);
        }
        else
        {
            echo mysqli_error($CON);
        }
    }
?>