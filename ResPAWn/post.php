<?php 
include ("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
    <h1>Users</h1>

    <button><a href="index.php">Back to Index</a></button>

    <table>
        <thead>
            <tr>
                <th>Post ID</th>
                <th>User ID</th>
                <th>Location</th>
                <th>Caption</th>
                <th>Image</th>
                <th>Comment</th>
                <th>Status</th>
            </tr>
        </thead>
    

    <tbody>
        <?php

            $sql = "SELECT * FROM postuser ORDER BY userPostID desc";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                $userPostID =$row['userPostID'];
                $uID =$row['uID'];
                $userLocation =$row['userLocation'];
                $userCaption =$row['userCaption'];
                $userImage =$row['userImage'];
                $userComment =$row['userComment'];
                $userStatus =$row['userStatus'];

                echo '<tr>
                    <td>' . $userPostID . '</td>
                    <td>' . $uID . '</td>
                    <td>' . $userLocation . '</td>
                    <td>' . $userCaption . '</td>
                    <td>' . $userImage . '</td>
                    <td>' . $userComment . '</td>
                    <td>' . $userStatus . '</td>
                    </tr>';

            }

        ?>
    </tbody>
    </table>
</body>
</html>