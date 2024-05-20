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
    $statusofPost = "Pending"; // default status of post

    // File upload handling
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["userImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["userImage"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["userImage"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["userImage"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["userImage"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Inserting data into the database
    try {
        $stmt = $dbh->prepare("INSERT INTO postuser (uID, userLocation, userCaption, userImage, userStatus, statusofPost) 
                               VALUES (:uID, :userLocation, :userCaption, :userImage, :userStatus, :statusofPost)");

        $stmt->bindParam(':uID', $userID);
        $stmt->bindParam(':userLocation', $userLocation);
        $stmt->bindParam(':userCaption', $userCaption);
        $stmt->bindParam(':userImage', $target_file); // Store the file path in the database
        $stmt->bindParam(':userStatus', $userStatus);
        $stmt->bindParam(':statusofPost', $statusofPost);

        $stmt->execute();

        // Redirect with a query parameter to trigger the popup
        header("Location: homepageUser.php?posted=true");
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
    <form method="post" enctype="multipart/form-data">
        <br>
        <a href="homepageUser.php">Back To Homepage</a>
        <br>
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

    <!-- Popup Modal -->
    <div id="popupModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Your post has been submitted. Please check your profile page for the status of your post.</p>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("popupModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // Check if the URL contains the query parameter
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('posted')) {
            // Show the modal
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</body>

</html>