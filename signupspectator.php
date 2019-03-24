<?php
session_start();
include('db/getfromdatabase.php');
include('db/competition_db.php');
include('db/athlete_db.php');
include('db/spectator_db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
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
            <h1>Meld på tilskuer</h1>
            <?php

                if(!empty($_SESSION['spectatorID'])) {
                    if(!empty($_POST['signup'])) {
                        addSpectatorToCompetition($_SESSION['spectatorID'], $_POST['signup']);
                    }

                    if(!empty($_POST['signoff'])) {
                        deleteSpectatorFromCompetition($_SESSION['spectatorID'], $_POST['signoff']);
                    }
                }

                if(!empty($_POST['spectator']) || !empty($_SESSION['spectatorID'])) {
                    if(!empty($_POST['spectator'])) {
                        $_SESSION['spectatorID'] = $_POST['spectator'];
                    }

                    $spectator = getSpectator($_SESSION['spectatorID']);

                    echo "<table class='table'>
                        <tr><h2>Tilskuer</h2></tr>
                        <tr>
                            <th>Fornavn</th>
                            <th>Etternavn</th>
                            <th>Adresse</th>
                            <th>Postnummer</th>
                            <th>Poststed</th>
                            <th>Telefon</th>
                            <th>Billettype</th>
                        </tr>
                        <tr>
                            <td>$spectator->Firstname</td>
                            <td>$spectator->Lastname</td>
                            <td>$spectator->Address</td>
                            <td>$spectator->Zip</td>
                            <td>$spectator->City</td>
                            <td>$spectator->Phone</td>
                            <td>$spectator->Ticket</td>
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
                    
                    spectatorSignedUpFor($_SESSION['spectatorID']);

                    echo "</table>";

                    echo "<h2>Ikke påmeldte øvelser<h3>";

                    echo "<table class='table'>
                        <tr>
                            <th>Tid</th>
                            <th>Type</th>
                            <th>Plass</th>
                            <th>Endre</th>
                        </tr>";

                    spectatorNotSignedUpFor($_SESSION['spectatorID']);

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
        <footer><p>Certinax &copy; 2019</p></footer>
    </div>
</body>
</html>