<?php
include("connection.php");
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit();
}

$userID = $_SESSION['userID'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profilestyle.css">
    <title>User Profile</title>
</head>
<header>
    <?php include '..\ResPAWn-Project-main\navbar.php'; ?>
</header>

<body>
    <div class="container">
        <div class="profile-header">
            <h1>Your Profile</h1>
        </div>

        <div class="post-column">
            <h2>Pending Posts</h2>
            <div class="post-grid">

                <?php
                $sql_pending = "SELECT 
                user_tb.userID AS id,
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
                INNER JOIN user_tb ON postuser.uID = user_tb.userID
                WHERE user_tb.userID = :userID AND postuser.statusofPost = 'Pending'
                ORDER BY created_at DESC";

                $stmt_pending = $dbh->prepare($sql_pending);
                $stmt_pending->bindParam(':userID', $userID, PDO::PARAM_INT);
                $stmt_pending->execute();

                while ($row = $stmt_pending->fetch(PDO::FETCH_ASSOC)) {
                    $statusClass = 'status-pending';
                    echo '<div class="post">';
                    echo '<div class="post-info">';
                    echo '<p><strong>Name: </strong>' . htmlspecialchars($row['firstName']) . ' ' . htmlspecialchars($row['lastName']) . '</p>';
                    echo '<p><strong>Username: </strong>' . htmlspecialchars($row['username']) . '</p>';
                    echo '<p><strong>Location: </strong>' . htmlspecialchars($row['location']) . '</p>';
                    echo '<p><strong>Caption: </strong>' . htmlspecialchars($row['caption']) . '</p>';
                    echo '<p><strong>Status: </strong> <span class="' . $statusClass . '">' . htmlspecialchars($row['statusofPost']) . '</span></p>';
                    if ($row['image']) {
                        echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Post image">';
                    }
                    echo '<p><strong>Post Created At: </strong>' . htmlspecialchars($row['created_at']) . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>

        <div class="post-column">
            <h2>Approved Posts</h2>
            <div class="post-grid">

                <?php
                $sql_approved = "SELECT 
                user_tb.userID AS id,
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
                INNER JOIN user_tb ON postuser.uID = user_tb.userID
                WHERE user_tb.userID = :userID AND postuser.statusofPost = 'Approved'
                ORDER BY created_at DESC";

                $stmt_approved = $dbh->prepare($sql_approved);
                $stmt_approved->bindParam(':userID', $userID, PDO::PARAM_INT);
                $stmt_approved->execute();

                while ($row = $stmt_approved->fetch(PDO::FETCH_ASSOC)) {
                    $statusClass = 'status-approved';
                    echo '<div class="post">';
                    echo '<div class="post-info">';
                    echo '<p><strong>Name: </strong>' . htmlspecialchars($row['firstName']) . ' ' . htmlspecialchars($row['lastName']) . '</p>';
                    echo '<p><strong>Username: </strong>' . htmlspecialchars($row['username']) . '</p>';
                    echo '<p><strong>Location: </strong>' . htmlspecialchars($row['location']) . '</p>';
                    echo '<p><strong>Caption: </strong>' . htmlspecialchars($row['caption']) . '</p>';
                    echo '<p><strong>Status: </strong> <span class="' . $statusClass . '">' . htmlspecialchars($row['statusofPost']) . '</span></p>';
                    if ($row['image']) {
                        echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Post image">';
                    }
                    echo '<p><strong>Post Created At: </strong>' . htmlspecialchars($row['created_at']) . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>

        <div class="post-column">
            <h2>Rejected Posts</h2>
            <div class="post-grid">

                <?php
                $sql_rejected = "SELECT 
                user_tb.userID AS id,
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
                INNER JOIN user_tb ON postuser.uID = user_tb.userID
                WHERE user_tb.userID = :userID AND postuser.statusofPost = 'Rejected'
                ORDER BY created_at DESC";

                $stmt_rejected = $dbh->prepare($sql_rejected);
                $stmt_rejected->bindParam(':userID', $userID, PDO::PARAM_INT);
                $stmt_rejected->execute();

                while ($row = $stmt_rejected->fetch(PDO::FETCH_ASSOC)) {
                    $statusClass = 'status-rejected';
                    echo '<div class="post">';
                    echo '<div class="post-info">';
                    echo '<p><strong>Name: </strong>' . htmlspecialchars($row['firstName']) . ' ' . htmlspecialchars($row['lastName']) . '</p>';
                    echo '<p><strong>Username: </strong>' . htmlspecialchars($row['username']) . '</p>';
                    echo '<p><strong>Location: </strong>' . htmlspecialchars($row['location']) . '</p>';
                    echo '<p><strong>Caption: </strong>' . htmlspecialchars($row['caption']) . '</p>';
                    echo '<p><strong>Status: </strong> <span class="' . $statusClass . '">' . htmlspecialchars($row['statusofPost']) . '</span></p>';
                    if ($row['image']) {
                        echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Post image">';
                    }
                    echo '<p><strong>Post Created At: </strong>' . htmlspecialchars($row['created_at']) . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>

        <br><a href="logout.php" class="logout-link">Logout</a>


    </div>
</body>

</html>