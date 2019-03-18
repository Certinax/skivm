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
        $db = new mysqli("localhost", "root", "", "vm_ski");
        if(!$db) {
            die("Connection to database failed");
        }

        $stmt = "insert into competition (Time, Type, Place)";
        $stmt .= " values ('$this->time', '$this->type', '$this->place');";

        $result = $db->query($stmt);

        if(!$result) {
            echo "Failed to add to database";
        } elseif($db->affected_rows == 0) {
            echo "Query completed, but no person added";
        } else {
            echo "Person is added";
        }

        $db->close();
    }
}

?>