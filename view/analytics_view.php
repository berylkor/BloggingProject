<?php
include "../settings/core.php";
checkLogin();
$role = checkRole();
if ($role != 2)
{
    header("Location: ../view/community_view.php");
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

        <!-- Page Sidebar -->
        <div class="sidebar_container">
            <ul class="menu">
                <li>
                    <a href="../view/posts_view.php">
                        <img src="../assets/post.svg" alt="post">
                        <span> Post </span>
                    </a>                    
                </li>
                <li>
                    <a href="../view/drafts_view.php">
                        <img src="../assets/draft.svg" alt="draft">
                        <span> Drafts </span>
                    </a>                    
                </li>

                <li>
                    <a href="../view/community_view.php">
                        <img src="../assets/community.svg" alt="community">
                        <span> Community </span>
                    </a>                    
                </li>

                <li class="current">
                    <a href="../view/analytics_view.php">
                        <img src="../assets/analytics.svg" alt="analytics">
                        <span> Dashboard </span>
                    </a>                    
                </li>

                <li class="logout">
                    <a href="#">
                        <img src="../assets/logout.svg" alt="logout">
                        <span> Log out </span>
                    </a>                    
                </li>
            </ul>
        </div>

        <!-- page content and graphs -->
        <div class="amain_container">
            <div class="amain_title">
                <h2> Metrics </h2>
            </div>
            <div class="card_container">
                <div class="counts">
                    <h2>Summary</h2>
                    <div class="item_card1" id="viewscard">
                        <h2>Lifetime Posts</h2>
                        <h2> <p>5</p> Views </h2>
                    </div>
                    <div class="item_card1" id="totalposts_card"> 
                        <h2>Lifetime Posts</h2>
                        <h2> <p>6</p> Posts </h2>
                    </div>
                </div>
                
                    <div class="items_card2" id="mostliked_card">
                        <h2>Most Liked Post</h2>
                        <p> Post title is rather long for the sake of testing</p>
                        <div class="stat">
                            <p> Category: Tag </p>
                            <p class="comstat" id="comlike"> 8 Likes </p>
                        </div>
                    </div>
                    <div class="items_card2" id="mostcommented_card">
                        <h2>Most Commented Post</h2>
                        <p> Post title is rather long for the sake of testing</p>
                        <div class="stat">
                            <p> Category: Tag </p>
                            <p class="comstat" id="comcom"> 8 Comments </p>
                        </div>
                    </div> 
            </div>

        </div>
    </div>
</body>
</html>