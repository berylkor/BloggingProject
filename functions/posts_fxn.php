<?php
    include "../settings/connection.php";
    include "../actions/posts_action.php";
    $getpost = getcreatorPosts();

    function createPost()
    {
        global $CON, $getpost;
        $user = $_SESSION["user_id"];
        if(gettype($getpost) != "NULL")
        {
            foreach ($getpost as $post)
            {
                $id = $post["PostID"];
                $details = "SELECT Users.fName, Users.lName, Tag.TagName FROM Post INNER JOIN Users ON Post.UnID = Users.UserID INNER JOIN Tag ON Post.TID = Tag.TagID WHERE Post.PostID='$id'";
                $details_sql = mysqli_query($CON, $details);
                $details_value = mysqli_fetch_assoc($details_sql);
                $fName = $details_value["fName"];
                $lName = $details_value["lName"];
                $tag = $details_value["TagName"];
                echo "<div class='pblogpost'> <div class='blogimage' id='blogimage'><img src='../assets/".
                     $tag."tag.jpg' alt=".$tag."tag'> </div> <div class='pblog_content'> <div id='tag_con'> <div class='tag'>".
                     $tag."</div> <div class='post_info'> <img src='../assets/account.svg' alt='icon'> <p>".
                     $fName." ".$lName."</p> </div> </div> <div id='pblog_value'> <h4>".$post["postTitle"]."<p>".$post["postContent"]. 
                     "</p> </div> <div class='action_icons_container'>";
                
                echo "<div class='creator_action_icons_con'> 
                        <a href='../view/edit_view.php?key=".$post["PostID"]."'>
                            <img src='../assets/edit.svg' alt='edit icon'>
                        </a> 
                        <a href='../actions/delete_post_action.php?key=".$post["PostID"]."'>
                            <img src='../assets/delete.svg' alt='delete icon'>
                        </a>
                    </div> </div> </div> </div>";
            }
        }
    }
    


?>