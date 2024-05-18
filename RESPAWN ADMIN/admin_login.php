<?php
include("connection.php");

session_start();

// Check if admin is already logged in, redirect to admin panel if logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin_panel.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace these with your actual admin credentials
    $admin_email = "admin@email.com";
    $admin_password = "admin";

    // Get email and password from the form submission
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the submitted email and password match the admin credentials
    if ($email === $admin_email && $password === $admin_password) {
        // Set session variables to indicate admin is logged in
        $_SESSION['admin_logged_in'] = true;
        // Redirect to admin panel
        header("Location: admin_panel.php");
        exit();
    } else {
        // Display error message if credentials are incorrect
        $error_message = "Incorrect email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="css" href="admindesignlogin.css">
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
        <?php if(isset($error_message)) { ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php } ?>
    </div>
</body>
</html>