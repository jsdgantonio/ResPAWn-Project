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
    <title>User Profile</title>
</head>
<body>
    <div class="container">
        <div class="profile-header">
            <h1>Your Profile</h1>
        </div>

        <?php
        $sql = "SELECT 
            user_tb.userID AS id,
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
        INNER JOIN user_tb ON postuser.uID = user_tb.userID
        WHERE user_tb.userID = :uID";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':uID', $userID, PDO::PARAM_INT);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="post">';
            echo '<div class="post-info">';
            echo '<p><strong>Name: </strong>' . htmlspecialchars($row['firstName']) . ' ' . htmlspecialchars($row['lastName']) . '</p>';
            echo '<p><strong>Username: </strong>' . htmlspecialchars($row['username']) . '</p>';
            echo '<p><strong>Status: </strong>' . htmlspecialchars($row['status']) . '</p>';
            echo '<p><strong>Location: </strong>' . htmlspecialchars($row['location']) . '</p>';
            echo '<p><strong>Caption: </strong>' . htmlspecialchars($row['caption']) . '</p>';
            if ($row['image']) {
                echo '<img src="'. htmlspecialchars($row['image']) .'" alt="Post image">';
            }

        }
        ?>

        <br><a href="logout.php" class="logout-link">Logout</a>

        
    </div>
</body>
</html>
