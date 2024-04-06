<?php
   include "../settings/core.php";
   include "../functions/comment_fxn.php";
   checkLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" href="../css/test.css">
</head>
<body>
    <div class="main_grid_container">
        <!-- Page Header -->
        <div class="main_header_container">
            <!-- Blog Logo -->
            <img src="../assets/live.png" alt="Logo" width="100px" height="100px" id="plogo">
            <!-- Blog Name -->
            <h1 id="title"> Live Actually </h1>
        </div>

        <!-- Page Sidebar -->
        <div class="sidebar_container">
            <ul class="menu">
                <li class="current">
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

                <li>
                    <a href="../view/analytics.php">
                        <img src="../assets/analytics.svg" alt="analytics">
                        <span> Dashboard </span>
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
        <div class="cmain_container">
            <div class="comment_form_container">
                <form action="../actions/comment_action.php" method="post">
                    <textarea name="content_forcoms" id="content_forcoms" cols="30" rows="10">Add your comment...</textarea>
                    <input type="submit" id="comsbtn" name="comsbtn" value="Comment">
                </form>
            </div>
            <div class="comments_content_title">
                <h3>Post Comments</h3>
            </div>
            <div class="post_comments_container">
                <?php
                    createComment();
                ?>
            </div>
            
        </div>
    <div>
</body>
<script>
    let logo = document.getElementById('plogo');
    logo.addEventListener('click', () => {
        window.location.href = "../index.php";
    });

    let title = document.getElementById('title');
    title.addEventListener('click', ()=> {
        window.location.href = "../index.php";
    })
</script>
</html>