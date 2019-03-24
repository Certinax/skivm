<?php
include("./db/connection.php");
?>
<?php
class Competition {
    private $time;
    private $type;
    private $place;

    function __construct($time, $type, $place) {
        $this->time = $time;
        $this->type = $type;
        $this->place = $place;
    }

    public function addToDatabase() {
        $db = connectToDatabase();

        $stmt = "insert into competition (Time, Type, Place)";
        $stmt .= " values ('$this->time', '$this->type', '$this->place');";

        $result = $db->query($stmt);

        if(!$result) {
            echo "<p class='cancelation'>Failed to add to database</p>";
        } elseif($db->affected_rows == 0) {
            echo "<p class='cancelation'>Query completed, but no person added</p>";
        } else {
            echo "<p class='confirmation'>Øvelse er lagt til</p>";
        }

        $db->close();
    }
}
?>