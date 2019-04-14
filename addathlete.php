<?php
include("session/sessioncontrol.php");
include('classes/person.php');
include("login/logic/login.php");
include("login/modal/modal.php");
if (!$_SESSION["loggedIn"]) {
    header('Location:signin.php');
    $_SESSION["route"] = "addathlete.php";
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
    <title>Ski-VM | Legg til utøver</title>
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
                    <a href="addathlete.php" id="btn-active">Registrere utøver</a>
                    <a href="addspectator.php">Registrere tilskuer</a>
                    <a href="addcompetition.php">Registrere øvelse</a>
                </ul>
            </nav>
        </div>

        <div class="oppgave">
            <h1>Registrering av utøver</h1>
            <?php
            if (
                !empty($_POST["firstname"]) &&
                !empty($_POST["lastname"]) &&
                !empty($_POST["address"]) &&
                !empty($_POST["zipcode"]) &&
                !empty($_POST["city"]) &&
                !empty($_POST["phone"]) &&
                !empty($_POST["nationality"]) &&
                !empty($_POST["submit"])
            ) {

                $fname = $_POST["firstname"];
                $lname = $_POST["lastname"];
                $address = $_POST["address"];
                $zipcode = $_POST["zipcode"];
                $city = $_POST["city"];
                $phone = $_POST["phone"];
                $nationality = $_POST["nationality"];

                $athlete = new Athlete($fname, $lname, $address, $zipcode, $city, $phone, $nationality);
                $athlete->addToDatabase();
            } else {
                if (!empty($_POST["submit"])) {
                    echo "<p style='color:red'>*Du må fylle ut alle felter</p>";
                } else {
                    echo "<p>Fyll ut informasjon</p>";
                }
            }
            ?>
            <div class="form-style">
                <form action="" method="post">
                    <fieldset>
                        <legend>Registreringsskjema</legend>
                        <input type="text" name="firstname" placeholder="Fornavn">
                        <input type="text" name="lastname" placeholder="Etternavn">
                        <input type="text" name="address" placeholder="Adresse">
                        <input type="text" name="zipcode" placeholder="Postnummer">
                        <input type="text" name="city" placeholder="Poststed">
                        <input type="text" name="phone" placeholder="Telefonnr">
                        <input type="text" name="nationality" placeholder="Nasjonalitet"><br />
                        <button type="submit" class="btn" value="submit" name="submit">Legg til</button>
                        <a href="index.php"><button type="button" class="btn-cancel" value="button" name="button">Avbryt</button></a>
                    </fieldset>
                </form>
            </div>
        </div>

        <!-- Info section -->
        <section class="info">
            <img src="img/athlete_web.jpg" alt="WorkPic">
            <div>
                <h2>Utøvere</h2>
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