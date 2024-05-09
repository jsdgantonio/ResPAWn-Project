<?php 

include("connection.php");

if (isset($_POST["submit"])) {

    $userUsername = $_POST['userUsername'];
    $userPassword = $_POST['userPassword'];
    $userFirstName = $_POST['userFirstName'];
    $userLastName = $_POST['userLastName'];
    $userEmail = $_POST['userEmail'];
    $userContact = $_POST['userContact'];

    try {

        $sql = "INSERT INTO user_tb (userUsername, userPassword, userFirstName, userLastName, userEmail, userContact)
        VALUES (:userUsername, :userPassword, :userFirstName, :userLastName, :userEmail, :userContact)";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':userUsername', $userUsername);
        $stmt->bindParam(':userPassword', $userPassword);
        $stmt->bindParam(':userFirstName', $userFirstName);
        $stmt->bindParam(':userLastName', $userLastName);
        $stmt->bindParam(':userEmail', $userEmail);
        $stmt->bindParam(':userContact', $userContact);
    
        $stmt->execute();

        header("Location: read.php");


} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
    $dbh = null;
}

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
    <a href="postuser.php">Post User</a>
    <br>
    
    <form method="post">
        <label for="userUsername">Username:</label>
        <input type="text" id="userUsername" name="userUsername" required><br><br>

        <label for="userPassword">Password:</label>
        <input type="text" id="userPassword" name="userPassword" required><br><br>

        <label for="userFirstName">First name:</label>
        <input type="text" id="userFirstName" name="userFirstName" required><br><br>
        
        <label for="userFirstName">Last name:</label>
        <input type="text" id="userLastName" name="userLastName" required><br><br>

        <label for="userEmail">Email:</label>
        <input type="email" id="userEmail" name="userEmail" required><br><br>

        <label for="userContact">Contact:</label>
        <input type="text" id="userContact" name="userContact" required><br><br>


        <button type="submit" name="submit"> Submit </button>

</body>
</html>