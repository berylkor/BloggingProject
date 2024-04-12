<?php

include "../actions/get_goals_action.php";

$likes = getlikes();
$comments = getcomments();

function getLikeGoal()
{
    global $likes;
    // check if the function returns any values
    if (gettype($likes) != "NULL" && !empty($likes))
    {
        foreach($likes as $row)
        {
            if ($row["goalLikes"] > 0)
            {
                // display the user's like goal 
                echo "<p>".$row["goalLikes"]."</p>";
            }
            else
            {
                echo "<p> Not set yet </p>";
            }
        }
    }else 
    {
        echo "<p> 0 </p>";
    }
}

function getLikeCount()
{
    global $likes;
    if (gettype($likes) != "NULL" && !empty($likes))
    {
        foreach($likes as $row)
        {
            if ($row["goalLikes"] > 0)
            {
                // display the user's like count 
                echo "<p> Current Like Count: </p> <p>".$row["countlikes"]."</p>";
            } else
            {
                // display nothing if the goal is not get
                echo "<p> </p>";
            }
        }
    } else 
    {
        echo "<p> </p>";
    }
}

function getLikesProgress()
{
    global $likes;
    if (gettype($likes) != "NULL" && !empty($likes))
    {
        foreach($likes as $row)
        {
            $goalLike = $row["goalLikes"];
            $countLike = $row["countlikes"];
            if ($row["goalLikes"] > 0)
            {
                // calculate the user's progress towards like goals
                $progress = number_format((($countLike / $goalLike) * 100), 2);
                // display user's progress bar and percenage
                echo "<span id='likeprogress' data-value='".$progress."%'> </span> <p>".$progress."%</p>";
            } else
            {
                echo "<p> </p>";
            } 
        }
    } else 
    {
        echo "<p> </p>";
    }
}

function getCommentGoal()
{
    global $comments;
    // check if the function returns any values
    if (gettype($comments) != "NULL" && !empty($comments))
    {
        foreach($comments as $row)
        {
            if ($row["goalComment"] > 0)
            {
                // display the user's comment goal 
                echo "<p>".$row["goalComment"]."</p>";
            }else
            {
                echo "<p> Not set yet </p>";
            }
        }
    }else 
    {
        echo "<p> 0 </p>";
    }
}

function getCommentCount()
{
    global $comments;
    if (gettype($comments) != "NULL" && !empty($comments))
    {
        foreach($comments as $row)
        {
            if ($row["goalComment"] > 0)
            {
                // display the user's Comment count 
                echo "<p> Current Comment Count: </p> <p>".$row["countComments"]."</p>";
            } else
            {
                echo "<p> </p>";
            }
        }
    } else 
    {
        echo "<p> </p>";
    }
}

function getCommentProgress()
{
    global $comments;
    if (gettype($comments) != "NULL" && !empty($comments))
    {
        foreach($comments as $row)
        {
            $goalComment = $row["goalComment"];
            $countComment = $row["countComments"];
            if ($row["goalComment"] > 0)
            {
                // calculate the user's progress towards comment goals
                $progress = number_format((($countComment / $goalComment) * 100), 2);
                // display user's progress bar and percenage
                echo "<span id='commentprogress' data-value='".$progress."%'> </span> <p>".$progress."%</p>";
            } else
            {
                echo "<p> </p>";
            } 
        }
    } else 
    {
        echo "<p> </p>";
    }
}

?>