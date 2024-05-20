<?php
session_start();
include("connection.php");

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

// Retrieve approved user posts ordered by upload time in ascending order
$userPosts = $dbh->query("SELECT *, 'user' AS type, 'User' AS author FROM postuser WHERE statusofPost = 'Approved' ORDER BY uploadTime ASC")->fetchAll(PDO::FETCH_ASSOC);

// Retrieve approved organization posts ordered by upload time in ascending order
$orgPosts = $dbh->query("SELECT *, 'org' AS type, 'Animal Organization' AS author FROM postorg WHERE statusofPost = 'Approved' ORDER BY uploadTime ASC")->fetchAll(PDO::FETCH_ASSOC);
// Merge both arrays
$posts = array_merge($userPosts, $orgPosts);

// Sort the merged array by upload time in ascending order
usort($posts, function ($a, $b) {
    return strtotime($a['uploadTime']) - strtotime($b['uploadTime']);
});
?>

<!DOCTYPE html>
<html lang="en">

<header>
    <?php include '..\ResPAWn-Project-main\navbarAdmin.php'; ?>
</header>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_style.css" <title>Approved Posts</title>
    <title>Approved Posts</title>

    <style>
        body {
            background-color: #FFFF;
            font-family: 'Poppins', sans-serif;
        }

        h1 {
            text-align: center;
            margin: 180px auto;
            padding: -100px;

        }

        table {
            width: 80%;
            margin: -150px auto;
            border-collapse: collapse;
        }

        th,
        td {
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
    <h1>Approved Posts</h1>
    <table border="1">
        <tr>
            <th>Post ID</th>
            <th>Author</th>
            <th>Location</th>
            <th>Caption</th>
            <th>Status</th>
            <th>Image</th>
            <th>Time</th>
        </tr>
        <?php foreach ($posts as $post) { ?>
            <tr>
                <td><?php echo $post['type'] == 'user' ? $post['userPostID'] : $post['orgPostID']; ?></td>
                <td><?php echo $post['author']; ?></td>
                <td><?php echo $post['type'] == 'user' ? $post['userLocation'] : $post['orgLocation']; ?></td>
                <td><?php echo $post['type'] == 'user' ? $post['userCaption'] : $post['orgCaption']; ?></td>
                <td><?php echo $post['type'] == 'user' ? $post['statusofPost'] : $post['statusofPost']; ?></td>
                <td><img src="<?php echo $post['type'] == 'user' ? $post['userImage'] : $post['orgImage']; ?>" alt="Image" width="100"></td>
                <td><?php echo $post['uploadTime']; ?></td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>