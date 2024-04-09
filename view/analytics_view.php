<?php
include "../settings/core.php";
include "../functions/analytics_fxn.php";
include "../functions/goals_fxn.php";
// checks user logged in redirect if not
checkLogin();
$role = checkRole();
// redirect user if not a creator
if ($role != 2)
{
    header("Location: ../view/community_view.php");
};
include "../functions/user_fxn.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            <!-- display name of current user -->
            <?php displaycurrentuser() ?>;
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

                <li class="current">
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

        <!-- page content and graphs -->
        <div class="amain_container">
            <div class="amain_title">
                <h2> Metrics </h2>
            </div>
            <div class="card_container">
                <div class="counts">
                    <h2>Summary</h2>
                    <div class="item_card1" id="viewscard">
                        <h2>Lifetime Views</h2>
                        <h2> 
                            <?php displaynumviews(); ?>
                            Views 
                        </h2>
                    </div>
                    <div class="item_card1" id="totalposts_card"> 
                        <h2>Lifetime Posts</h2>
                        <h2> 
                            <?php displaynumposts(); ?>
                            Posts 
                        </h2>
                    </div>
                </div>
                
                <div class="items_card2" id="mostliked_card">
                    <?php 
                        displaymostlikedpost();
                    ?>
                </div> 
                <div class="items_card2" id="mostcommented_card">
                    <?php   
                        displaymostcommentedpost(); 
                    ?>
                </div> 

                <h2 id="goaltitle"> Goals </h2>
                <div class="goalsform_container">
                    <!--goal form  -->
                    <form action="../actions/goals_action.php" method="post" name="goalform">
                        <h3> Set Goals</h3>
                        <input type="number" id="likegoal" name="likegoal" placeholder="Enter Like Goal">
                        <input type="number" id="commentgoal" name="commentgoal" placeholder="Enter Comment Goal">
                        <input type="submit" name="submitgoal" value="Set">
                        <div>
                            <p> Delete current goal? 
                                <a href="../actions/delete_like_goal_action.php" style="color:black">like </a>
                                <a href="../actions/delete_comment_goal_action.php" style="color:black;"> comment</a>
                            </p>
                        </div>
                    </form>
                </div>
                <div class="itemgoal_container" id="likegoal_container">
                    <h3>Likes</h3>
                    <div id="likegoal">
                        <p> Like Goal:</p>
                        <?php
                        // display user's like goal
                            getLikeGoal();
                        ?>
                    </div>
                    <div id="likecount">
                        <?php
                        // display users current like goal if they have set a goal
                            getLikeCount();
                        ?>
                    </div>
                    <?php
                    // display progress bar and percentage
                        getLikesProgress();
                    ?>
                </div>
                <div class="itemgoal_container" id="commentgoal_container">
                    <h3>Comments</h3>
                    <div id="commentgoal">
                        <p> Comment Goal:</p>
                        <?php
                        // display comment goal
                            getCommentGoal();
                        ?>
                    </div>
                    <div id="commentcount">
                        <?php
                        // display their current comment count if they have set a goal
                            getCommentCount();
                        ?>
                    </div>
                    <?php
                    // display the progress bar 
                        getCommentProgress();
                    ?>
                </div>
                
            </div>

        </div>
    </div>
</body>
<script>
    // variable for the progress bar
    const progress = document.querySelectorAll('#likeprogress, #commentprogress');
    // set the value of the var(--value) of the progress bar in css to the value of the progress span
    progress.forEach(item => {
        item.style.setProperty('--value', item.dataset.value)
    })

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