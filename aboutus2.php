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
            background-image: url('animals-aboutus.png');
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
        .fonttt {
            font-weight: 500;
            font-size: 1em;
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
        .white-container, .third-container {
            background-color: rgba(255, 230, 179, 0.8);
            padding: 10px;
            border-radius: 10px;
            max-width: 60%;
            margin: auto;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .description-title, .third-container-title {
            font-weight: 600;
            font-size: 1.2em;
            text-align: center;
            margin-bottom: 10px;
        }
        .scrollable-container {
            height: 80vh;
            overflow-y: auto;
            margin-top: 110px;
        }
        .polaroid-container {
            background: white;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            margin: 10px;
            transition: transform 0.3s;
            flex: 1 0 30%;
            text-align: center;
        }
        .polaroid-img {
            width: 100%;
            display: block;
            transition: transform 0.3s;
        }
        .polaroid-text {
            text-align: center;
            padding: 10px 0;
            font-size: 1em;
        }
        .polaroid-container:hover .polaroid-img {
            transform: scale(1.1);
        }
        .polaroid-container:hover {
            transform: scale(1.05);
        }
        .third-container img {
            width: 100%;
            max-width: 150px;
            margin: 10px;
            transition: transform 0.3s;
        }
        .third-container img:hover {
            transform: scale(1.1);
        }
        .third-container .polaroid-container {
            flex: 1 0 30%;
        }
        .rescue-animal-img {
            max-width: 60%;
            margin-top: 20px;
            margin-left: 280px;
        }
        .animal{
            max-width: 60%;
            margin-top: 20px;
            margin-left: 280px;
        }
    </style>
</head>
<body>
    <header>
        <?php include '../ResPAWn-Project-main/navbar.php'; ?>
    </header>
    <!-- Scrollable container -->
    <div class="scrollable-container">
        <!-- White container -->
        <div class="white-container">
            <div class="description-title"></div>
            <!-- Clickable container -->
            <a href="aboutus2.php" class="about-link">
                <div class="heading-container">
                    <p class="fonttt" style="text-align: justify;">
                        ResPAWn connects pet owners, animal lovers, and welfare organizations to aid lost or injured animals. Users can upload pet details, alert organizations, and receive timely notifications. ResPAWn centralizes rescue efforts, aiming to improve animal welfare despite challenges. Prioritizing feedback and collaboration, ResPAWn makes a meaningful impact in animal rescue.
                    </p>
                </div>
            </a>
            <div class="text-container">
                <div style="display: flex; justify-content: center; flex-wrap: wrap;">
                    <div class="polaroid-container">
                        <img src="1animal.png" alt="Description of the image 1" class="polaroid-img img-fluid">
                        <div class="polaroid-text"></div>
                    </div>
                    <div class="polaroid-container">
                        <img src="2animal.png" alt="Description of the image 2" class="polaroid-img  img-fluid">
                        <div class="polaroid-text"></div>
                    </div>
                    <div class="polaroid-container">
                        <img src="3animal.png" alt="Description of the image 3" class="polaroid-img  img-fluid">
                        <div class="polaroid-text"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second image -->
        <img src="respawnanimals.png" alt="Rescue Animal" class="rescue-animal-img img-fluid">
        
        <!-- Third container -->
       >
            <img src="animals-aboutus2.png" alt="Description of the image" class="animal  img-fluid">
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
