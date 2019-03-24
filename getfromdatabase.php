<?php

    function showAthletes() {

        $db = new mysqli("localhost","root","", "vm_ski");
        if(!$db) {
            die("Connection to database failed");
        }

        $stmt = "select * from athlete";

        $result = $db->query($stmt);

        if(!$result) {
            echo "Failed to retrieve data from database";
        } elseif($db->affected_rows == 0) {
            echo "Ingen utøver(e) å hente";
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
                <td>
                    <form action='signupathletes.php' method='post'>
                    <button class='btn' name='athlete' value='".$row->Id."'>Legg til</button>
                    </form>
                </td>";
                echo "</tr>";
            }
        }

        $db->close();
    }

    function showSpectators() {

        $db = new mysqli("localhost","root","", "vm_ski");
        if(!$db) {
            die("Connection to database failed");
        }

        $stmt = "select * from spectator";

        $result = $db->query($stmt);

        if(!$result) {
            echo "Failed to retrieve data from database";
        } elseif($db->affected_rows == 0) {
            echo "Ingen tilskuer(e) å hente";
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
                <td>".$row->Ticket."</td>";
                echo "</tr>";
            }
        }

        $db->close();
    }

    function showCompetitions() {

        $db = new mysqli("localhost","root","", "vm_ski");
        if(!$db) {
            die("Connection to database failed");
        }

        $stmt = "select * from competition";

        $result = $db->query($stmt);

        if(!$result) {
            echo "Failed to retrieve data from database";
        } elseif($db->affected_rows == 0) {
            echo "Ingen øvelse(r) å hente";
        } else {
            while($row = $result->fetch_object()) {
                echo "<tr>";
                echo "
                <td>".$row->Time."</td>
                <td>".$row->Type."</td>
                <td>".$row->Place."</td>
                <td>
                    <form action='competitioninfo.php' method='post'>
                        <button class='btn' name='competition' value='".$row->Id."'>Info</button>
                    </form>
                </td>
                <td>
                    <form action='changecompetition.php' method='post'>
                        <button class='btn' name='change' value='".$row->Id."'>Endre</button>
                    </form>
                </td>
                ";
                echo "</tr>";
            }
        }

        $db->close();
    }


    function getAthlete($id) {

        $db = new mysqli("localhost","root","", "vm_ski");
        if(!$db) {
            die("Connection to database failed");
        }

        $stmt = "select * from athlete where Id = '$id'";

        $result = $db->query($stmt);

        if(!$result) {
            echo "Failed to retrieve data from database";
        } elseif($db->affected_rows == 0) {
            echo "Ingen utøver(e) å hente";
        } else {
            return $result->fetch_object();
        }

        $db->close();
    }

    function getCompetition($id) {

        $db = new mysqli("localhost","root","", "vm_ski");
        if(!$db) {
            die("Connection to database failed");
        }

        $stmt = "select * from competition where Id = '$id'";

        $result = $db->query($stmt);

        if(!$result) {
            echo "Failed to retrieve data from database";
        } elseif($db->affected_rows == 0) {
            echo "No athletes to get";
        } else {
            return $result->fetch_object();
        }

        $db->close();
    }

    function addAthleteToCompetition($athleteId, $competitionId) {

        $db = new mysqli("localhost","root","", "vm_ski");
        if(!$db) {
            die("Connection to database failed");
        }

        $stmt = "insert into competitionAthlete (athleteId, competitionId)";
        $stmt .= " values ('$athleteId', '$competitionId')";

        $result = $db->query($stmt);

        if(!$result) {
            echo "Failed to add to database";
        } elseif($db->affected_rows == 0) {
            echo "No athlete added";
        } else {
            echo "Athlete added";
        }

        $db->close();
    }

    function deleteAthleteToCompetition($athleteId, $competitionId) {

        $db = new mysqli("localhost","root","", "vm_ski");
        if(!$db) {
            die("Connection to database failed");
        }

        $stmt = "delete from competitionAthlete";
        $stmt .= " where athleteId = '$athleteId' AND competitionId = '$competitionId';";

        $result = $db->query($stmt);

        if(!$result) {
            echo "Failed to remove from database";
        } elseif($db->affected_rows == 0) {
            echo "No athlete removed";
        } else {
            echo "Athlete removed";
        }

        $db->close();
    }

    function updateCompetition($id, $time, $type, $place) {

        $db = new mysqli("localhost","root","", "vm_ski");
        if(!$db) {
            die("Connection to database failed");
        }

        $stmt = "update competition";
        $stmt .= " set time = '$time', type = '$type', place = '$place'";
        $stmt .= "where id = $id;";

        $result = $db->query($stmt);

        if(!$result) {
            echo "Failed to update database";
        } elseif($db->affected_rows == 0) {
            echo "No rows where updated";
        } else {
            echo "Competition updated";
        }

        $db->close();
    }

    
    function competitionSignedUpFor($athlete) {

        $db = new mysqli("localhost","root","", "vm_ski");
        if(!$db) {
            die("Connection to database failed");
        }

        $stmt = "select competition.* FROM competition ";;
        $stmt .= "WHERE id IN ";
        $stmt .= "(SELECT competitionId FROM competitionAthlete WHERE athleteId = '$athlete');";

        $result = $db->query($stmt);

        if(!$result) {
            echo "Failed to update database";
        } elseif($db->affected_rows == 0) {
            echo "Utøveren er ikke påmeldt noen øvelser enda";
        } else {
            while($row = $result->fetch_object()) {
                echo "<tr>";
                echo "
                <td>".$row->Time."</td>
                <td>".$row->Type."</td>
                <td>".$row->Place."</td>
                <td>
                    <form action='' method='post'>
                        <button class='btn' name='signoff' value='".$row->Id."'>Meld av</button>
                    </form>
                </td>
                ";
                echo "</tr>";
            }
        }

        $db->close();
    }

    function competitionNotSignedUpFor($athlete) {

        $db = new mysqli("localhost","root","", "vm_ski");
        if(!$db) {
            die("Connection to database failed");
        }

        $stmt = "select competition.* FROM competition ";;
        $stmt .= "WHERE id NOT IN ";
        $stmt .= "(SELECT competitionId FROM competitionAthlete WHERE athleteId = '$athlete');";

        $result = $db->query($stmt);

        if(!$result) {
            echo "Failed to update database";
        } elseif($db->affected_rows == 0) {
            echo "Utøveren er meldt på alle øvelser";
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

        $db = new mysqli("localhost","root","", "vm_ski");
        if(!$db) {
            die("Connection to database failed");
        }

        $stmt = "select athlete.* FROM athlete ";;
        $stmt .= "WHERE id IN ";
        $stmt .= "(SELECT athleteId FROM competitionAthlete WHERE competitionId = '$competition');";

        $result = $db->query($stmt);

        if(!$result) {
            echo "Failed to update database";
        } elseif($db->affected_rows == 0) {
            echo "Ingen utøvere er meldt på denne øvelsen";
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

    
?>