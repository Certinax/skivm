<?php
function deleteCompetition($competitionId) {
    $db = connectToDatabase();

    $stmt = "DELETE from competiton";
    $stmt .= " WHERE competitionId = '$competitionId'";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>[deleteCompetiton]".$competitionId."Feil, fikk ikke fjerne fra databasen</p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Ingen øvelser fjernet</p>";
    } else {
        echo "<p class='cancelation'>Øvelse fjernet</p>";
    }

    $db->close();
}