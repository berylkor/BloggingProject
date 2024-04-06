<?php

function getcreatorPosts()
{
    global $CON;
    $userid = $_SESSION['user_id'];
    $getposts = "SELECT * FROM Post WHERE UnID = '$userid'";
    $getposts_sql = mysqli_query($CON, $getposts);

    if ($getposts_sql)
    {
        if (mysqli_num_rows($getposts_sql) > 0)
        {
            $postinfo = mysqli_fetch_all($getposts_sql, MYSQLI_ASSOC);
            return $postinfo;
        }
    }else 
    {
        echo mysqli_error($CON);
    } 
}

function getPosts()
{
    global $CON;
    $getposts = "SELECT * FROM Post";
    $getposts_sql = mysqli_query($CON, $getposts);

    if ($getposts_sql)
    {
        if (mysqli_num_rows($getposts_sql) > 0)
        {
            $postinfo = mysqli_fetch_all($getposts_sql, MYSQLI_ASSOC);
            return $postinfo;
        }
    }else 
    {
        echo mysqli_error($CON);
    }  
}

function getMostRecentPost()
{
    global $CON;
    $getposts = "SELECT * FROM POST ORDER BY datePosted DESC LIMIT 1";
    $getposts_sql = mysqli_query($CON, $getposts);
    if ($getposts_sql)
    {
        if (mysqli_num_rows($getposts_sql) > 0)
        {
            $postinfo = mysqli_fetch_assoc($getposts_sql);
            return $postinfo;
        }
    }else 
    {
        echo mysqli_error($CON);
    }
}

function getSecondRecentPost()
{
    global $CON;
    $getposts = "SELECT * FROM POST ORDER BY datePosted DESC LIMIT 1 OFFSET 1";
    $getposts_sql = mysqli_query($CON, $getposts);
    if ($getposts_sql)
    {
        if (mysqli_num_rows($getposts_sql) > 0)
        {
            $postinfo = mysqli_fetch_assoc($getposts_sql);
            return $postinfo;
        }
    }else 
    {
        echo mysqli_error($CON);
    }
}


?>