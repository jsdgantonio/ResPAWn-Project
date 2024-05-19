<?php
session_start();
include("connection.php");

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

if (isset($_POST['approve'])) {
    $postID = $_POST['postID'];
    // Retrieve the pending post details
    $stmt = $dbh->prepare("SELECT * FROM postuser WHERE userPostID = :postID");
    $stmt->bindParam(':postID', $postID);
    $stmt->execute();
    $pendingPost = $stmt->fetch(PDO::FETCH_ASSOC);
    // Insert the pending post into the homepageUser table
    $stmt = $dbh->prepare("INSERT INTO homepageUser (uID, userLocation, userCaption, userImage, userStatus, created_at) 
                           VALUES (:uID, :userLocation, :userCaption, :userImage, :userStatus, :created_at)");
    $stmt->bindParam(':uID', $pendingPost['uID']);
    $stmt->bindParam(':userLocation', $pendingPost['userLocation']);
    $stmt->bindParam(':userCaption', $pendingPost['userCaption']);
    $stmt->bindParam(':userImage', $pendingPost['userImage']);
    $stmt->bindParam(':userStatus', $pendingPost['userStatus']);
    $stmt->bindParam(':created_at', $pendingPost['created_at']);
    $stmt->execute();
    // Delete the pending post from the postuser table
    $stmt = $dbh->prepare("DELETE FROM postuser WHERE userPostID = :postID");
    $stmt->bindParam(':postID', $postID);
    $stmt->execute();
} elseif (isset($_POST['reject'])) {
    $postID = $_POST['postID'];
    // Delete the pending post from the postuser table
    $stmt = $dbh->prepare("DELETE FROM postuser WHERE userPostID = :postID");
    $stmt->bindParam(':postID', $postID);
    $stmt->execute();
}

$posts = $dbh->query("SELECT * FROM postuser")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            background-color: #FFAF13;
            font-family: Arial, sans-serif;
        }
        
        h1 {
            text-align: center;
        }
        
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 10px;
            text-align: left;
        }
        
        th {
            background-color: #333;
            color: white;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        
        .logout-btn {
            background-color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            color: black;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Admin Panel</h1>
    <table border="1">
        <tr>
            <th>Post ID</th>
            <th>Location</th>
            <th>Caption</th>
            <th>Status</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($posts as $post) { ?>
            <tr>
                <td><?php echo $post['userPostID']; ?></td>
                <td><?php echo $post['userLocation']; ?></td>
                <td><?php echo $post['userCaption']; ?></td>
                <td><?php echo $post['userStatus']; ?></td>
                <td><img src="<?php echo $post['userImage']; ?>" alt="Image" width="100"></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="postID" value="<?php echo $post['userPostID']; ?>">
                        <button type="submit" name="approve">Approve</button>
                        <button type="submit" name="reject">Reject</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    <div class="button-container">
        <a href="admin_logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
