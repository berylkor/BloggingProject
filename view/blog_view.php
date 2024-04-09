<?php
include_once "../settings/connection.php";
include_once "../actions/blog_action.php";
include_once "../functions/blog_fxn.php";
session_start();
if (!isset($_SESSION["user_id"]))
{
    header("Location: ../login/login_view.php");
}
// collect the ID of the user who posted
$url = $_SERVER["REQUEST_URI"];
$end = basename($url);
$part = explode("=",$end);
$spartend = end($part);

// stores the id of the current user
$current_user = $_SESSION["user_id"];
// sql statement to find the details of current user
$getuser = "SELECT * FROM Users WHERE UserID = '$current_user'";
// execute sql statement
$getuser_sql = mysqli_query($CON, $getuser);
// fetch the results 
$getuser_info = mysqli_fetch_all($getuser_sql, MYSQLI_ASSOC);

function displaycurrentuser()
{
    global $getuser_info;
    foreach ($getuser_info as $user)
    {
        echo "<p>".$user["fName"]." ".$user["lName"]."</p>";
    }
}

// collect information for the blog
$bloginfo =  getbloginfo($spartend);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../css/test.css">
    <link rel="shortcut icon" href="../assets/favicon_io/favicon.ico" type="image/x-icon">
    <link rel="manifest" href="../assets/favicon_io/site.webmanifest">
    <link rel="shortcut icon" href="../assets/favicon_io/favicon-16x16.png" type="image/png" sizes="16x16">
    <link rel="shortcut icon" href="../assets/favicon_io/favicon-32x32.png" type="image/png" sizes="32x32">
</head>

<body>
<div class="main_grid_container">
        <!-- Page Header -->
        <div class="main_header_container">
            <!-- Blog Logo -->
            <img src="../assets/live.png" alt="Logo" width="100px" height="100px" id="plogo">
            <!-- Blog Name -->
            <h1 id="title"> Live Actually</h1>
        </div>
        <div class="sidebar_container">
            <p>Welcome,</p>
            <!-- display name of current user -->
            <?php displaycurrentuser() ?>; 
            <ul class="menu">
                <?php
                    $rid = checkRole();
                    // checks for the user's role and hides restricted pages
                    // hide creator pages if they are not a creator
                    if ($rid == 2)
                    {
                        echo
                        "<li>
                            <a href='../view/posts_view.php'>
                                <img src='../assets/post.svg' alt='post'>
                                <span> Post </span>
                            </a>                    
                        </li>
                        <li>
                            <a href='../view/drafts_view.php'>
                                <img src='../assets/draft.svg' alt='draft'>
                                <span> Drafts </span>
                            </a>                    
                        </li>

                        <li>
                            <a href='../view/analytics_view.php'>
                                <img src='../assets/analytics.svg' alt='analytics'>
                                <span> Dashboard </span>
                            </a>                    
                        </li>";
                    }
                ?>

                <li>
                    <a href="../view/community_view.php">
                        <img src="../assets/community.svg" alt="community">
                        <span> Community </span>
                    </a>                    
                </li>


                <li class="logout">
                    <a href="../login/logout_view.php">
                        <img src="../assets/logout.svg" alt="logout">
                        <span> Log out </span>
                    </a>                    
                </li>
            </ul>
        </div>
        
        <div class="pmain_container">
            <?php
            // display blog of the user that they clicked their post
                createBlogPost($bloginfo, $spartend);
            ?>
        </div>
</body>

</html>