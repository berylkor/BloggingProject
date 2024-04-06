<?php

include "../settings/connection.php";

if (isset($_SERVER['HTTP']) && $_SERVER['HTTP']==='on')
{
    header("Location: ../view/posts_view.php");
}
else
{
    $url = $_SERVER['REQUEST_URI'];
    $end = basename($url);
    $part = explode('=',$end);
    $partend = end($part);

    $delete = "DELETE FROM Post WHERE PostID = '$partend'";
    $delete_sql = mysqli_query($CON, $delete);

    if ($delete_sql)
    {
        header("Location: ../view/posts_view.php");
    }
    else
    {
        echo mysqli_error($CON);
    }
}

?>