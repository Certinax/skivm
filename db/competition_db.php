<?php

function getCompetition($id) {

    $db = connectToDatabase();

    $stmt = "select * from competition where Id = '$id'";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>Feil, fikk ikke hentet data ifra databasen</p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Ingen øvelser å hente</p>";
    } else {
        return $result->fetch_object();
    }

    $db->close();
}

function updateCompetition($id, $time, $type, $place) {

    $db = connectToDatabase();

    $stmt = "update competition";
    $stmt .= " set time = '$time', type = '$type', place = '$place'";
    $stmt .= "where id = $id;";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>Feil, fikk ikke oppdatert databasen</p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Ingen rader ble oppdatert</p>";
    } else {
        echo "<p class='confirmation'>Øvelse oppdatert</p>";
    }

    $db->close();
}

function deleteCompetition($competitionId) {
    $db = connectToDatabase();

    $stmt = "DELETE FROM competition";
    $stmt .= " where Id = '$competitionId'";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>[deleteCompetiton]Feil, fikk ikke fjerne fra databasen<br/></p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Ingen øvelser fjernet</p>";
    } else {
        echo "<p class='cancelation'>Øvelse fjernet</p>";
    }

    $db->close();
}

function updateCompetitionSpectator($competitionId) {
    $db = connectToDatabase();

    $stmt = "DELETE FROM competitionSpectator";
    $stmt .= " where competitionID = '$competitionId'";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>[updateCompetitionSpectator]Feil, fikk ikke fjerne fra databasen<br/></p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Ingen øvelser/tilskuere er fjernet</p>";
    } else {
        echo "<p class='cancelation'>Øvelse og tilskuere fjernet</p>";
    }

    $db->close();
}

function updateCompetitionAthlete($competitionId) {
    $db = connectToDatabase();

    $stmt = "DELETE FROM competitionAthlete";
    $stmt .= " where competitionID = '$competitionId'";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>[updateCompetitionAthlete]Feil, fikk ikke fjerne fra databasen<br/></p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Ingen øvelser/utøvere er fjernet</p>";
    } else {
        echo "<p class='cancelation'>Øvelse og utøvere fjernet</p>";
    }

    $db->close();
    session_destroy();
}