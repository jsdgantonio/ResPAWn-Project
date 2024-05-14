<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResPAWn Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Custom CSS */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffaf13;
            color: #333;
            margin-top: 200px; /* Increased margin-top */
        }

        .font {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            font-weight: 400;
            color: #333;
            text-align: center;
            margin-top: 30px; /* Adjusted margin-top */
        }

        .font1 {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            font-weight: 550;
            color: #333;
            text-align: center;
            margin-top: 30px; /* Adjusted margin-top */
        }

        .font-bold {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            text-align: center;
            margin-top: 30px; /* Adjusted margin-top */
        }

        .rounded-square-container {
            display: block;
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 250px;
            margin-left: auto;
            margin-right: auto; /* Center align */
            margin-top: 70px; /* Adjusted margin-top */
            margin-bottom: 30px; /* Increased margin-bottom */
        }

        .rounded-square-container:hover {
            background-color: #000000;
            transform: scale(1.02);
        }

        .column {
            flex: 50%;
            padding: 0 5px;
        }

        @media (max-width: 768px) {
            .column {
                flex: 100%;
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <header>
        <?php
        include '..\ResPAWn-Project-main\navbar.php';
        ?>
    </header>

    <div class="container mt-5">
        <h1 class="font-bold text-center">Welcome to ResPAWn!</h1>
        <div class="text-center">
            <h3 class="font1">Choose your account type</h3>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-md-4">
                <a href="signupUser.php" class="rounded-square-container">
                    <img src="user.png" alt="User" width="100">
                    <h2 class="font1">User</h2>
                </a>
            </div>
            <div class="col-md-4">
                <a href="signupOrg.php" class="rounded-square-container">
                    <img src="org.png" alt="Organization" width="100">
                    <h2 class="font1">Organization</h2>
                </a>
            </div>
        </div>
    </div>

    <div class="container mt-3 text-center">
        <p>Already have an account? <a href="login.php">Login Here</a></p>
    </div>


    <!-- Bootstrap 5 JavaScript bundle from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
