<?php
include "../settings/connection.php";
include "../settings/core.php";

function getbloginfo($spartend)
{
    global $CON;
    if (isset($_SERVER["HTTP"]) && $_SERVER["HTTP"]==="on")
    {  
        header("Location: ../view/community_view.php");
    }
    else
    {
        $getblogposts = "SELECT Post.*, Users.fName AS fName, Users.lName AS lName, Tag.TagName AS tagName FROM POST INNER JOIN Users ON Post.UnID = Users.UserID INNER JOIN Tag ON Post.TID = Tag.TagID WHERE Post.UnID = '$spartend'";
        $getblogposts_sql = mysqli_query($CON, $getblogposts);
        if ($getblogposts_sql)
        {
            if (mysqli_num_rows($getblogposts_sql) > 0)
            {
                $bloginfo = mysqli_fetch_all($getblogposts_sql, MYSQLI_ASSOC);
                var_dump($bloginfo);
                exit;
                return $bloginfo;
            }
        }else 
        {
            mysqli_error($CON);
        }
    }
};
  

?>