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
    <link rel="stylesheet" href="profilestyle.css">
    <title>Organization Profile</title>
</head>
<header>
    <?php include '..\ResPAWn-Project-main\navbar.php'; ?>
</header>

<body>

    <div class="container">
        <div class="profile-header">
            <h1>Organization Profile</h1>
        </div>

        <div class="post-column">
            <h2>Pending Posts</h2>
            <div class="post-grid">

                <?php
                $sql_pending = "SELECT 
              org_tb.orgID AS id,
              org_tb.orgUsername AS username,
              org_tb.orgName AS orgName,
              postorg.orgLocation AS location,
              postorg.orgCaption AS caption,
              postorg.orgImage AS image,
              postorg.orgStatus AS status,
              postorg.orgPostID AS postid,
              postorg.org_created_at AS created_at,
              postorg.statusofPost AS statusofPost
          FROM postorg
          INNER JOIN org_tb ON postorg.oID = org_tb.orgID
          WHERE org_tb.orgID = :orgID AND postorg.statusofPost = 'Pending'
          ORDER BY created_at DESC";


                $stmt_pending = $dbh->prepare($sql_pending);
                $stmt_pending->bindParam(':orgID', $orgID, PDO::PARAM_INT);
                $stmt_pending->execute();

                while ($row = $stmt_pending->fetch(PDO::FETCH_ASSOC)) {
                    $statusClass = 'status-pending'; // Added this line
                    echo '<div class="post">';
                    echo '<div class="post-info">';
                    echo '<p><strong>Organization Name: </strong>' . htmlspecialchars($row['orgName']) . '</p>';
                    echo '<p><strong>Username: </strong>' . htmlspecialchars($row['username']) . '</p>';
                    echo '<p><strong>Status: </strong>' . htmlspecialchars($row['status']) . '</p>';
                    echo '<p><strong>Location: </strong>' . htmlspecialchars($row['location']) . '</p>';
                    echo '<p><strong>Caption: </strong>' . htmlspecialchars($row['caption']) . '</p>';
                    echo '<p><strong>Status: </strong> <span class="' . $statusClass . '">' . htmlspecialchars($row['statusofPost']) . '</span></p>';
                    if ($row['image']) {
                        echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Post image">';
                    }
                    echo '<p><strong>Posted On: </strong>' . htmlspecialchars($row['created_at']) . '</p>';
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
               org_tb.orgID AS id,
               org_tb.orgUsername AS username,
               org_tb.orgName AS orgName,
               postorg.orgLocation AS location,
               postorg.orgCaption AS caption,
               postorg.orgImage AS image,
               postorg.orgStatus AS status,
               postorg.orgPostID AS postid,
               postorg.org_created_at AS created_at,
               postorg.statusofPost AS statusofPost
           FROM postorg
           INNER JOIN org_tb ON postorg.oID = org_tb.orgID
           WHERE org_tb.orgID = :orgID AND postorg.statusofPost = 'Approved'
           ORDER BY created_at DESC";


                $stmt_approved = $dbh->prepare($sql_approved);
                $stmt_approved->bindParam(':orgID', $orgID, PDO::PARAM_INT);
                $stmt_approved->execute();


                while ($row = $stmt_approved->fetch(PDO::FETCH_ASSOC)) {
                    $statusClass = 'status-approved';
                    echo '<div class="post">';
                    echo '<div class="post-info">';
                    echo '<p><strong>Name: </strong>' . htmlspecialchars($row['orgName']) . '</p>';
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
             org_tb.orgID AS id,
             org_tb.orgUsername AS username,
             org_tb.orgName AS orgName,
             postorg.orgLocation AS location,
             postorg.orgCaption AS caption,
             postorg.orgImage AS image,
             postorg.orgStatus AS status,
             postorg.orgPostID AS postid,
             postorg.org_created_at AS created_at,
             postorg.statusofPost AS statusofPost
         FROM postorg
         INNER JOIN org_tb ON postorg.oID = org_tb.orgID
         WHERE org_tb.orgID = :orgID AND postorg.statusofPost = 'Rejected'
         ORDER BY created_at DESC";


                $stmt_rejected = $dbh->prepare($sql_rejected);
                $stmt_rejected->bindParam(':orgID', $orgID, PDO::PARAM_INT);
                $stmt_rejected->execute();

                while ($row = $stmt_rejected->fetch(PDO::FETCH_ASSOC)) {
                    $statusClass = 'status-rejected';
                    echo '<div class="post">';
                    echo '<div class="post-info">';
                    echo '<p><strong>Name: </strong>' . htmlspecialchars($row['orgName']) .  '</p>';
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