<?php 
include("connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResPAWn</title>
    <style>
        .comments-section {
            display: none;
            margin-top: 10px;
        }
        .comment {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1>Welcome to ResPAWn!</h1>
    <a href="aboutus.php">About Us</a>
    <br>
    <a href="postuser.php">New Post</a>
    <br><br>
    <h3>Home</h3>
    <table>
        <thead>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT 
                        'user' AS source,
                        user_tb.userID AS user_id,
                        user_tb.userUsername AS username,
                        user_tb.userFirstName AS firstName,
                        user_tb.userLastName AS lastName,
                        postuser.userLocation AS location,
                        postuser.userCaption AS caption,
                        postuser.userImage AS image,
                        postuser.userStatus AS status,
                        postuser.userPostID AS postid,
                        postuser.created_at AS created_at
                    FROM postuser
                    INNER JOIN user_tb ON postuser.uID=user_tb.userID
                    UNION ALL
                    SELECT 
                        'org' AS source,
                        org_tb.orgID AS org_id,
                        org_tb.orgUsername AS username,
                        org_tb.orgName AS firstName,
                        '' AS lastName,
                        postorg.orgLocation AS location,
                        postorg.orgCaption AS caption,
                        postorg.orgImage AS image,
                        postorg.orgStatus AS status,
                        postorg.orgPostID AS postid,
                        postorg.org_created_at AS created_at
                    FROM postorg
                    INNER JOIN org_tb ON postorg.oID=org_tb.orgID
                    ORDER BY created_at DESC";

            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr><td>' . ($row['firstName']) . ' ' . ($row['lastName']) . '</td></tr>';
                echo '<tr><td>' . ($row['username']) . '</td></tr>';
                echo '<tr><td>' . ($row['status']) . '</td></tr>';
                echo '<tr><td>' . ($row['location']) . '</td></tr>';
                echo '<tr><td>' . ($row['caption']) . '</td></tr>';
                if ($row['image']) {
                    echo '<tr><td><img src="'. ($row['image']) .'" style="width: 200px;"></td></tr>';
                }
                echo '<tr><td><button class="comments-button" data-postid="'. $row['postid'] .'" data-source="'. $row['source'] .'">Comments</button></td></tr>';
                echo '<tr><td><div class="comments-section" id="comments-section-'. $row['postid'] .'">';
                echo '<div class="comments-list"></div>';
                echo '<input type="text" class="new-comment" placeholder="Add new comment">';
                echo '<button class="add-comment" data-postid="'. $row['postid'] .'" data-source="'. $row['source'] .'">Submit</button>';
                echo '</div></td></tr>';
            }
            ?>
        </tbody>
    </table>
    <a href="logout.php">Logout</a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
$(document).ready(function() {
    $('.comments-button').click(function() {
        var postId = $(this).data('postid');
        var $commentsSection = $('#comments-section-' + postId);
        $commentsSection.toggle();

        if ($commentsSection.is(':visible') && $commentsSection.find('.comments-list').is(':empty')) {
            $.ajax({
                url: 'fetch_comments.php',
                type: 'GET',
                data: { postid: postId },
                success: function(data) {
                    $commentsSection.find('.comments-list').html(data);
                }
            });
        }
    });

    $('.add-comment').click(function() {
        var postId = $(this).data('postid');
        var commentText = $('#comments-section-' + postId).find('.new-comment').val();

        if (commentText) {
            $.ajax({
                url: 'add_comment.php',
                type: 'POST',
                data: { 
                    postid: postId,
                    comment: commentText
                },
                success: function(data) {
                    $('#comments-section-' + postId).find('.comments-list').append(data);
                    $('#comments-section-' + postId).find('.new-comment').val('');
                }
            });
        }
    });
});



    </script>
</body>
</html>
