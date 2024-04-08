<?php
    include "../actions/analytics_action.php";

    // variable to store number of posts made
    $usersposts = getNumPosts();
    // variable to store count of all views
    $usersviews = getNumViews();
    // variable to store most liked post details
    $mostcommented = getMostCommentedPost();
    // variable to store most liked post details
    $mostliked = getMostLikedPost();

    // function to display the count of posts made
    function displaynumposts()
    {
        global $usersposts;
        // check if the function returns null
        if (gettype($usersposts) != "NULL")
        {
            if($usersposts["countposts"] == 0)
            {
                // displays 0 when the count post is 0
                echo "<p> 0 </p>";
            }else
            {
                // display the count of the posts made
                echo "<p>".$usersposts["countposts"]."</p>";
            }
        }
        else
        {
            echo "<p> 0 </p>" ;  
        }
    }

    // function to display the count of number of views ever
    function displaynumviews()
    {
        global $usersviews;
        if (gettype($usersviews) != "NULL")
        {
            if ($usersviews["countviews"] == 0)
            {
                // displays 0 when there are no views for the user
                echo "<p> 0 </p>";
            }else
            {
                // display the number of views for the user
                echo "<p>".$usersviews["countviews"]."</p>";
            }
        }
        else
        {
            echo "<p> 0 </p>" ;  
        }
    }

    function displaymostlikedpost()
    {
        global $mostliked;
        if (gettype($mostliked) != "NULL")
        {
            if (!empty($mostliked))
            {
                if ($mostliked[0]["countLike"] > 0)
                {
                    echo " <h2> Most Liked Post </h2>
                      <p> Title: ".$mostliked[0]["postTitle"]."</p>
                      <div class='stat'>
                        <p> Category: ".$mostliked[0]["TagName"]."</p>
                        <p class='comstat' id='comlike'>".$mostliked[0]["countLike"]." Likes</p>
                     </div> ";
                }
                else
                {
                    echo " <h2> Most Liked Post </h2>
                        <p> No posts liked yet </p> ";
                }
            }else
            {
                echo " <h2> Most Liked Post </h2>
                       <p> No posts liked yet </p> ";
            }
        }
        else
        {
            echo "<h2> Most Liked Post </h2>
                  <p> No posts liked yet </p> ";
        }
    }

    function displaymostcommentedpost()
    {
        global $mostcommented;
        
        if (gettype($mostcommented) != "NULL")
        {
            if (!empty($mostcommented))
            {
                if ($mostcommented[0]["countComment"] > 0)
                {
                echo "<h2> Most Commented Post </h2>
                 <p> Title: ".$mostcommented[0]["postTitle"]."</p>
                 <div class='stat'>
                    <p> Category: ".$mostcommented[0]["TagName"]."</p>
                    <p class='comstat' id='comcom'>".$mostcommented[0]["countComment"]." Comments</p>
                 </div>";
                }
                else
                {
                    echo " <h2> Most Commented Post </h2>
                    <p> No posts commented yet </p> ";
                }
            }else
            {
                echo "<h2> Most Commented Post </h2>
                  <p> No posts commented yet </p>";
            }
        }
        else
        {
            echo "<h2> Most Commented Post </h2>
                  <p> No posts commented yet </p>";
        }
    }

?>