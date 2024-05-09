<?php 
include ("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
</head>
<body>
    <h1>Users</h1>

    <button><a href="index.php">Back to Index</a></button>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact</th>
            </tr>
        </thead>
    

    <tbody>
        <?php

            $sql = "SELECT * FROM user_tb ORDER BY userID desc";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
                $userID =$row['userID'];
                $userUsername =$row['userUsername'];
                $userPassword =$row['userPassword'];
                $userFirstName =$row['userFirstName'];
                $userLastName =$row['userLastName'];
                $userEmail =$row['userEmail'];
                $userContact =$row['userContact'];

                echo '<tr>
                    <td>' . $userID . '</td>
                    <td>' . $userUsername . '</td>
                    <td>' . $userPassword . '</td>
                    <td>' . $userFirstName . '</td>
                    <td>' . $userLastName . '</td>
                    <td>' . $userEmail . '</td>
                    <td>' . $userContact . '</td>
                    </tr>';

            }

        ?>
    </tbody>
    </table>
</body>
</html>