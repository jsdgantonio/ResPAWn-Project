<?php 

include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResPAWn</title>
</head>
<body>
    Welcome to ResPAWn!

    <br>
    <a href="aboutus.php">About Us</a>
    <br>
    <br>
    <a href="postorg.php">New Post</a>
    <br><br>
    <p>Home</p>
    <table>
        <thead>

        </thead>
    

    <tbody>
        <?php

            $sql = "SELECT 
            'user' AS source,
            user_tb.userID AS userid,
            user_tb.userUsername AS username,
            user_tb.userFirstName AS firstName,
            user_tb.userLastName AS lastName,
            postuser.uID AS uid,
            postuser.userLocation AS location,
            postuser.userCaption AS caption,
            postuser.userImage AS image,
            postuser.userComment AS comment,
            postuser.userStatus AS status,
            postuser.userPostID AS postid
        FROM postuser
        INNER JOIN user_tb ON postuser.uID=user_tb.userID

        UNION ALL

        SELECT 
            'org' AS source,
            org_tb.orgID AS orgid,
            org_tb.orgUsername AS username,
            org_tb.orgName AS firstName,
            '' AS lastName,
            postorg.oID AS oid,
            postorg.orgLocation AS location,
            postorg.orgCaption AS caption,
            postorg.orgImage AS image,
            postorg.orgComment AS comment,
            postorg.orgStatus AS status,
            postorg.orgPostID AS postid
        FROM postorg
        INNER JOIN org_tb ON postorg.oID=org_tb.orgID

        ORDER BY postid DESC;";

            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $source = $row['source'];
                
                $username = $row['username'];
                $location = $row['location'];
                $caption = $row['caption'];
                $image = $row['image'];
                $comment = $row['comment'];
                $status = $row['status'];
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                
                if ($source === 'user') {
                    echo '
                        <tr><td>' . ($firstName) . ' ' . ($lastName) . '</td></tr>
                        <tr><td>' . ($username) . '</td></tr>
                        <tr><td>' . ($status) . '</td></tr>
                        <tr><td>' . ($location) . '</td></tr>
                        <tr><td>' . ($caption) . '</td></tr>
                        <tr><td>' . ($image) . '</td></tr>
                        <tr><td>' . ($comment) . '</td></tr>
                    ';
                } else if ($source === 'org') {
                    echo '
                        <tr><td>' . ($firstName) . '</td></tr>
                        <tr><td>' . ($username) . '</td></tr>
                        <tr><td>' . ($status) . '</td></tr>
                        <tr><td>' . ($location) . '</td></tr>
                        <tr><td>' . ($caption) . '</td></tr>
                        <tr><td>' . ($image) . '</td></tr>
                        <tr><td>' . ($comment) . '</td></tr>
                    ';
                }
            }
            

        ?>
    </tbody>
    </table>

    <a href="login.php">Logout</a>

</body>
</html>
