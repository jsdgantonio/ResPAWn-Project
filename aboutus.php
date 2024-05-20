<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="aboutusstyle.css">
    <title>About Us</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            background-image: url('images/animals-aboutus.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #333;
            opacity: 0;
            transition: opacity 1s ease-in;
        }

        body.loaded {
            opacity: 1;
        }

        header {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .fontt {
            font-weight: bold;
            font-size: 2.5em;
            color: orange;
            transition: transform 0.3s;
        }

        .text-container {
            text-align: justify;
        }

        p {
            font-size: 1.2em;
        }

        .about-link {
            text-decoration: none;
            color: inherit;
        }

        .white-container {
            background-color: rgba(255, 255, 255, 0.6);
            padding: 20px;
            border-radius: 10px;
            max-width: 80%;
            margin-top: 280px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .white-container:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    <div class="white-container">
        <a href="aboutus2.php" class="about-link">
            <div class="heading-container">
                <h1 class="fontt" style="text-align: center;">ABOUT US</h1>
            </div>
        </a>
        <div class="text-container">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('load', function() {
            document.body.classList.add('loaded');
        });
    </script>
</body>

</html>