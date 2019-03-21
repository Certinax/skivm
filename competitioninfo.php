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
    <title>Webprogrammering</title>
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
            <h1>Øvelse</h1>
            <?php

               

                if(!empty($_POST['competition']) || !empty($_SESSION['competitionID'])) {
                    if(!empty($_POST['athlete'])) {
                    }
                    $_SESSION['competitionID'] = $_POST['competition'];

                    $competition = getCompetition($_SESSION['competitionID']);

                    echo "Tid: ";
                    echo $competition->Time;
                    echo "<br />Type øvelse: ";
                    echo $competition->Type;
                    echo "<br />Sted: ";
                    echo $competition->Place;

                    echo "<h2>Påmeldte på øvelse</h2>";

                    echo "<table class='table'>
                        <tr>
                            <th>Fornavn</th>
                            <th>Etternavn</th>
                            <th>Adresse</th>
                            <th>Postnummer</th>
                            <th>Poststed</th>
                            <th>Telefon</th>
                            <th>Nasjonalitet</th>
                        </tr>";
                    
                    athletesSignedUp($_SESSION['competitionID']);
                
                    echo "</table>";
                }
            
            
            ?>  
        </div>


        


        <!-- Info section -->
        <section class="info">
            <img src="img/business.jpeg" alt="WorkPic">
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