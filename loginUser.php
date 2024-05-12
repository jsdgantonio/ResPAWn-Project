<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $userPassword = $_POST['userPassword'];
    $userUsername = $_POST['userUsername'];


    if (!empty($userUsername) && !empty($userPassword) && !is_numeric($userUsername)) {
        try {
            $stmt = $dbh->prepare("SELECT * FROM user_tb WHERE userUsername = :userUsername
            INNER JOIN user_tb ON user_tb.userID=postuser.uID
            ");
            $stmt->bindParam(':userUsername', $userUsername);
            $stmt->execute();
            $user = $stmt->fetch();

            if ($userUsername === $user['userUsername'] and $userPassword === $user['userPassword']) {
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
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ResPAWn - Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="loginstyle.css" </head>
        <script type="text/javascript">
            function redirectToLogin() {
                window.location.href = "index.php";
            }
        </script>

    <body>
        <header>
            <?php
            include '..\ResPAWn-Project-main\navbar.php';
            ?>
</head>

<body>

    <div class="container-wrapper">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6 offset-md-6">
                    <div class="form-container text-end">

                        <div class="form-title" style="text-align: left;">Login</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 form-floating">
                                    <input type="text" id="userUsername" class="form-control" name="userUsername" placeholder="Username" required><br><br>
                                    <label for="userUsername">Username:</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 form-floating">
                                    <input type="password" id="userPassword" class="form-control" name="userPassword" placeholder="Password" required><br><br>
                                    <label for="userPassword">Password:</label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" name="submit"> Login </button>
                        </div>

                        <p style="text-align: left;">Don't have an account? <a href="signupUser.php">Signup Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </p>
    </div>
    </div>

    </div>


</body>

</html>
