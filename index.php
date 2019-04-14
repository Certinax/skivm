<?php
$db = mysqli_connect("localhost", "root", "");
$sql = "CREATE DATABASE vm_ski";
mysqli_query($db, $sql);

$db = mysqli_connect("localhost", "root", "", "vm_ski");
$location = 'vm_ski.sql';

$commands = file_get_contents($location);
$db->multi_query($commands);
?>

<?php
require("session/sessioncontrol.php");
include("db/getfromdatabase.php");
include("registrations.php");
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
    <title>Ski-VM | Velkommen</title>
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
            <div class="menu-btn">
                <div class="btn-line"></div>
                <div class="btn-line"></div>
                <div class="btn-line"></div>
            </div>
        </div>

        <?php if ($_SESSION["loggedIn"] == 1) {
            echo "<p class='loggedin'>Logged in</p>";
            showRegistration();
        } else {
            echo "<p class='loggedout'>Not Logged in - Sign in to edit</p>";
        }
        // echo '<pre>';
        // var_dump($_SESSION);
        // echo '</pre>';
        // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
        // echo session_id();
        //var_dump($_SESSION["logout"]);

        // phpinfo();
        ?>




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
                        <?php
                        if ($_SESSION["loggedIn"]) {
                            echo "<th>Meld på øvelser</th>";
                        }
                        ?>
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
                        <?php
                        if ($_SESSION["loggedIn"]) {
                            echo "<th>Meld på øvelser</th>";
                        }
                        ?>
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
                        <?php
                        if ($_SESSION["loggedIn"]) {
                            echo "<th>Endre</th>";
                        }
                        ?>
                    </tr>
                    <?php showCompetitions(); ?>
                </table>
            </div>
        </div>

        <!-- Info section -->
        <section class="info">
            <img src="img/seefeld2019LQ.jpeg" alt="Seefeldbilde">
            <div>
                <h2>Ski-VM i Seefeld i Tirol, Østerrike 2019</h2>
                <p>Ski-VM ble arrangert i Seefeld fra 20. februar til 3. mars 2019. Dette var andre gang det ble arrangert i denne byen, sist gang var i 1985.</p>
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