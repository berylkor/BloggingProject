<?php

// variables for setting connection to databse
// $SERVER = "localhost";
// $USERNAME = "root"; 4406
$SERVER = "172.187.229.113";
$USERNAME = "beryl";
$PASSWORD = "";
$DATABASE = "blog_mgt";

// start connection to the databse
$CON = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// check the connection worked
if (mysqli_connect_errno())
{
    die ("Connection error:". mysqli_connect_errno());
}
?>