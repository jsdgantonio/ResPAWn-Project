<?php 
session_start();
include("connection.php");

if (!isset($_SESSION['orgID'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST["submit"])) {
    $orgID = $_SESSION['orgID'];
    
    $orgLocation = $_POST['orgLocation'];
    $orgCaption = $_POST['orgCaption'];
    $orgImage = $_POST['orgImage'];
    $orgStatus = $_POST['orgStatus'];

    try {
        $stmt = $dbh->prepare("INSERT INTO postorg (oID, orgLocation, orgCaption, orgImage, orgStatus)
        VALUES (:oID, :orgLocation, :orgCaption, :orgImage, :orgStatus)");

        $stmt->bindParam(':oID', $orgID);
        $stmt->bindParam(':orgLocation', $orgLocation);
        $stmt->bindParam(':orgCaption', $orgCaption);
        $stmt->bindParam(':orgImage', $orgImage);
        $stmt->bindParam(':orgStatus', $orgStatus);

        $stmt->execute();

        header("Location: homepageOrg.php");
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
    <title>Post Org</title>
    <link rel="stylesheet" href="postuserstyle.css">
</head>
<body>
    <br>
    <a href="index.php">Back To Index</a>
    <br>
    
    <form method="post">
        <label for="orgLocation">Location:</label>
        <input type="text" id="orgLocation" name="orgLocation" required><br><br>

        <label for="orgCaption">Caption:</label>
        <input type="text" id="orgCaption" name="orgCaption" required><br><br>
        
        <label for="orgImage">Image:</label>
        <input type="file" id="orgImage" name="orgImage" required><br><br>

        <label for="orgStatus">Status:</label>
        <select id="orgStatus" name="orgStatus" required>
            <option value="missing">Missing</option>
            <option value="needs_help">Needs Help</option>
            <option value="rescued">Rescued</option>
        </select><br><br>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
