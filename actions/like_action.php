<?php
    include "../settings/connection.php";
    include "../settings/core.php";

    $ped = $_GET['key'];
    $uped = $_GET['key1']; 

    $user = $_SESSION["user_id"];

    $setlike = "INSERT INTO LIKES(PID, whoLiked) VALUES ('$ped', '$user')";
    $count = "UPDATE Post SET countLike = countLike + 1 WHERE PostID = '$ped'";
    if(mysqli_query($CON, $setlike) && mysqli_query($CON, $count))
    {
        header("Location:../view/blog_view.php?key=".$uped);
    }
    else
    {
        echo mysqli_error($CON);
    }

?>