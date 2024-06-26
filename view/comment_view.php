<?php
   include "../settings/core.php";
   include "../functions/comment_fxn.php";
   include "../functions/user_fxn.php";
    //    checks if the user is logged in
   checkLogin();
    //  stores the id of the post the user is commenting on
   $compostid = $_GET['key2'];
   $compostuserid = $_GET['key3'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
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
            <h1 id="title"> Live Actually </h1>
        </div>

        <!-- Page Sidebar -->
        <div class="sidebar_container">
            <p id="welcome"> Welcome,</p>
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
        <div class="cmain_container">
            <div class="comment_form_container">
                <!-- form for adding comments -->
                <form action="../actions/comment_action.php" method="post">
                    <!-- hidden field for post id -->
                    <input type="hidden" name="postid" value="<?php echo $compostid;?>">
                    <!-- comment enrty -->
                    <textarea name="content_forcoms" id="content_forcoms" cols="30" rows="10">Add your comment...</textarea>
                    <!-- comment submit button -->
                    <input type="submit" id="comsbtn" name="comsbtn" value="Comment">
                </form>
            </div>
            <div class="comments_content_title">
                <h3>Post Comments</h3>
            </div>
            <div class="post_comments_container">
                <?php
                // display comments made on that page
                    createComment($compostid);
                ?>
            </div>
            <div class="commentbacklink">
                <!-- link back to the blog view of the post commented on -->
                <a href="../view/blog_view.php?key=<?php echo $compostuserid;?>">Back</a>
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