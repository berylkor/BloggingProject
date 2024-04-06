<?php
include "../settings/core.php";
include "../functions/selecttag_fxn.php";
checkLogin();
$role = checkRole();
if ($role != 2)
{
    header("Location: ../view/community_view.php");
};

if (isset($_SERVER['HTTP']) && $_SERVER['HTTP']==='on')
{  
    header("Location: ../view/posts_view.php");
}
else
{
    $url = $_SERVER['REQUEST_URI'];
    $end = basename($url);
    $part = explode('=',$end);
    $partend = end($part);
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="../css/test.css">
</head>
<body style="display: flex; flex-direction:row; justify-content:center; align-items:center;">
<div class="blogdraft" style="width:60%">
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
        <input type="hidden" name="id" value="<?php echo $partend; ?>">      
        <div class="blogentry_title">
                <input type="text" placeholder="Give your post a new title here...." id="title_value" name="blogtitle">
        </div>
            <div class="blogentry_content">
                <textarea rows="8" cols="55" id="content_value" name="blogcontent"> </textarea>
            </div>
            <div class="blogentry_submit">
                <input type="submit" name="submit" value="Post" id="bsubmit_value" class="bsubmit_value">
            </div>
    </form>
</div>
    
</body>
</html>