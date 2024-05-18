<?php
session_start();
include("connection.php");

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

if (isset($_POST['approve'])) {
    $postID = $_POST['postID'];
    $stmt = $dbh->prepare("INSERT INTO submitted_posts (APPROVED) VALUES (:postID)");
    $stmt->bindParam(':postID', $postID);
    $stmt->execute();
} elseif (isset($_POST['reject'])) {
    $postID = $_POST['postID'];
    $stmt = $dbh->prepare("INSERT INTO submitted_posts (REJECTED) VALUES (:postID) ;
    ");
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
</body>
</html>