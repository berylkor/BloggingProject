<?php
include "../settings/core.php";
include "../functions/community_fxn.php";
include "../functions/user_fxn.php";
// checks user logged in, redirects to login if not
checkLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community</title>
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
            <div style="bottom: 0; right: 0; display: flex; align-items: center; justify-content: end; width: 70%;">
                <?php
                    $rid = checkRole();
                    if ($rid == 1)
                    {
                        echo
                        "<input type='checkbox' id='changeuser' name='changeuser'>
                         <label for='changeuser' style='color: #797878;'> Do you want to become a creator?</label> ";
                    }
                ?>
            </div>
        </div>

        <div class="popup" id="popup">
            <div class="popup_content">
                <span class="close" id="close">&times;</span>
                <p>Do you want to continue?</p>
                <form action="../actions/change_action.php" method="post">
                    <input type="submit" name="confirm" id="confirm" value="Yes"> 
                </form>
            </div>
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

                <li class="current">
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

        <!-- Community content -->
        <div class="smain_container">
                <?php
                    createcommunityPost();
                ?>     
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

    const popup = document.getElementById("popup");
    const close = document.getElementById("close")[0];
    // display popup 
    function showPopup()
    {
        popup.style.display = "block";
    }
    // if they click the check box for changing user role call the function
    let change = document.getElementById("changeuser")
    change.addEventListener('click', ()=>{
        showPopup();
    });

    function hidePopup() 
    {
        const popup = document.getElementById("popup");
        popup.style.display = "none";
    }

    document.addEventListener("DOMContentLoaded", () => {
    const close = document.getElementById("close");
        // close the popup if they click any area outside of the popup
    if (close) 
    { 
        close.addEventListener('click', () => {
            hidePopup();
        });
    }
    });
    
    // hide popup if they click on the "X"
    window.addEventListener('click', (event) => {
        if (event.target == popup){
            hidePopup();
        }
    });
</script>
</html>