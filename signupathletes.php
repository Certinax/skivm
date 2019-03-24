<?php
session_start();
include('getfromdatabase.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Ski-VM | Meld på utøver</title>
</head>
<body>
    <!-- Wrapper -->
    <div class="wrapper">

        <!-- Top container -->
        <div class="top-container">
            <header class="showcase">
                <h1>Oblig2 - DATA1700 - Webprogrammering</h1>
                <p>S319217 - Mathias Lund Ahrn</p>
            </header>
        </div>


        <div class="oppgave">
            <h1>Meld på utøver</h1>
            <?php

                if(!empty($_SESSION['athleteID'])) {
                    if(!empty($_POST['signup'])) {
                        addAthleteToCompetition($_SESSION['athleteID'], $_POST['signup']);
                    }

                    if(!empty($_POST['signoff'])) {
                        deleteAthleteFromCompetition($_SESSION['athleteID'], $_POST['signoff']);
                    }
                }

                if(!empty($_POST['athlete']) || !empty($_SESSION['athleteID'])) {
                    if(!empty($_POST['athlete'])) {
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
                <h2>Oppsummering av oblig</h2>
                <p>Fyll inn erfaring/utfordringer osv...</p>
            </div>
        </section>


        <!-- Footer -->
        <footer><p>Certinax &copy; 2019</p></footer>
    </div>
</body>
</html>