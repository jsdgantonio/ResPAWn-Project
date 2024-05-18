<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="admindesignlogin.css">
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form method="post" action="admin_panel.php"> <!-- Change the action to admin_panel.php -->
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
        <?php 
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check login credentials
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Add your logic here to validate the credentials
            // For example, check against a database of admin credentials
            if ($valid_credentials) { // Replace $valid_credentials with your validation logic
                header("Location: admin_panel.php"); // Redirect to admin panel upon successful login
                exit;
            } else {
                $error_message = "Invalid email or password. Please try again."; // Display error message
            }
        }
        ?>

        <?php if(isset($error_message)) { ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php } ?>
    </div>
</body>
</html>
