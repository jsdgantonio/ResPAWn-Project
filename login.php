<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    if (!empty($Email) && !empty($Password) && !is_numeric($Email)) {
        try {
            $stmt = $dbh->prepare("SELECT userID AS id, null AS type, userEmail AS email FROM user_tb WHERE userEmail = :Email AND userPassword = :Password
            UNION ALL
            SELECT orgID AS id, 'org' AS type, orgEmail AS email FROM org_tb WHERE orgEmail = :Email AND orgPassword = :Password");

            $stmt->bindParam(':Email', $Email);
            $stmt->bindParam(':Password', $Password);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                session_start();
                if ($user['type'] === 'org') {
                    $_SESSION['orgID'] = $user['id'];
                    header("Location: homepageOrg.php");
                } else {
                    $_SESSION['userID'] = $user['id'];
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
    <link rel="stylesheet" href="loginstyle.css">
</head>

<body>

    <header>
        <header>
            <?php
            include 'navbar2.php';
            ?>
        </header>
    </header>


    <div class="feed-container">
        <div class="welcome-container text-center mb-4">
            <h1 class="text1">WELCOME TO RESPAWN!</h1>
            <div class="row">



                <form method="POST">

                    <label for="Email">Email:</label>
                    <input type="email" id="Email" name="Email" required><br><br>

                    <label for="Password">Password:</label>
                    <input type="password" id="Password" name="Password" required><br><br>

                    <button type="submit" name="submit"> Login </button>
                    <p>Don't have an account? <a href="index.php">Signup Here</a>

                    </p>
                </form>
</body>

</html>