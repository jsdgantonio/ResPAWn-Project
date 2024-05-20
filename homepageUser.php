<?php
include("connection.php");
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResPAWn</title>
    <link href='https://fonts.googleapis.com/css?family=Baloo Bhai' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="homepageStyle.css">
</head>

</head>

<body>
    <header>
        <?php
        include '..\ResPAWn-Project-main\navbar.php';
        ?>
    </header>
    <div class="feed-container">
        <div class="welcome-container text-center mb-4">
            <h1 class="text2">WELCOME TO RESPAWN!</h1>
            <div class="row">
                <div class="col">
                    <h2 class="text-start mb-4">News Feed</h2>
                </div>
                <div class="col text-end">
                    <a href="postuser.php" class="button">NEW POST</a>
                </div>
            </div>
        </div>
        <table>
            <thead>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT 
                'user' AS type,
                user_tb.userID AS user_id,
                user_tb.userUsername AS username,
                user_tb.userFirstName AS firstName,
                user_tb.userLastName AS lastName,
                postuser.userLocation AS location,
                postuser.userCaption AS caption,
                postuser.userImage AS image,
                postuser.userStatus AS status,
                postuser.userPostID AS postid,
                postuser.created_at AS created_at,
                postuser.statusofPost AS statusofPost
            FROM postuser
            INNER JOIN user_tb ON postuser.uID=user_tb.userID
            WHERE postuser.statusofPost = 'Approved'
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
                postorg.org_created_at AS created_at,
                postorg.statusofPost AS statusofPost
            FROM postorg
            INNER JOIN org_tb ON postorg.oID=org_tb.orgID
            WHERE postorg.statusofPost = 'Approved'
            ORDER BY created_at DESC";


                $stmt = $dbh->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $postformattedDate = date('Y-m-d', strtotime($row['created_at']));

                    echo '<tr>';
                    echo '<td>';
                    echo '<div class="post-container">';
                    echo '<p><span class="first-name">' . $row['firstName'] . '</span> @' . $row['username'] . '</p>';
                    echo '<p><span class="postdate">' . htmlspecialchars($postformattedDate) . '</span></p>';
                    echo '<div><i class="gg-search-loading"></i><span class="stat">' . $row['status'] . '</span></div>';
                    echo '<div><i class="gg-pin"></i><span class="loc">' . $row['location'] . '</span></div>';
                    echo '<p></p>';
                    echo '<p>' . $row['caption'] . '</p>';
                    if ($row['image']) {
                        echo '<img src="' . $row['image'] . '" style="width: 200px;">';
                    }
                    echo '<p></p>';
                    echo '<button class="comments-button" data-postid="' . $row['postid'] . '" data-source="' . $row['type'] . '">Comments</button>';
                    echo '<div class="comments-section" id="comments-section-' . $row['postid'] . '">';
                    echo '<div class="comments-list"></div>';
                    echo '<input type="text" class="new-comment" placeholder="Add new comment">';
                    echo '<button class="add-comment" data-postid="' . $row['postid'] . '" data-source="' . $row['type'] . '">SUBMIT</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>


            </tbody>
        </table>
        <a href="logout.php">Logout</a>
    </div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top"> <i class="fa fa-arrow-circle-up" aria-hidden="true" style="font-size: 30px;"></i>
        </br>BACK TO TOP</i>
    </button>

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
                        data: {
                            postid: postId
                        },
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
        //BACK TO TOP BUTTON
        let mybutton = document.getElementById("myBtn");

        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>

<!-- Popup Modal -->
<div id="popupModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Your post has been submitted. Please check your profile page for the status of your post.</p>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById("popupModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Check if the URL contains the query parameter
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('posted')) {
        // Show the modal
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<style>
    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>
</body>

</html>


</html>