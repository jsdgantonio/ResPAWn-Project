<?php

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $orgUsername = $_POST['orgUsername'];
    $orgPassword = $_POST['orgPassword'];
    $orgName = $_POST['orgName'];
    $orgEmail = $_POST['orgEmail'];
    $orgContact = $_POST['orgContact'];

    // Check if username or email already exists
    $stmt_check = $dbh->prepare("SELECT COUNT(*) FROM org_tb WHERE orgUsername = :orgUsername OR orgEmail = :orgEmail");
    $stmt_check->bindParam(':orgUsername', $orgUsername);
    $stmt_check->bindParam(':orgEmail', $orgEmail);
    $stmt_check->execute();
    $count = $stmt_check->fetchColumn();

    if ($count > 0) {
        echo "<script type='text/javascript'> alert('Username or email already exists')</script>";
    } else {
        try {
            $stmt = $dbh->prepare("INSERT INTO org_tb (orgUsername, orgPassword, orgName, orgEmail, orgContact) VALUES (:orgUsername, :orgPassword, :orgName, :orgEmail, :orgContact)");
            $stmt->bindParam(':orgUsername', $orgUsername);
            $stmt->bindParam(':orgPassword', $orgPassword);
            $stmt->bindParam(':orgName', $orgName);
            $stmt->bindParam(':orgEmail', $orgEmail);
            $stmt->bindParam(':orgContact', $orgContact);
            $stmt->execute();
            echo "<script type='text/javascript'> alert('Successfully Registered'); window.location.href = 'homepage.php';</script>";
            exit(); // Stop further execution after redirection
        } catch (PDOException $e) {
            echo "<script type='text/javascript'> alert('Registration Failed: " . $e->getMessage() . "')</script>";
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo "<script type='text/javascript'> alert('Please Enter Valid Information')</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResPAWn - Sign Up Org</title>
    <link rel="stylesheet" href="style.css" </head>


<body>


    <h1>Welcome to ResPAWn!</h1>
    <h2>Sign Up Organization</h2>
    <h3>insert slogan kemerut</h3>

    <br>
    <a href="aboutus.php">About Us</a>
    <br>

    <form method="POST" id="signupForm">
        <label for="orgUsername">Organization Username:</label>
        <input type="text" id="orgUsername" name="orgUsername" required><br><br>

        <label for="orgPassword">Password:</label>
        <input type="password" id="orgPassword" name="orgPassword" required><br><br>

        <label for="orgName">Organization Name:</label>
        <input type="text" id="orgName" name="orgName" required><br><br>

        <label for="orgEmail">Email:</label>
        <input type="email" id="orgEmail" name="orgEmail" required><br><br>

        <label for="orgContact">Contact:</label>
        <input type="tel" id="orgContact" name="orgContact" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" placeholder="0912-345-6789" required><br><br>


        <button type="submit" name="submit"> Submit </button>

        <p>Already have an account? <a href="login.php">Login Here</a>

        </p>

</body>

</html>
