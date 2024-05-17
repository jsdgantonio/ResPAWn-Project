<?php 
include("connection.php");
session_start();

if (!isset($_SESSION['orgID'])) {
    header("Location: login.php");
    exit();
}

$orgID = $_SESSION['orgID'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization Profile</title>

</head>
<body>
    <div class="container">
        <div class="profile-header">
            <h1>Organization Profile</h1>
        </div>

        <?php
        $sql = "SELECT 
            org_tb.orgID AS id,
            org_tb.orgUsername AS username,
            org_tb.orgName AS orgName,
            postorg.orgLocation AS location,
            postorg.orgCaption AS caption,
            postorg.orgImage AS image,
            postorg.orgStatus AS status,
            postorg.orgPostID AS postid,
            postorg.org_created_at AS created_at
        FROM postorg
        INNER JOIN org_tb ON postorg.oID = org_tb.orgID
        WHERE org_tb.orgID = :orgID";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':orgID', $orgID, PDO::PARAM_INT);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="post">';
            echo '<div class="post-info">';
            echo '<p><strong>Organization Name: </strong>' . htmlspecialchars($row['orgName']) . '</p>';
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
