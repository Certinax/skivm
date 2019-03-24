<?php
include('classes/person.php');
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
    <title>Ski-VM | Legg til tilskuer </title>
</head>
<body>
    <!-- Wrapper -->
    <div class="wrapper">

        <!-- Top container -->
        <div class="top-container">
            <header class="showcase">
                <h1>Legg til tilskuer - DATA1700 - Webprogrammering</h1>
                <p>S319217 - Mathias Lund Ahrn</p>
            </header>
        </div>


        <div class="oppgave">
            <h1>Registrering av tilskuer</h1>
            <?php
            if(!empty($_POST["firstname"]) &&
                !empty($_POST["lastname"]) &&
                !empty($_POST["address"]) &&
                !empty($_POST["zipcode"]) &&
                !empty($_POST["city"]) &&
                !empty($_POST["phone"]) &&
                !empty($_POST["ticket"]) &&
                !empty($_POST["submit"])) {

                    $fname = $_POST["firstname"];
                    $lname = $_POST["lastname"];
                    $address = $_POST["address"];
                    $zipcode = $_POST["zipcode"];
                    $city = $_POST["city"];
                    $phone = $_POST["phone"];
                    $ticket = $_POST["ticket"];

                    $spectator = new Spectator($fname, $lname, $address, $zipcode, $city, $phone, $ticket);
                    $spectator->addToDatabase();
                } 
                else {
                    if(!empty($_POST["submit"])) {
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
                <input type="text" name="ticket" placeholder="Type billett">
                <button type="submit" class="btn" value="submit" name="submit">Legg til</button>
                <a href="index.php"><button type="button" class="btn-cancel" value="button" name="button">Avbryt</button></a>
            </fieldset>
            </form>
            </div>
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