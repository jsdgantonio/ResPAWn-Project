

<?php 

include("connection.php");

if (isset($_POST["submit"])) {

    $userLocation = $_POST['userLocation'];
    $userCaption = $_POST['userCaption'];
    $userImage = $_POST['userImage'];
    $userComment = $_POST['userComment'];
    $userStatus = $_POST['userStatus'];

    try {

        $sql = "INSERT INTO postuser (userLocation, userCaption, userImage, userComment, userStatus)
        VALUES (:userLocation, :userCaption, :userImage, :userComment, :userStatus)";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':userLocation', $userLocation);
        $stmt->bindParam(':userCaption', $userCaption);
        $stmt->bindParam(':userImage', $userImage);
        $stmt->bindParam(':userComment', $userComment);
        $stmt->bindParam(':userStatus', $userStatus);
    
        $stmt->execute();

        header("Location: index.php");


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
    <title>Post User</title>
</head>
<body>
    <br>
    <a href="index.php">Back To Index</a>
    <br>
    
    <form method="post">

        <label for="userLocation">Location:</label>
        <input type="text" id="userLocation" name="userLocation" required><br><br>

        <label for="userCaption">Caption:</label>
        <input type="text" id="userCaption" name="userCaption" required><br><br>
        
        <label for="userFirstName">Image:</label>
        <input type="text" id="userImage" name="userImage"><br><br>

        <label for="userEmail">Comment:</label>
        <input type="text" id="userComment" name="userComment"><br><br>

        <label for="userContact">Status:</label>
        <input type="text" id="userStatus" name="userStatus" required><br><br>


        <button type="submit" name="submit"> Submit </button>

</body>
</html>