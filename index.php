<?php
$db = mysqli_connect("localhost", "root", "");
$sql = "CREATE DATABASE vm_ski";
mysqli_query($db, $sql);

$db = mysqli_connect("localhost", "root", "", "vm_ski");
$location = 'person.sql';

$commands = file_get_contents($location);
$db->multi_query($commands);
?>

<?php
include("getfromdatabase.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Ski-VM | Velkommen</title>
</head>
<body>
    <!-- Wrapper -->
    <div class="wrapper">

        <!-- Top container -->
        <div class="top-container">
            <header class="showcase">
                <h1>Oblig 2 - DATA1700 - Webprogrammering</h1>
                <p>S319217 - Mathias Lund Ahrn</p>
            </header>
        </div>

        <!-- Boxes Section -->
        <section class="boxes">
            <div class="box">
                <i class="fas fa-skiing-nordic fa-3x"></i>
                <h3>Utøver</h3>
                <a href="addathlete.php" class="btn">Gå til registrering</a>
            </div>
            <div class="box">
                <i class="fas fa-users fa-3x"></i>
                <h3>Tilskuer</h3>
                <a href="addspectator.php" class="btn">Gå til registrering</a>
            </div>
            <div class="box">
                <i class="fas fa-map-marked-alt fa-3x"></i>
                <h3>Øvelse</h3>
                <a href="addcompetition.php" class="btn">Gå til registrering</a>
            </div>
        </section>

        <div class="mid-container">
            <div class="oppgave">
                <h1>Liste over utøvere</h1>
                <table class="table">
                    <tr>
                        <th>Fornavn</th>
                        <th>Etternavn</th>
                        <th>Adresse</th>
                        <th>Postnummer</th>
                        <th>Poststed</th>
                        <th>Telefonnr</th>
                        <th>Nasjonalitet</th>
                        <th>Meld på øvelser</th>
                    </tr>
                    <?php showAthletes(); ?>
                </table>
            </div>
        </div>

        <div class="mid-container">
            <div class="oppgave">
                <h1>Liste over publikum</h1>
                <table class="table">
                    <tr>
                        <th>Fornavn</th>
                        <th>Etternavn</th>
                        <th>Adresse</th>
                        <th>Postnummer</th>
                        <th>Poststed</th>
                        <th>Telefonnr</th>
                        <th>Billettype</th>
                    </tr>
                    <?php showSpectators(); ?>
                </table>
            </div>
        </div>
       
        <div class="mid-container">
            <div class="oppgave">
                <h1>Liste over øvelser</h1>
                <table class="table">
                    <tr>
                        <th>Tid</th>
                        <th>Type</th>
                        <th>Plass</th>
                        <th>Info</th>
                        <th>Endre</th>
                    </tr>
                    <?php showCompetitions(); ?>
                </table>
            </div>
        </div>

        <!-- Info section -->
        <section class="info">
            <img src="img/seefeld2019LQ.jpeg" alt="Seefeldbilde">
            <div>
                <h2>Ski-VM i Seefeld i Tirrol, Østerrike 2019</h2>
                <p>Ski-VM ble arrangert i Seefeld fra 20. februar til 3. mars 2019. Dette var andre gang det ble arrangert i denne byen, sist gang var i 1985.</p>
            </div>
        </section>


        <!-- Footer -->
        <footer><p>Certinax &copy; 2019</p></footer>
    </div>
</body>
</html>