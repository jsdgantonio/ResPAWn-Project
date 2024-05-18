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
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Poppins', sans-serif;
                background-color: #ffaf13;
                color: #333;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100vh;
                padding: 20px;
                text-align: center;
                background-size: cover;
                background-repeat: repeat-y;
                background-image: url('background-paw.png');
            }

            h1 {
                font-size: 2.5rem;
                margin-bottom: 10px;
            }

            h2 {
                font-size: 1.5rem;
                margin-bottom: 20px;
            }

            a {
                color: #333;
                text-decoration: none;
                font-weight: bold;
                margin-bottom: 20px;
                display: inline-block;
            }

            a:hover {
                text-decoration: underline;
            }

            .container-wrapper {
                width: 100%;
                max-width: 1200px;
                margin: auto;
                padding: 20px;
            }

            .form-container {
                background-color: rgba(255, 255, 255, .9);
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 30px rgba(0, 0, 0, .15);
                width: 100%;
                max-width: 600px;
                text-align: left;
            }

            label {
                display: block;
                margin-bottom: 10px;
                font-weight: bold;
            }

            input[type="text"],
            input[type="password"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #ddd;
                border-radius: 5px;
            }

            button {
                background-color: #333;
                color: white;
                border: none;
                padding: 10px 20px;
                cursor: pointer;
                border-radius: 5px;
                font-weight: bold;
                width: 100%;
                font-family: 'Poppins', sans-serif;
            }

            button:hover {
                background-color: #555;
            }

            p {
                margin-top: 10px;
            }

            p a {
                color: #333;
                text-decoration: underline;
            }

            @media (max-width: 600px) {
                .form-container {
                    padding: 15px;
                }

                input[type="text"],
                input[type="password"] {
                    padding: 8px;
                }

                button {
                    padding: 8px 15px;
                }
            }

            .text1 {
                font-family: 'Baloo Bhai', cursive;
                color: #ffffff;
                text-shadow: 2px 4px 3px rgba(0, 0, 0, 0.3);
            }
        </style>
    </head>



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
