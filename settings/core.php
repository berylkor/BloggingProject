<?php
session_start();

function checkLogin()
{
    if (!isset($_SESSION['user_id']))
    {
        header("Location:../login/login_view.php");
        die();
    }
}

function checkRole()
{
    if (isset($_SESSION['rid']))
    {
        $roleID = $_SESSION['rid'];
        return $roleID;
    }
}

?>