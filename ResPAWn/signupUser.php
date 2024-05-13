<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $userUsername = $_POST['userUsername'];
    $userPassword = $_POST['userPassword'];
    $userFirstName = $_POST['userFirstName'];
    $userLastName = $_POST['userLastName'];
    $userEmail = $_POST['userEmail'];
    $userContact = $_POST['userContact'];

    try {
        $stmt = $dbh->prepare("INSERT INTO user_tb (userUsername, userPassword, userFirstName, userLastName, userEmail, userContact) VALUES (:userUsername, :userPassword, :userFirstName, :userLastName, :userEmail, :userContact)");
        $stmt->bindParam(':userUsername', $userUsername);
        $stmt->bindParam(':userPassword', $userPassword);
        $stmt->bindParam(':userFirstName', $userFirstName);
        $stmt->bindParam(':userLastName', $userLastName);
        $stmt->bindParam(':userEmail', $userEmail);
        $stmt->bindParam(':userContact', $userContact);
        $stmt->execute();
        echo "<script type='text/javascript'> alert('Successfully Registered')</script>";
    } catch (PDOException $e) {
        echo "<script type='text/javascript'> alert('Registration Failed: " . $e->getMessage() . "')</script>";
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
    <title>ResPAWn - Sign Up User</title>
    <link rel="stylesheet" href="style.css" </head>
    <script type="text/javascript">
        function redirectToLogin() {
            window.location.href = "index.php";
        }
    </script>

<body>


    <h1>Welcome to ResPAWn!</h1>
    <h2>Sign Up</h2>
    <h3>insert slogan kemerut</h3>

    <br>
    <a href="aboutus.php">About Us</a>
    <br>

    <form method="POST">
        <label for="userUsername">Username:</label>
        <input type="text" id="userUsername" name="userUsername" required><br><br>

        <label for="userPassword">Password:</label>
        <input type="password" id="userPassword" name="userPassword" required><br><br>

        <label for="userFirstName">First name:</label>
        <input type="text" id="userFirstName" name="userFirstName" required><br><br>

        <label for="userFirstName">Last name:</label>
        <input type="text" id="userLastName" name="userLastName" required><br><br>

        <label for="userEmail">Email:</label>
        <input type="email" id="userEmail" name="userEmail" required><br><br>

        <label for="userContact">Contact:</label>
        <label for="userContact">Contact:</label>
        <input type="tel" id="userContact" name="userContact" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" placeholder="0912-345-6789" required><br><br>


        <button type="submit" name="submit"> Submit </button>

        <p>Already have an account? <a href="login.php">Login Here</a>

        </p>
</body>

</html>