<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    if (!empty($Email) && !empty($Password) && !is_numeric($Email)) {
        try {
            $stmt = $dbh->prepare("SELECT userID AS id, null AS orgID, userEmail AS email FROM user_tb WHERE userEmail = :Email AND userPassword = :Password
            UNION ALL
            SELECT orgID AS id, orgID, orgEmail AS email FROM org_tb WHERE orgEmail = :Email AND orgPassword = :Password");
            
            $stmt->bindParam(':Email', $Email);
            $stmt->bindParam(':Password', $Password);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user) {
                session_start();
                $_SESSION['id'] = $user['id'];
                if ($user['orgID'] !== null) {
                    header("Location: homepageOrg.php");
                } else {
                    header("Location: homepageUser.php");
                }
                exit();
            } else {
                echo "<script type='text/javascript'>alert('Login Failed: Incorrect email or password');</script>";
            }
        } catch (PDOException $e) {
            echo "<script type='text/javascript'>alert('Database Error: " . $e->getMessage() . "');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Login Failed: Invalid input');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResPAWn - Login</title>
    <link rel="stylesheet" href="style.css" >
</head>
<body>


    <h1>Welcome to ResPAWn!</h1>
    <h2>Login</h2>
    <h3>insert slogan kemerut</h3>

    <br>
    <a href="aboutus.php">About Us</a>
    <br>

    <form method="POST">

        <label for="Email">Email:</label>
        <input type="email" id="Email" name="Email" required><br><br>   
    
        <label for="Password">Password:</label>
        <input type="text" id="Password" name="Password" required><br><br>

        <button type="submit" name="submit"> Submit </button>
        <p>Don't have an account? <a href="signup.php">Signup Here</a>

        </p>
    </form>
</body>

</html>
