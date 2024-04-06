<?php
    include "settings/connection.php";
    include "actions/posts_action.php";
    $mostrecent = getMostRecentPost();
    $secondrecent = getSecondRecentPost();

    function createmostrecent()
    {
        global $CON, $mostrecent;
        if (gettype($mostrecent) != "NULL")
        {
            $id = $mostrecent["PostID"];
            $details = "SELECT Users.fName, Users.lName, Tag.TagName FROM Post INNER JOIN Users ON Post.UnID = Users.UserID INNER JOIN Tag ON Post.TID = Tag.TagID WHERE Post.PostID='$id'";
            $details_sql = mysqli_query($CON, $details);
            $details_value = mysqli_fetch_assoc($details_sql);
            $fName = $details_value["fName"];
            $lName = $details_value["lName"];
            $tag = $details_value["TagName"];

            echo 
                    "<div class='articlebox1'>
                        <div class='article_header'>
                            <img src='assets/".$tag."tag.jpg' alt='".$tag."'>
                        </div>
                        <div class='article_content'>
                            <div>
                                <div class='tag'>".$tag."</div>
                                <div class='post_info'>
                                    <img src='assets/account.svg' alt='icon'>
                                    <p>".$fName." ".$lName."</p>
                                </div>
                            </div>
                            <div>
                                <p>".$mostrecent["postTitle"]."</p>
                            </div>
                            <div class='article_link'>
                                <a href='../view/blog_view.php?key=".$mostrecent['UnID']."'> Read More </a>
                            </div>
                        </div>
                    </div> ";
        }
    }

    function createsecondrecent()
    {
        global $CON, $secondrecent;
        if (gettype($secondrecent) != "NULL")
        {
            $id = $secondrecent["PostID"];
            $details = "SELECT Users.fName, Users.lName, Tag.TagName FROM Post INNER JOIN Users ON Post.UnID = Users.UserID INNER JOIN Tag ON Post.TID = Tag.TagID WHERE Post.PostID='$id'";
            $details_sql = mysqli_query($CON, $details);
            $details_value = mysqli_fetch_assoc($details_sql);
            $fName = $details_value["fName"];
            $lName = $details_value["lName"];
            $tag = $details_value["TagName"];
            echo 
                    "<div class='articlebox2'>
                        <div class='article_header'>
                            <img src='assets/".$tag."tag.jpg' alt='".$tag."'>
                        </div>
                        <div class='article_content'>
                            <div>
                                <div class='tag'>".$tag."</div>
                                <div class='post_info'>
                                    <img src='assets/account.svg' alt='icon'>
                                    <p>".$fName." ".$lName."</p>
                                </div>
                            </div>
                            <div>
                                <p>".$secondrecent["postTitle"]."</p>
                            </div>
                            <div class='article_link'>
                                <a href='view/blog_view.php?key=".$secondrecent['UnID']."'> Read More </a>
                            </div>
                        </div>
                    </div> ";
        }
    }

?>