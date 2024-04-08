<?php
    include "../settings/connection.php";

    // variable with the current user's id
    $currentuser  = $_SESSION["user_id"];

    // function to find the total number of posts a user has
    function getNumPosts()
    { 
        global $CON, $currentuser;
        // sql statement to count posts that the current user has created
        $numposts = "SELECT COUNT(*) AS countposts FROM Post WHERE UnID = '$currentuser'";
        //  execute the sql statement
        $numposts_sql = mysqli_query($CON, $numposts);
        // retrieve the results of the statement
        $numposts_info = mysqli_fetch_assoc($numposts_sql);
        // return the results
        return $numposts_info;
    }

    // function to find the total number of views a user has across all their posts  
    function getNumViews()
    {
        global $CON, $currentuser;

        // sql statement to count the number of views the current user has across all posts created
        $numviews = "SELECT COUNT(Views.ViewsID) AS countviews FROM Users INNER JOIN Post ON Users.UserID = Post.UnID INNER JOIN Views ON Post.PostID = Views.PID WHERE Users.UserID = '$currentuser' GROUP BY Users.UserID";
        // execute the sql statement
        $numviews_sql = mysqli_query($CON, $numviews);
        // retrieve count of views
        $numviews_info = mysqli_fetch_assoc($numviews_sql);
        // return the results
        return $numviews_info;
    }

    function getMostLikedPost()
    {
        global $CON, $currentuser;
        // sql statement to collect post data on the most liked post by the current user
        $mostliked = "SELECT Post.postTitle, Post.countLike, Tag.TagName FROM Post INNER JOIN Tag ON Post.TID = Tag.TagID WHERE UnID = '$currentuser' ORDER BY countLike DESC LIMIT 1";
        
        $mostliked_sql = mysqli_query($CON, $mostliked);
        $mostliked_info = mysqli_fetch_all($mostliked_sql, MYSQLI_ASSOC);
        return $mostliked_info;
    }

    function getMostCommentedPost()
    {
        global $CON, $currentuser;
        // sql statement to collect post data on the most commented post by the current user
        $mostCommented = "SELECT Post.postTitle, Post.countComment, Tag.TagName FROM Post INNER JOIN Tag ON Post.TID = Tag.TagID WHERE UnID = '$currentuser' ORDER BY countComment DESC LIMIT 1";
        // execute the query
        $mostCommented_sql = mysqli_query($CON, $mostCommented);
        // fetch results
        $mostCommented_info = mysqli_fetch_all($mostCommented_sql, MYSQLI_ASSOC);
        // return result
        return $mostCommented_info;
    }

?>