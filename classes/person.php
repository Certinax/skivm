<?php
include("./db/connection.php");
?>
<?php
class Person {
    protected $firstname;
    protected $lastname;
    protected $address;
    protected $zipcode;
    protected $city;
    protected $phonenumber;

    function __construct($fname, $lname, $address, $zip, $city, $phone) {
        $this->firstname = $fname;
        $this->lastname = $lname;
        $this->address = $address;
        $this->zipcode = $zip;
        $this->city = $city;
        $this->phonenumber = $phone;
    }
}

class Spectator extends Person {
    private $ticketType;

    function __construct($fname, $lname, $address, $zip, $city, $phone, $ticketType) {
        parent::__construct($fname, $lname, $address, $zip, $city, $phone);
        $this->ticketType = $ticketType;
    }

    public function addToDatabase() {
        $db = connectToDatabase();

        $stmt = "insert into spectator (Firstname, Lastname, Address, Zip, City, Phone, Ticket)";
        $stmt .= " values ('$this->firstname', '$this->lastname', '$this->address', '$this->zipcode', '$this->city', '$this->phonenumber', '$this->ticketType');";

        $result = $db->query($stmt);

        if(!$result) {
            echo "<p class='cancelation'>Failed to add to database</p>";
        } elseif($db->affected_rows == 0) {
            echo "<p class='cancelation'>Query completed, but no person added</p>";
        } else {
            echo "<p class='confirmation'>Tilskuer er lagt til</p>";
        }

        $db->close();
    }
}

class Athlete extends Person {
    private $nationality;

    function __construct($fname, $lname, $address, $zip, $city, $phone, $nationality) {
        parent::__construct($fname, $lname, $address, $zip, $city, $phone);
        $this->nationality = $nationality;
    }

    public function getName() {
        return $this->fname;
    }

    public function addToDatabase() {
        $db = connectToDatabase();

        $stmt = "insert into athlete (Firstname, Lastname, Address, Zip, City, Phone, Nationality)";
        $stmt .= " values ('$this->firstname', '$this->lastname', '$this->address', '$this->zipcode', '$this->city', '$this->phonenumber', '$this->nationality');";

        $result = $db->query($stmt);

        if(!$result) {
            echo "<p class='cancelation'>Failed to add to database</p>";
        } elseif($db->affected_rows == 0) {
            echo "<p class='cancelation'>Query completed, but no person added</p>";
        } else {
            echo "<p class='confirmation'>Utøver er lagt til</p>";
        }

        $db->close();
    }
}
?>