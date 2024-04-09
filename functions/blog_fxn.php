<?php
include_once "../settings/connection.php";

function createBlogPost($bloginfo, $spartend)
{  
    $user = $_SESSION["user_id"];
    global $CON; 
    
    foreach ($bloginfo as $blog)
    {         
        echo "<div class='pblogpost'> <div class='blogimage' id='blogimage'><img src='../assets/".
                $blog["tagName"]."tag.jpg' alt='tag'> </div> <div class='pblog_content'> <div id='tag_con'> <div class='tag'>".
                $blog["tagName"]."</div> <div class='post_info'> <img src='../assets/account.svg' alt='icon'> <p>".
                $blog["fName"]. " ".$blog["lName"]."</p> </div> </div> <div id='pblog_value'> <h4>".$blog["postTitle"]."<p>".$blog["postContent"]. 
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
            // display the like, comment and view icons and their counts
            "<div class='user_action_icons_con'>
                <div>
                    <p>".$blog["countLike"]."</p>
                    <a href='../actions/like_action.php?key=".$blog["PostID"]."&key1=".$spartend."'>  
                        <img src='../assets/like.svg' alt='like icon'>
                    </a>
                </div>
                <div>
                    <p>".$commentcount_info["countcomment"]."</p>
                    <a href='../view/comment_view.php?key2=".$blog["PostID"]."&key3=".$spartend."'>
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