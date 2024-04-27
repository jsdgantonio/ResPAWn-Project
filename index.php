<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResPAWn</title>
</head>
<body>
    Welcome to ResPAWn!

    <br>
    <a href="aboutus.php">About Us</a>
    <br>

    <?php
    include("connection.php");

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["userID"]) && isset($_GET["action"]) && $_GET["action"] == "view") {
        $customerId = $_GET["userID"];
    
        $query = "SELECT * FROM user";
        $stmt = $conn->prepare($query);
        $stmt->bindParam($userID, PDO::PARAM_INT);
        $stmt->execute();
        $customer = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        // Handle invalid or missing parameters
        echo "Invalid request";
        exit();
    }
    ?>
    
</body>
</html>