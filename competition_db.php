<?php
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