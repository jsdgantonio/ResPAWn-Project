<?php 
include("connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResPAWn - Sign Up Org</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="homepageStyle.css" </head>

<body>
    <header>
<?php
        include '..\ResPAWn-Project-main\navbar.php';
    ?>
    </header>
    <h1>Welcome to ResPAWn!</h1>
    <br>
    <a href="postorg.php">New Post</a>
    <br><br>
    <h3>Home</h3>
    <table>
        <thead>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT 
                        'user' AS source,
                        user_tb.userID AS id,
                        user_tb.userUsername AS username,
                        user_tb.userFirstName AS firstName,
                        user_tb.userLastName AS lastName,
                        postuser.userLocation AS location,
                        postuser.userCaption AS caption,
                        postuser.userImage AS image,
                        postuser.userComment AS comment,
                        postuser.userStatus AS status,
                        postuser.userPostID AS postid,
                        postuser.created_at AS created_at
                    FROM postuser
                    INNER JOIN user_tb ON postuser.uID=user_tb.userID
                    UNION ALL
                    SELECT 
                        'org' AS source,
                        org_tb.orgID AS id,
                        org_tb.orgUsername AS username,
                        org_tb.orgName AS firstName,
                        '' AS lastName,
                        postorg.orgLocation AS location,
                        postorg.orgCaption AS caption,
                        postorg.orgImage AS image,
                        postorg.orgComment AS comment,
                        postorg.orgStatus AS status,
                        postorg.orgPostID AS postid,
                        postorg.org_created_at AS created_at
                    FROM postorg
                    INNER JOIN org_tb ON postorg.oID=org_tb.orgID
                    ORDER BY created_at DESC";

            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr><td>' . ($row['firstName']) . ' ' . ($row['lastName']) . '</td></tr>';
                echo '<tr><td>' . ($row['username']) . '</td></tr>';
                echo '<tr><td>' . ($row['status']) . '</td></tr>';
                echo '<tr><td>' . ($row['location']) . '</td></tr>';
                echo '<tr><td>' . ($row['caption']) . '</td></tr>';
                if ($row['image']) {
                    echo '<tr><td><img src="'. ($row['image']) .'" style="width: 200px;"></td></tr>';
                }
                echo '<tr><td>' . ($row['comment']) . '</td></tr>';
            }
            ?>
        </tbody>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>
