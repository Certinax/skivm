<?php

function getAthlete($id) {

    $db = connectToDatabase();

    $stmt = "select * from athlete where Id = '$id'";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>Feil, fikk ikke hentet data ifra databasen</p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Ingen utøver(e) å hente</p>";
    } else {
        return $result->fetch_object();
    }

    $db->close();
}

function addAthleteToCompetition($athleteId, $competitionId) {

    $db = connectToDatabase();

    $stmt = "insert into competitionAthlete (athleteId, competitionId)";
    $stmt .= " values ('$athleteId', '$competitionId')";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>Feil, fikk ikke oppdatert databasen</p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Ingen utøver lagt til</p>";
    } else {
        echo "<p class='confirmation'>Utøver lagt til</p>";
    }

    $db->close();
}

function deleteAthleteFromCompetition($athleteId, $competitionId) {

    $db = connectToDatabase();

    $stmt = "delete from competitionAthlete";
    $stmt .= " where athleteId = '$athleteId' AND competitionId = '$competitionId';";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>Feil, fikk ikke fjerne fra databasen</p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Ingen utøver fjernet</p>";
    } else {
        echo "<p class='cancelation'>Utøver fjernet</p>";
    }

    $db->close();
}

function competitionSignedUpFor($athlete) {

    $db = connectToDatabase();

    $stmt = "select competition.* FROM competition ";;
    $stmt .= "WHERE id IN ";
    $stmt .= "(SELECT competitionId FROM competitionAthlete WHERE athleteId = '$athlete');";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>Feil, fikk ikke oppdatert databasen</p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Utøveren er ikke påmeldt noen øvelser enda</p>";
    } else {
        while($row = $result->fetch_object()) {
            echo "<tr>";
            echo "
            <td>".$row->Time."</td>
            <td>".$row->Type."</td>
            <td>".$row->Place."</td>
            <td>
                <form action='' method='post'>
                    <button class='btn-cancel' name='signoff' value='".$row->Id."'>Meld av</button>
                </form>
            </td>
            ";
            echo "</tr>";
        }
    }

    $db->close();
}

function competitionNotSignedUpFor($athlete) {

    $db = connectToDatabase();

    $stmt = "select competition.* FROM competition ";;
    $stmt .= "WHERE id NOT IN ";
    $stmt .= "(SELECT competitionId FROM competitionAthlete WHERE athleteId = '$athlete');";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>Feil, fikk ikke oppdatert databasen</p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Utøveren er meldt på alle øvelser</p>";
    } else {
        while($row = $result->fetch_object()) {
            echo "<tr>";
            echo "
            <td>".$row->Time."</td>
            <td>".$row->Type."</td>
            <td>".$row->Place."</td>
            <td>
                <form action='' method='post'>
                    <button class='btn' name='signup' value='".$row->Id."'>Meld på</button>
                </form>
            </td>
            ";
            echo "</tr>";
        }
    }

    $db->close();
}

function athletesSignedUp($competition) {

    $db = connectToDatabase();

    $stmt = "select athlete.* FROM athlete ";;
    $stmt .= "WHERE id IN ";
    $stmt .= "(SELECT athleteId FROM competitionAthlete WHERE competitionId = '$competition');";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>Feil, fikk ikke oppdatert databasen</p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Ingen utøvere er meldt på denne øvelsen</p>";
    } else {
        while($row = $result->fetch_object()) {
            echo "<tr>";
            echo "
            <td>".$row->Firstname."</td>
            <td>".$row->Lastname."</td>
            <td>".$row->Address."</td>
            <td>".$row->Zip."</td>
            <td>".$row->City."</td>
            <td>".$row->Phone."</td>
            <td>".$row->Nationality."</td>
            ";
            echo "</tr>";
        }
    }
    $db->close();
}