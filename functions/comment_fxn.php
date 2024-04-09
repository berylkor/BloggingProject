<?php
 include "../settings/connection.php";

 
 function createComment($compostid)
 {
   global $CON;
   // select everything from comment where the post id is the same as the provided post id
    $getcomment = "SELECT * FROM Comment WHERE PID = '$compostid'";
   //  execute the query
    $getcomment_sql = mysqli_query($CON, $getcomment);
   
    if ($getcomment_sql)
    {
      // fetch the results
       $getcomment_data = mysqli_fetch_all($getcomment_sql, MYSQLI_ASSOC);
   
    }else
    {
      // error message
       echo mysqli_error($CON);
    }
    foreach ($getcomment_data as $row)
    {
      // display the comments for the post
        echo "<div class='post_comment_content'><p>".$row['postContent']."</p> </div>";
    }
 }


?>