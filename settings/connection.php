<?php

// variables for setting connection to databse
$SERVER = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DATABASE = "blog_mgt";

// start connection to the databse
$CON = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// check the connection worked
if (mysqli_connect_errno())
{
    // error message
    die ("Connection error:". mysqli_connect_errno());
}
?>