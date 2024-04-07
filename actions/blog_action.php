<?php
include "../settings/connection.php";
include "../settings/core.php";

function getbloginfo($spartend)
{
    global $CON;
    if (isset($_SERVER['HTTP']) && $_SERVER['HTTP']==='on')
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
                return $bloginfo;
            }
        }else 
        {
            mysqli_error($CON);
        }
    }
};


function createBlogPost($bloginfo, $spartend)
{  
    $user = $_SESSION["user_id"];
    global $CON; 
    
    foreach ($bloginfo as $blog)
    {         
        echo "<div class='pblogpost'> <div class='blogimage' id='blogimage'><img src='../assets/".
                $blog['tagName']."tag.jpg' alt='tag'> </div> <div class='pblog_content'> <div id='tag_con'> <div class='tag'>".
                $blog['tagName']."</div> <div class='post_info'> <img src='../assets/account.svg' alt='icon'> <p>".
                $blog['fName']. " ".$blog['lName']."</p> </div> </div> <div id='pblog_value'> <h4>".$blog["postTitle"]."<p>".$blog["postContent"]. 
                 "</p> </div> <div class='action_icons_container'>";

        $pod = $blog["PostID"];

            $view = "INSERT INTO Views (PID, whoViewed) VALUES ('$pod','$user')";
            $view_sql = mysqli_query($CON, $view);
            if(!$view_sql)
            {
                echo mysqli_error($CON);
            }
        
        // sql statement for counting post views
        $viewcount = "SELECT COUNT(*) AS countview FROM Views WHERE PID = '$pod'";
        // execute the sql statement
        $viewcount_sql = mysqli_query($CON, $viewcount);
        // collect results
        $viewcount_info = mysqli_fetch_assoc($viewcount_sql);  
        
        // sql statement for counting post comments
        $commentcount = "SELECT COUNT(*) AS countcomment FROM Comment WHERE PID = '$pod'";
        // execute the sql statement
        $commentcount_sql = mysqli_query($CON, $commentcount);
        $commentcount_info = mysqli_fetch_assoc($commentcount_sql);

        echo
            // echo the like, comment and view icons and their counts
            "<div class='user_action_icons_con'>
                <div>
                    <p>".$blog["countLike"]."</p>
                    <a href='../actions/like_action.php?key=".$blog["PostID"]."&key1=".$spartend."'>  
                    <img src='../assets/like.svg' alt='like icon'>
                    </a>
                </div>
                <div>
                    <p>".$commentcount_info["countcomment"]."</p>
                    <a href='../view/comment_view.php?key2=".$blog["PostID"]."'>
                        <img src='../assets/comment.svg' alt='comment icon'>
                    </a>
                </div>
                <div>
                    <p>".$viewcount_info["countview"]."</p>  
                    <img src='../assets/view.svg' alt='view icon'>
                </div> 
            </div> </div> </div> </div>";              
    }
}
  

?>