<?php
include('classes/competition.php');
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
    <title>Ski-VM | Legg til øvelse</title>
</head>
<body>
    <!-- Wrapper -->
    <div class="wrapper">

        <!-- Top container -->
        <div class="top-container">
            <header class="showcase">
                <h1>Legg til utøver - DATA1700 - Webprogrammering</h1>
                <p>S319217 - Mathias Lund Ahrn</p>
            </header>
        </div>


        <div class="oppgave">
            <h1>Registrering av øvelse</h1>
            <?php
            if(!empty($_POST["time"]) &&
                !empty($_POST["type"]) &&
                !empty($_POST["place"]) &&
                !empty($_POST["submit"])) {

                    $time = $_POST["time"];
                    $type = $_POST["type"];
                    $place = $_POST["place"];

                    $competition = new Competition($time, $type, $place);
                    $competition->addToDatabase();
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
                <input type="text" name="time" placeholder="Tidspunkt">
                <input type="text" name="type" placeholder="Distanse">
                <input type="text" name="place" placeholder="Sted">
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