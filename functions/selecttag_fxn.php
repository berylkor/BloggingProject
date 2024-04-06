<?php
include "../settings/connection.php";

$selecttag = "SELECT * FROM tag";
$selecttag_sql = mysqli_query($CON, $selecttag);

if ($selecttag_sql)
{
    $selecttag_data = mysqli_fetch_all($selecttag_sql, MYSQLI_ASSOC);
}else
{
    echo mysqli_error($CON);
}

function createTagDropdown()
{
    global $selecttag_data;
    foreach ($selecttag_data as $row)
    {
        echo "<option value=".$row['TagID'].">".$row['TagName']."</option>";
    }
}


?>