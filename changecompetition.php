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
    <title>Ski-VM | Endre øvelse</title>
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
            <?php

            if (!empty($_POST['change'])) {
                if (
                    !empty($_POST['time']) &&
                    !empty($_POST['type']) &&
                    !empty($_POST['place'])
                ) {

                    $id = $_POST['change'];
                    $time = $_POST['time'];
                    $type = $_POST['type'];
                    $place = $_POST['place'];

                    updateCompetition($id, $time, $type, $place);
                }
            }

            if (!empty($_POST['delete'])) {
                $id = $_POST['delete'];
                deleteCompetition($id);
                updateCompetitionSpectator($id);
                updateCompetitionAthlete($id);
            }

            if (!empty($_POST['change']) || !empty($_SESSION['competitionID'])) {
                if (!empty($_POST['change'])) {
                    $_SESSION['competitionID'] = $_POST['change'];
                }

                $competition = getCompetition($_SESSION['competitionID']);

                echo "
                        <h1>Endre øvelse - $competition->Type</h1>
                    ";

                echo "
                    <div class='form-style'>
                    <form action='' method='post'>
                    <fieldset>
                        <legend>Endringsskjema</legend>
                        <label>Tidspunkt:</label>
                        <input type='text' name='time' value='$competition->Time'/>
                        <label>Type øvelse:</label>
                        <input type='text' name='type' value='$competition->Type'/>
                        <label>Plass:</label>
                        <input type='text' name='place' value='$competition->Place' />
                        <button name='change' class='btn' value='" . $_SESSION['competitionID'] . "'>Endre</button>
                        <button name='delete' class='btn-danger' value='" . $_SESSION['competitionID'] . "'>Slett</button>
                        <a href='index.php'><button type='button' class='btn-cancel' value='button' name='button'>Avbryt</button></a>
                    </fieldset>
                    </form>
                    </div>
                    ";
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