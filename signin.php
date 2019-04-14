<?php
include("session/sessioncontrol.php");
include('classes/administrator.php');
include("login/logic/login.php");
include("login/modal/modal.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/form-style.css">
    <link rel="stylesheet" href="css/mongo.css">
    <link rel="shortcut icon" href="img/skier.ico" type="image/x-icon">
    <script src="js/validation/inputvalidation.js"></script>
    <title>Ski-VM | Signin</title>
</head>

<body>
    <!-- Wrapper -->
    <div class="wrapper">

        <!-- Top container -->
        <div class="top-container">
            <header class="showcase">
                <h1>Ski-VM Sefeeld - Østerrike 2019</h1>
            </header>
        </div>

        <!-- Default nav-bar -->
        <div class="main-nav">
            <div class="menu-btn">
                <div class="btn-line"></div>
                <div class="btn-line"></div>
                <div class="btn-line"></div>
            </div>
        </div>

        <?php loginStatus() ?>

        <!-- Navigation bar -->
        <div class="main-nav">
            <nav>
                <ul>
                    <a href="index.php">Hjem</a>
                    <?php
                    if ($_SESSION["loggedIn"]) {
                        echo "
                        <a href='addathlete.php'>Registrere utøver</a>
                        <a href='addspectator.php'>Registrere tilskuer</a>
                        <a href='addcompetition.php'>Registrere øvelse</a>
                        ";
                    }
                    ?>
                </ul>
            </nav>
        </div>

        <div class="oppgave">
            <h1>Innlogging</h1>

            <div class="form-style">
                <form class="form-basics" action="" method="post">
                    <fieldset>
                        <?php
                        if ($_SESSION["loggedIn"]) {
                            isLoggedin();
                        } else {
                            notLoggedIn();
                            if(isset($_SESSION["route"]) && $_SESSION["loggedIn"]) {
                                header("Location:" . $_SESSION["route"]);
                            }
                        }
                        ?>
                    </fieldset>
                </form>
            </div>

        </div>

        <!-- Info section -->
        <section class="info">
            <img src="img/racetrack_web.jpg" alt="WorkPic">
            <div>
                <h2>Showcase</h2>
                <p>Bildet er hentet fra <a id="no-decoration" target="_blank" href="https://www.seefeld2019.com/en/presse-rubrik/press-images">seefeld2019.com</a> sine nettsider.</p>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <p>Certinax &copy; 2019 | Mathias Lund Ahrn s319217</p>
        </footer>
    </div>

</body>
<script src="js/menu.js"></script>


</html>