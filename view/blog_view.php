<?php
include "../settings/connection.php";
// include "../settings/core.php";
include "../actions/blog_action.php";  
$url = $_SERVER['REQUEST_URI'];
$end = basename($url);
$part = explode('=',$end);
$spartend = end($part);

$bloginfo =  getbloginfo($spartend);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../css/test.css">
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
            <ul class="menu">
                <?php
                    $rid = checkRole();
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
                createBlogPost($bloginfo, $spartend);
            ?>
        </div>
</body>

</html>