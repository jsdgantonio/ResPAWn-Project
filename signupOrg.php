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
            echo "<script type='text/javascript'> alert('Successfully Registered'); window.location.href = 'homepageOrg.php';</script>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="signupstyle.css" </head>


<body>
    <header>

        <?php
        include '..\ResPAWn-Project-main\navbar2.php';
        ?>
    </header>

    <div class="container-wrapper">
        <div class="container login-container">
            <div class="form-container">
                <div class="form-title">Organization Sign Up</div>

                <form method="POST" id="signupForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 form-floating">
                                <input type="text" id="orgUsername" class="form-control" name="orgUsername" placeholder="Username" required><br><br>
                                <label for="orgUsername">Username:</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 form-floating">
                                <input type="password" id="orgPassword" class="form-control" name="orgPassword" placeholder="Password" required><br><br>
                                <label for="orgPassword">Password:</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3 form-floating">
                                <input type="text" id="orgName" class="form-control" name="orgName" placeholder="Organization Name" required><br><br>
                                <label for="orgName">Organization Name:</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 form-floating">
                                <input type="email" id="orgEmail" class="form-control" name="orgEmail" placeholder="Email" required><br><br>
                                <label for="orgEmail">Email:</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 form-floating">
                                <input type="tel" id="userContact" class="form-control" name="userContact" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" required><br><br>
                                <label for="userContact">Contact:</label>
                                <small id="contactGuide" class="form-text text-muted">Enter your contact number in the format XXXX-XXX-XXXX</small>
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="submit"> Submit </button>

                    <p class="login-message">Already have an account? <a href="login.php">Login Here</a></p>

                    </p>

            </div>
        </div>
    </div>


</body>

</html>