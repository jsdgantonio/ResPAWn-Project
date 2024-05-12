<!DOCTYPE html>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Baloo Bhai' rel='stylesheet'>

<nav style="background-color: #FFFFFF;">
            <div class="logo-container">
                <a href="../aboutus.php">
                    <img src="navbar-imgs/RESPAWN-logo.png" alt="ResPAWn Logo">
                </a>

            </div>
            <ul class="nav-links">
                <li><a href="homepageUser.php">HOME</a></li>
                <li><a href="aboutus.php">ABOUT US</a></li>
            </ul>

        </nav>

<style>
header {
    position: fixed;
    top: 0;
    width: 110%;
    height: 50px;
    background-color: #FFFFFF;
    padding: 0.5px 30px;
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

.logo-container {
    display: flex;
    width: 300%;
    align-items: center;
    margin-left: 70px;
}

.logo-container img {
    max-height: 100px;
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

.nav-links a {
    text-shadow: 0;
    text-decoration: none;
    color: #EF8A14;
    margin-right: 20px;
    padding: 3px 5px;
    font-weight: 500;
    width: 50px;
    font-family: 'Baloo Bhai';
    font-size: 22px;
}

.user-controls {
    display: flex;
    align-items: center;
    margin-right: -10px;
    max-height: 40px;
}

.join-now{
    width: 150px;
    margin-right: 0px;
}

.join{
  background-color: #EF8A14;
  padding: 3px 15px;
  font-size: 15px;
  cursor: pointer;
  border: none;
  font-family: 'Baloo Bhai';
  font-size: 22px;
  color: white;
}

.log-in{
    width: 100px;
    margin-right: 100px;
}

.login{
  border: 2px solid black;
  background-color: white;
  color: black;
  padding: 3px 15px;
  font-size: 15px;
  cursor: pointer;
  font-family: 'Baloo Bhai';
  font-size: 22px;
    
}


.form-container {
    width: 90%;
    margin: auto;
    margin-top: 20px;
    margin-bottom: 20px;
    margin-left: 30px;
    margin-right: 20px;
}

@media only screen and (max-width: 768px) {
    .form-container2 {
        width: 100%;
    }

    .menu-icon {
        display: none;
        cursor: pointer;
        padding: 10px;
        margin-top: 10px;
    }

    .nav-links {
        display: none;
        flex-direction: column;
        align-items: center;
        width: 100%;
        position: absolute;
        top: 60px;
        left: 0;
        background-color: #FF7979;
        z-index: 999;
    }

    .nav-links.show {
        display: flex;
    }

    .nav-links li {
        text-align: center;
        margin: 10px 0;
    }

    .menu-icon {
        display: block;
    }
}

</style>

        