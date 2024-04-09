<?php

include "../settings/connection.php";

if (isset($_SERVER['HTTP']) && $_SERVER['HTTP']==='on')
{
    header("Location: ../view/posts_view.php");
}
else
{
    // store the url
    $url = $_SERVER['REQUEST_URI'];
    // split it 
    $end = basename($url);
    // separate by the = sign
    $part = explode('=',$end);
    // collect the end
    $partend = end($part);
    // delete the post
    $delete = "DELETE FROM Post WHERE PostID = '$partend'";
    // execute query
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