<?php
    include "../settings/connection.php";
    include "../actions/posts_action.php";
    $getpost = getPosts();

    function createcommunityPost()
    {
        global $CON, $getpost;
        if(gettype($getpost) != "NULL")
        {
            foreach ($getpost as $post)
            {
                $id = $post["PostID"];
                // select the post creator's name and the post's tag
                $details = "SELECT Users.fName, Users.lName, Tag.TagName FROM Post INNER JOIN Users ON Post.UnID = Users.UserID INNER JOIN Tag ON Post.TID = Tag.TagID WHERE Post.PostID='$id'";
                // execute the query
                $details_sql = mysqli_query($CON, $details);
                // fetch results
                $details_value = mysqli_fetch_assoc($details_sql);
                $fName = $details_value["fName"];
                $lName = $details_value["lName"];
                $tag = $details_value["TagName"];
                echo 
                    "<div class='blogpost'> 
                        <div class='blogimage'>
                            <img src='../assets/".$tag."tag.jpg' alt='tag'> 
                        </div> 
                        <div class='blog_content'> 
                            <div class='blogtop'> 
                                <div class='tag'>".$tag."</div> 
                                <div class='post_info'> 
                                    <img src='../assets/account.svg' alt='icon'> 
                                    <p>".$fName." ".$lName."</p> 
                                </div> 
                            </div> 
                            <div> 
                                <p>".$post["postTitle"]."</p>
                            </div> 
                            <div class='article_link'>
                                <a href='../view/blog_view.php?key=".$post['UnID']."'> Read More </a> 
                            </div> 
                        </div> 
                    </div>";
            }
        }
    }

?>