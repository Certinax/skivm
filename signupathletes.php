<?php
include("session/sessioncontrol.php");
include('db/getfromdatabase.php');
include('db/competition_db.php');
include('db/athlete_db.php');
include('db/spectator_db.php');
include("login/logic/login.php");
include("login/modal/modal.php");
if (!$_SESSION["loggedIn"]) {
    header('Location:signin.php');
    $_SESSION["route"] = "index.php";
}
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
    <title>Ski-VM | Meld på utøver</title>
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
                    <a href="addathlete.php">Registrere utøver</a>
                    <a href="addspectator.php">Registrere tilskuer</a>
                    <a href="addcompetition.php">Registrere øvelse</a>
                </ul>
            </nav>
        </div>

        <div class="oppgave">
            <h1>Meld på utøver</h1>
            <?php

            if (!empty($_SESSION['athleteID'])) {
                if (!empty($_POST['signup'])) {
                    addAthleteToCompetition($_SESSION['athleteID'], $_POST['signup']);
                }

                if (!empty($_POST['signoff'])) {
                    deleteAthleteFromCompetition($_SESSION['athleteID'], $_POST['signoff']);
                }
            }

            if (!empty($_POST['athlete']) || !empty($_SESSION['athleteID'])) {
                if (!empty($_POST['athlete'])) {
                    $_SESSION['athleteID'] = $_POST['athlete'];
                }

                $athlete = getAthlete($_SESSION['athleteID']);

                echo "<table class='table'>
                        <tr><h2>Utøver</h2></tr>
                        <tr>
                            <th>Fornavn</th>
                            <th>Etternavn</th>
                            <th>Adresse</th>
                            <th>Postnummer</th>
                            <th>Poststed</th>
                            <th>Telefon</th>
                            <th>Nasjonalitet</th>
                        </tr>
                        <tr>
                            <td>$athlete->Firstname</td>
                            <td>$athlete->Lastname</td>
                            <td>$athlete->Address</td>
                            <td>$athlete->Zip</td>
                            <td>$athlete->City</td>
                            <td>$athlete->Phone</td>
                            <td>$athlete->Nationality</td>
                        </tr>
                    ";


                echo "<table class='table'>
                        <tr><h2>Påmeldte øvelser</h2></tr>
                        <tr>
                            <th>Tid</th>
                            <th>Type</th>
                            <th>Plass</th>
                            <th>Endre</th>
                        </tr>";

                competitionSignedUpFor($_SESSION['athleteID']);

                echo "</table>";

                echo "<h2>Ikke påmeldte øvelser<h3>";

                echo "<table class='table'>
                        <tr>
                            <th>Tid</th>
                            <th>Type</th>
                            <th>Plass</th>
                            <th>Endre</th>
                        </tr>";

                competitionNotSignedUpFor($_SESSION['athleteID']);

                echo "</table>";
            }
            ?>
        </div>

        <!-- Info section -->
        <section class="info">
            <img src="img/skicourse.jpg" alt="Skicourse">
            <div>
                <h2>Løypetrasé i Seefeld</h2>
                <p>Dette bildet eier jeg ikke rettighetene til. Viser til Seefeld sine nettsider.</p>
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