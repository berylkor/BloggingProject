<?php
include "../settings/core.php";
include "../functions/user_fxn.php";
include "../functions/selecttag_fxn.php";
// redirect user if they are not logged in
checkLogin();
$role = checkRole();
// redirect user if they are not a creator
if ($role != 2)
{
    header("Location: ../view/community_view.php");
};

    $partend = $_GET["KEY"]; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
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

        <!-- Page Sidebar -->
        <div class="sidebar_container">
            <p id="welcome"> Welcome,</p>
            <!-- displays the name of the current user -->
            <?php displaycurrentuser() ?>;

            <!-- sidebar elements -->
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
                    <a href="../view/analytics_view.php">
                        <img src="../assets/analytics.svg" alt="analytics">
                        <span> Dashboard </span>
                    </a>                    
                </li>

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
        <div class="editmain_container">

            <div class="blogdraft" style="width:60%">
                <!-- edit post form -->
                <form action="../actions/edit_post_action.php" method="post" class="blogentry" name="blogform">
                    <div class="tag_selector">
                        <label for="tag_options"> Post Tag</label>
                        <select name="tagopt" id="tagopt">
                            <option value="0">Select Tag</option>
                                <?php
                                    createTagDropdown();
                                ?>
                        </select>
                    </div>
                    <!-- hidden field to collect the ID of the post being edited -->
                    <input type="hidden" name="id" value="<?php echo $partend; ?>">  
                        <!-- post title field -->
                    <div class="blogentry_title">
                        <input type="text" placeholder="Give your post a new title here...." id="title_value" name="blogtitle">
                    </div>
                    <!-- post content field -->
                    <div class="blogentry_content">
                        <textarea rows="8" cols="55" id="content_value" name="blogcontent"> </textarea>
                    </div>
                    <!-- submit button -->
                    <div class="blogentry_submit">
                        <input type="submit" name="submit" value="Post" id="bsubmit_value" class="bsubmit_value">
                    </div>
                </form>
            </div>

            <div class="editbacklink">
                <a href="../view/posts_view.php">Back</a>
            </div>

        </div>
    
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