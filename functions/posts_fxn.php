<?php
    include "../settings/connection.php";
    include "../actions/posts_action.php";
    // get the details of the creators post
    $getpost = getcreatorPosts();

    function createPost()
    {
        global $CON, $getpost;
        if(gettype($getpost) != "NULL")
        {
            foreach ($getpost as $post)
            {
                $id = $post["PostID"];
                // select the user name and tag name for the post being display
                $details = "SELECT Users.fName, Users.lName, Tag.TagName FROM Post INNER JOIN Users ON Post.UnID = Users.UserID INNER JOIN Tag ON Post.TID = Tag.TagID WHERE Post.PostID='$id'";
                // execute query
                $details_sql = mysqli_query($CON, $details);
                // fetch results
                $details_value = mysqli_fetch_assoc($details_sql);
                // variables to store first name, last name and tag name
                $fName = $details_value["fName"];
                $lName = $details_value["lName"];
                $tag = $details_value["TagName"];
                // display the post
                echo "<div class='pblogpost'> <div class='blogimage' id='blogimage'><img src='../assets/".
                     $tag."tag.jpg' alt='".$tag."tag'> </div> <div class='pblog_content'> <div id='tag_con'> <div class='tag'>".
                     $tag."</div> <div class='post_info'> <img src='../assets/account.svg' alt='icon'> <p>".
                     $fName." ".$lName."</p> </div> </div> <div id='pblog_value'> <h4>".$post["postTitle"]."<p>".$post["postContent"]. 
                     "</p> </div> <div class='action_icons_container'>";
                // edit and delete icons and the links to their action 
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