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
    $userStatus = $_POST['userStatus'];

    // File upload handling
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["userImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["userImage"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["userImage"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["userImage"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["userImage"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Inserting data into database
    try {
        $stmt = $dbh->prepare("INSERT INTO postuser (uID, userLocation, userCaption, userImage, userStatus)
        VALUES (:uID, :userLocation, :userCaption, :userImage, :userStatus)");

        $stmt->bindParam(':uID', $userID);
        $stmt->bindParam(':userLocation', $userLocation);
        $stmt->bindParam(':userCaption', $userCaption);
        $stmt->bindParam(':userImage', $target_file); // Store the file path in the database
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

    <form method="post" enctype="multipart/form-data">
        <label for="userLocation">Location:</label>
        <input type="text" id="userLocation" name="userLocation" required><br><br>

        <label for="userCaption">Caption:</label>
        <input type="text" id="userCaption" name="userCaption" required><br><br>

        <label for="userImage">Image:</label>
        <input type="file" id="userImage" name="userImage" required><br><br>

        <label for="userStatus">Status:</label>
        <select id="userStatus" name="userStatus" required>
            <option value="Missing">Missing</option>
            <option value="Found">Found</option>
            <option value="Needs Help">Needs Help</option>
            <option value="Rescued">Rescued</option>
        </select><br><br>

        <button type="submit" name="submit">Submit</button>
    </form>

</body>

</html>
