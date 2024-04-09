<?php
include "../settings/connection.php";

// select all data from the tag
$selecttag = "SELECT * FROM Tag";
// // query to get data
$selecttag_sql = mysqli_query($CON, $selecttag);

// if ($selecttag_sql)
// {
//     // fetch the results of the query
//     $selecttag_data = mysqli_fetch_all($selecttag_sql, MYSQLI_ASSOC);
//     var_dump($selecttag_data);
// }else
// {
//     echo mysqli_error($CON);
// }

// function createTagDropdown()
// {
//     global $selecttag_data;
//     // iterate through the data
//     foreach ($selecttag_data as $row)
//     {
//         // echo each tag as an option of the dropdown
//         echo "<option value=".$row['TagID'].">".$row['TagName']."</option>";
//     }
// }


?>