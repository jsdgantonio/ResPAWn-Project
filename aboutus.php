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
            background-image: url('animals-aboutus.png'); /* Corrected syntax */
            background-size: cover; /* Ensures the image covers the entire page */
            background-position: center; /* Centers the background image */
            background-repeat: no-repeat; /* Prevents the background image from repeating */
            background-attachment: fixed; /* Keeps the background image fixed in place during scroll */
            font-family: 'Poppins', sans-serif; /* Applying the Poppins font to the body */
            display: flex;
            flex-direction: column; /* Set flex direction to column */
            justify-content: center; /* Center content vertically */
            align-items: center; /* Center content horizontally */
            color: #333; /* Text color for better readability */
            opacity: 0; /* Start with the body hidden */
            transition: opacity 1s ease-in; /* Add a transition for the opacity */
        }
        body.loaded {
            opacity: 1; /* Show the body when the class is added */
        }
        header {
            background-color: rgba(255, 255, 255, 0.8); /* Slightly transparent background for the header */
            padding: 10px;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .fontt {
            font-weight: bold;
            font-size: 2.5em; /* Increase the font size for the "About Us" text */
            color: orange;
            transition: transform 0.3s; /* Add transition for scaling */
        }
        .text-container {
            text-align: justify;
        }
        p {
            font-size: 1.2em; /* Increase the font size for paragraphs */
        }
        /* Style for the link */
        .about-link {
            text-decoration: none; /* Remove underline */
            color: inherit; /* Inherit text color */
        }
        /* Style for the white container */
        .white-container {
            background-color: rgba(255, 255, 255, 0.6); /* Slightly transparent white background */
            padding: 20px; /* Add padding */
            border-radius: 10px; /* Rounded corners */
            max-width: 80%; /* Limit container width */
            margin-top:280px; /* Add margin to separate from the header */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Box shadow for depth */
            transition: transform 0.3s; /* Add transition for scaling */
        }
        .white-container:hover {
            transform: scale(1.05); /* Scale up on hover */
        }
        
    </style>
</head>
<body>
    <header>
        <?php include '../ResPAWn-Project-main/navbar.php'; ?>
    </header>
    <!-- White container -->
    <div class="white-container">
        <!-- Clickable container -->
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
        // Wait for the entire page to load
        window.addEventListener('load', function() {
            document.body.classList.add('loaded');
        });
    </script>
</body>
</html>
