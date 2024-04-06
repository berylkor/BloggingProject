<?php
 include "../settings/connection.php";

 $getcomment = "SELECT * FROM Comment";
 $getcomment_sql = mysqli_query($CON, $getcomment);

 if ($getcomment_sql)
 {
    $getcomment_data = mysqli_fetch_all($getcomment_sql, MYSQLI_ASSOC);

 }
 else
 {
    echo mysqli_error($CON);
 }

 function createComment()
 {
    global $getcomment_data;
    foreach ($getcomment_data as $row)
    {
        echo  
            "<div class='post_comment_content'><p>".$row['postContent']."</p> </div>";
    }
 }


?>