<?php
session_start();

// Check if admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

// Replace this with your database connection code
$host = "127.0.0.1";
$port = 3306;
$socket = "";
$user = "root";
$password = "";
$dbname = "respawn_db";

try {
    $conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch submitted posts from database with status 'PENDING'
    $stmt = $conn->prepare("SELECT * FROM submitted_posts WHERE PENDING = 'YES'");
    $stmt->execute();
    $submitted_posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Process form submission for post approval or rejection
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['approve'])) {
            // Handle post approval
            $post_id = $_POST['approve'];
            $stmt = $conn->prepare("UPDATE submitted_posts SET APPROVED = 'YES', PENDING = 'NO' WHERE ID = :id");
            $stmt->bindParam(':id', $post_id);
            $stmt->execute();
            echo "Post with ID $post_id has been approved.";
        } elseif (isset($_POST['reject'])) {
            // Handle post rejection
            $post_id = $_POST['reject'];
            $stmt = $conn->prepare("UPDATE submitted_posts SET REJECTED = 'YES', PENDING = 'NO' WHERE ID = :id");
            $stmt->bindParam(':id', $post_id);
            $stmt->execute();
            echo "Post with ID $post_id has been rejected.";
        }
    }
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
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
    <h2>Submitted Posts</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
        <?php foreach ($submitted_posts as $post) { ?>
            <tr>
                <td><?php echo $post['ID']; ?></td>
                <td><?php echo $post['Title']; ?></td>
                <td><?php echo $post['Content']; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="post_id" value="<?php echo $post['ID']; ?>">
                        <button type="submit" name="approve" value="<?php echo $post['ID']; ?>">Approve</button>
                        <button type="submit" name="reject" value="<?php echo $post['ID']; ?>">Reject</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="admin_logout.php">Logout</a>
</body>
</html>
