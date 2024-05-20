<?php
session_start();
include("connection.php");

if (!isset($_SESSION['orgID'])) {
    header("Location: loginUser.php");
    exit;
}

if (isset($_POST["submit"])) {
    $orgID = $_SESSION['orgID'];
    $orgLocation = $_POST['orgLocation'];
    $orgCaption = $_POST['orgCaption'];
    $orgStatus = $_POST['orgStatus'];
    $statusofPost = "Pending"; // default status of post

    // File upload handling
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["orgImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["orgImage"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["orgImage"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["orgImage"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["orgImage"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Inserting data into the database
    try {
        $stmt = $dbh->prepare("INSERT INTO postorg (oID, orgLocation, orgCaption, orgImage, orgStatus, statusofPost) 
                               VALUES (:oID, :orgLocation, :orgCaption, :orgImage, :orgStatus, :statusofPost)");

        $stmt->bindParam(':oID', $orgID);
        $stmt->bindParam(':orgLocation', $orgLocation);
        $stmt->bindParam(':orgCaption', $orgCaption);
        $stmt->bindParam(':orgImage', $target_file); // Store the file path in the database
        $stmt->bindParam(':orgStatus', $orgStatus);
        $stmt->bindParam(':statusofPost', $statusofPost);

        $stmt->execute();

        // Redirect to homepageOrg.php with query parameter
        header("Location: homepageOrg.php?posted=true");
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
    <form method="post" enctype="multipart/form-data">
        <br>
        <a href="homepageOrg.php">Back To Homepage</a>
        <br>
        <label for="orgLocation">Location:</label>
        <input type="text" id="orgLocation" name="orgLocation" required><br><br>

        <label for="orgCaption">Caption:</label>
        <input type="text" id="orgCaption" name="orgCaption" required><br><br>

        <label for="orgImage">Image:</label>
        <input type="file" id="orgImage" name="orgImage" required><br><br>

        <label for="orgStatus">Status:</label>
        <select id="orgStatus" name="orgStatus" required>
            <option value="Open for Adoption">Open for Adoption</option>
            <option value="Adopted">Adopted</option>
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