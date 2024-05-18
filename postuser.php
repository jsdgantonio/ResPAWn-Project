<?php 
session_start();
include("connection.php");

if (!isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST["submit"])) {
    $userID = $_SESSION['userID'];
    
    $userLocation = $_POST['userLocation'];
    $userCaption = $_POST['userCaption'];
    $userImage = $_POST['userImage'];
    $userStatus = $_POST['userStatus'];

    try {
        $stmt = $dbh->prepare("INSERT INTO postuser (uID, userLocation, userCaption, userImage, userStatus)
        VALUES (:uID, :userLocation, :userCaption, :userImage, :userStatus)");

        $stmt->bindParam(':uID', $userID);
        $stmt->bindParam(':userLocation', $userLocation);
        $stmt->bindParam(':userCaption', $userCaption);
        $stmt->bindParam(':userImage', $userImage);
        $stmt->bindParam(':userStatus', $userStatus);

        $stmt->execute();

        header("Location: homepageUser.php");
        exit();
    } catch (PDOException $e) {
        echo "<script type='text/javascript'>alert('Database Error: " . $e->getMessage() . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post User</title>
    <link rel="stylesheet" href="postuserstyle.css">
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
        

        <label for="userImage">Image:</label>
        <input type="file" id="userImage" name="userImage" required><br><br>

        <label for="userStatus">Status:</label>
        <select id="userStatus" name="userStatus" required>
            <option value="missing">Missing</option>
            <option value="needs_help">Needs Help</option>
            <option value="rescued">Rescued</option>
        </select><br><br>
        
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
