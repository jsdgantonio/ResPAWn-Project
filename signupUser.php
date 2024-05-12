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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="signupstyle.css" </head>
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
    </header>


<div class="container-wrapper">
    <div class="container login-container">
                <div class="form-container">
                    <div class="form-title">Sign Up</div>

    <div class="row">
    <div class="col-md-6">
        <div class="mb-3 form-floating">
            <input type="text" id="userUsername" class="form-control" name="userUsername" placeholder="Username" required><br><br>
            <label for="userUsername">Username:</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 form-floating">
        <input type="password" id="userPassword"  class="form-control" name="userPassword" placeholder="Password" required><br><br>
        <label for="userPassword">Password:</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3 form-floating">
        <input type="text" id="userFirstName" class="form-control" name="userFirstName" placeholder="First Name" required><br><br>
        <label for="userFirstName">First name:</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 form-floating">
        <input type="text" id="userLastName" class="form-control" name="userLastName" placeholder="Last Name" required><br><br>
        <label for="userLastName">Last name:</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3 form-floating">
        <input type="email" id="userEmail" class="form-control" name="userEmail" placeholder="Email" required><br><br>
        <label for="userEmail">Email:</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 form-floating">
        <input type="tel" id="userContact" class="form-control" name="userContact" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" placeholder="0912-345-6789" required><br><br>
        <label for="userContact">Contact:</label>
        </div>
    </div>
</div>

<button type="submit" name="submit"> Submit </button>

<p>Already have an account? <a href="login.php">Login Here</a>

</p>
</div>
</div>
<div class="design">
<img src="cats.png" alt="cats" width="1000px">
</div>


</body>

</html>