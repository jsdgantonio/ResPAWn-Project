<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Baloo Bhai' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <style>
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #FFFFFF;
            padding: 10px 20px; 
            box-sizing: border-box;
            z-index: 1000;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand img {
            width: 150px;
        }

        .navbar-nav .nav-item {
            margin-left: 20px;
        }

        .nav-item:last-child {
            margin-right: 0;
        }

        .nav-item a {
            text-decoration: none;
            color: #EF8A14;
            font-family: 'Baloo Bhai';
            font-size: 22px;
        }

        .navbar-collapse {
            padding-right: 20px; 
        }
    </style>
</head>
<body>

<?php
session_start();
?>


<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0 pb-3 pt-3">
        <a class="navbar-brand">
            <img src="images\RESPAWN-logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="homepageUser.php" class="nav-link">HOME</a>
                </li>
                <li class="nav-item">
                    <a href="aboutus.php" class="nav-link">ABOUT US</a>
                </li>
                <li class="nav-item">
                <?php if (isset($_SESSION['orgID']) || isset($_SESSION['userID'])): ?>
                <?php if (isset($_SESSION['orgID'])): ?>
                    <a href="profileOrg.php" class="nav-link">MY PROFILE</a>
                <?php else: ?>
                    <a href="profileUser.php" class="nav-link">MY PROFILE</a>
                <?php endif; ?>
                <?php else: ?>
                    <a href="login.php" class="nav-link">MY PROFILE</a>
                <?php endif; ?>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link" style="color: #616467; text-decoration: none;" onmouseover="this.style.color='black'" onmouseout="this.style.color='darkgray'">LOGOUT</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>