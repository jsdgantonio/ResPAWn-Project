<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $userPassword = $_POST['userPassword'];
    $userEmail = $_POST['userEmail'];


    if (!empty($userEmail) && !empty($userPassword) && !is_numeric($userEmail)) {
        try {
            $stmt = $dbh->prepare("SELECT * FROM user_tb WHERE userEmail = :userEmail
            INNER JOIN user_tb ON user_tb.userID=postuser.uID
            ");
            $stmt->bindParam(':userEmail', $userEmail);
            $stmt->execute();
            $user = $stmt->fetch();

            if ($userEmail === $user['userEmail'] AND $userPassword === $user['userPassword']) {
                echo "<script type='text/javascript'> alert('Successful Login')</script>";
            } else {
                echo "<script type='text/javascript'> alert('Login Failed: Incorrect email or password')</script>";
            }
        } catch (PDOException $e) {
            echo "<script type='text/javascript'> alert('Database Error: " . $e->getMessage() . "')</script>";
        }
    }
    header("Location: homepageUser.php");

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

        <label for="userEmail">Email:</label>
        <input type="email" id="userEmail" name="userEmail" required><br><br>   
    
        <label for="userPassword">Password:</label>
        <input type="text" id="userPassword" name="userPassword" required><br><br>

        <button type="submit" name="submit"> Submit </button>
        <p>Don't have an account? <a href="signup.php">Signup Here</a>

        </p>
</form>
</body>

</html>