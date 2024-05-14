<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Baloo Bhai' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <style>
        header {
            position: fixed;
            top: 0;
            width: 110%;
            height: 50px;
            background-color: #FFFFFF;
            padding: 0.5px 10px;
            box-sizing: border-box;
            z-index: 1000;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            height:100px;
        }

        .navbar-toggler {
            margin-right: 20px;
        }

        .navbar-brand img {
            width: 150px;
            max-height: 50px;
            margin: 0;
            padding: 0;
            margin-left: 30px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-toggler {
            margin-right: 20px;
        }

        .nav-links {
            list-style: none;
            display: flex;
            position: absolute;
            left: 300px;
            margin-bottom: 1px;
            margin-right: 10px;
            padding: 20px;
            margin-left:30px;    
        }

        .nav-item a {
            text-shadow: 0;
            text-decoration: none;
            color: #EF8A14;
            font-family: 'Baloo Bhai';
            font-size: 22px;
            margin-right: 20px;
            white-space: nowrap;

        }

        .navbar-nav {
            margin-right: 50px;
        }

        .form-container {
            width: 90%;
            margin: auto;
            margin-top: 20px;
            margin-bottom: 20px;
            margin-left: 30px;
            margin-right: 20px;
        }

        .navbar-nav {
    text-align: center;
}

.navbar-nav .nav-item a {
    background-color: white;
    padding: 15px 300px; 
    margin: 0;
    display: block;
    z-index: 100;
}

@media (max-width: 768px) {
    .navbar-nav .nav-item a {
        padding: 15px 300px; 
        margin-left: -100px;
    }
}
        @media only screen and (max-width: 768px) {
            .form-container2 {
                width: 300%;
            }
        }

        @media (max-width: 1800px) {
            .navbar-light .navbar-brand img {
                max-height: 200px;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0 pb-3 pt-3">

        <a href="index.html" class="navbar-brand p-0">
            <img src="RESPAWN-logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="homepageUser.php" class="nav-link">HOME</a>
                </li>
                <li class="nav-item">
                    <a href="aboutus.php" class="nav-link">ABOUT US</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
