<?php
session_start();
include("connection.php");

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

if (isset($_POST['approve']) || isset($_POST['reject'])) {
    $postID = $_POST['postID'];
    $type = $_POST['type'];

    // Update the post status
    if ($type == 'user') {
        $stmt = $dbh->prepare("UPDATE postuser SET statusofPost = :status WHERE userPostID = :postID");
    } else if ($type == 'org') {
        $stmt = $dbh->prepare("UPDATE postorg SET statusofPost = :status WHERE orgPostID = :postID");
    }

    // Set status based on the button clicked
    $status = isset($_POST['approve']) ? 'Approved' : 'Rejected';

    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':postID', $postID);
    $stmt->execute();
}

// Retrieve pending user posts ordered by upload time in ascending order
$userPosts = $dbh->query("SELECT *, 'user' AS type, 'User' AS author FROM postuser WHERE statusofPost = 'Pending' ORDER BY uploadTime ASC")->fetchAll(PDO::FETCH_ASSOC);

// Retrieve pending organization posts ordered by upload time in ascending order
$orgPosts = $dbh->query("SELECT *, 'org' AS type, 'Animal Organization' AS author FROM postorg WHERE statusofPost = 'Pending' ORDER BY uploadTime ASC")->fetchAll(PDO::FETCH_ASSOC);

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
    <title>Admin Panel</title>
    <link href='https://fonts.googleapis.com/css?family=Baloo+Bhai' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <style>
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #FFAF13;
            padding: 10px 20px;
            box-sizing: border-box;
            z-index: 1000;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }


        body {
            background-color: #ffff;
            font-family: Arial, sans-serif;
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

        .approve-btn {
            border-radius: 10px;
            /* Rounder buttons */
            background-color: green;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            margin: 10px;
        }

        .reject-btn {
            border-radius: 10px;
            /* Rounder buttons */
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            margin: 10px;

        }
    </style>

</head>

<body>


    <h1>Pending Posts</h1>
    <table border="1">
        <tr>
            <th>Post ID</th>
            <th>Author</th>
            <th>Location</th>
            <th>Caption</th>
            <th>Status</th>
            <th>Image</th>
            <th>Time</th>
            <th>Actions</th>
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
                <td>
                    <form method="post">
                        <input type="hidden" name="postID" value="<?php echo $post['type'] == 'user' ? $post['userPostID'] : $post['orgPostID']; ?>">
                        <input type="hidden" name="type" value="<?php echo $post['type']; ?>">
                        <button type="submit" name="approve" class="approve-btn">Approve</button>
                        <button type="submit" name="reject" class="reject-btn">Reject</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/js/bootstrap.min.js"></script>
</body>

</html>