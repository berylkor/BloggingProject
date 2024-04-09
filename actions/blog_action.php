<?php
include_once "../settings/connection.php";
include_once "../settings/core.php";

function getbloginfo($spartend)
{
    global $CON;

        $getblogposts = "SELECT Post.*, Users.fName AS fName, Users.lName AS lName, Tag.TagName AS tagName FROM Post INNER JOIN Users ON Post.UnID = Users.UserID INNER JOIN Tag ON Post.TID = Tag.TagID WHERE Post.UnID = '$spartend'";
        $getblogposts_sql = mysqli_query($CON, $getblogposts);
        if ($getblogposts_sql)
        {
            if (mysqli_num_rows($getblogposts_sql) > 0)
            {
                $bloginfo = mysqli_fetch_all($getblogposts_sql, MYSQLI_ASSOC);
                return $bloginfo;
            }
        }else 
        {
            mysqli_error($CON);
        }
    
};


?>