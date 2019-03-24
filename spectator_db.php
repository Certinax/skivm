<?php

function getSpectator($id) {

    $db = connectToDatabase();

    $stmt = "select * from spectator where Id = '$id'";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>[getSpectator]Feil, fikk ikke hentet data ifra databasen</p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Ingen tilskuer(e) å hente</p>";
    } else {
        return $result->fetch_object();
    }

    $db->close();
}

function addSpectatorToCompetition($spectatorId, $competitionId) {

    $db = connectToDatabase();

    $stmt = "insert into competitionSpectator (spectatorId, competitionId)";
    $stmt .= " values ('$spectatorId', '$competitionId')";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>[addSpectatorToCompetition]Feil, fikk ikke oppdatert databasen</p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Ingen tilskuer lagt til</p>";
    } else {
        echo "<p class='confirmation'>Tilskuer lagt til</p>";
    }

    $db->close();
}

function deleteSpectatorFromCompetition($spectatorId, $competitionId) {

    $db = connectToDatabase();

    $stmt = "delete from competitionSpectator";
    $stmt .= " where spectatorId = '$spectatorId' AND competitionId = '$competitionId';";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>[deleteSpectatorFromCompetition]Feil, fikk ikke fjerne fra databasen</p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Ingen tilskuer fjernet</p>";
    } else {
        echo "<p class='cancelation'>Tilskuer fjernet</p>";
    }

    $db->close();
}


function spectatorSignedUpFor($spectator) {

    $db = connectToDatabase();

    $stmt = "select competition.* FROM competition ";;
    $stmt .= "WHERE id IN ";
    $stmt .= "(SELECT competitionId FROM competitionSpectator WHERE spectatorId = '$spectator');";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>[spectatorSignedUpFor]Feil, fikk ikke oppdatert databasen</p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Tilskueren er ikke påmeldt noen øvelser enda</p>";
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

function spectatorNotSignedUpFor($spectator) {

    $db = connectToDatabase();

    $stmt = "select competition.* FROM competition ";;
    $stmt .= "WHERE id NOT IN ";
    $stmt .= "(SELECT competitionId FROM competitionSpectator WHERE spectatorId = '$spectator');";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>[spectatorNotSignedUpFor]Feil, fikk ikke oppdatert databasen</p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Tilskueren er meldt på alle øvelser</p>";
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

function spectatorsSignedUp($competition) {

    $db = connectToDatabase();

    $stmt = "select spectator.* FROM spectator ";;
    $stmt .= "WHERE id IN ";
    $stmt .= "(SELECT spectatorId FROM competitionSpectator WHERE competitionId = '$competition');";

    $result = $db->query($stmt);

    if(!$result) {
        echo "<p class='cancelation'>[spectatorSignedUp]Feil, fikk ikke oppdatert databasen</p>";
    } elseif($db->affected_rows == 0) {
        echo "<p class='cancelation'>Ingen tilskuere er meldt på denne øvelsen</p>";
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
            <td>".$row->Ticket."</td>
            ";
            echo "</tr>";
        }
    }
    $db->close();
}