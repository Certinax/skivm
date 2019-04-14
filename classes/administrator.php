<?php
include("./db/connection.php");
?>
<?php
class Administrator
{
    private $username;
    private $firstname;
    private $lastname;
    private $password;

    function __construct($username, $firstname, $lastname, $password)
    {
        $this->username = $username;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->password = password_hash($password, 1);
    }

    public function addToDatabase()
    {
        $db = connectToDatabase();

        $username_fmt = $db->real_escape_string($this->username);
        $firstname_fmt = $db->real_escape_string($this->firstname);
        $lastname_fmt = $db->real_escape_string($this->lastname);

        $stmt = "insert into administrator (username, firstname, lastname, password)";
        $stmt .= " values ('$username_fmt', '$firstname_fmt', '$lastname_fmt', '$this->password')";

        $result = $db->query($stmt);

        if (!$result) {
            echo "<p class='cancelation'>Failed to add to database[administrator.php]</p>";
        } elseif ($db->affected_rows == 0) {
            echo "<p class='cancelation'>Query completed, but no person added</p>";
        } else {
            echo "<p class='confirmation'>Administrator er lagt til</p>";
        }

        $db->close();
    }
}


?>

