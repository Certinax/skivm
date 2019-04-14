<?php
function isLoggedin()
{
    echo "
    <legend>Du er logget inn</legend>
    <button id='logout' class='btn-cancel' value='logout' name='logout'>Logout</button>
    ";
}

function notLoggedIn()
{
    echo "
    <legend>Login</login>
    <input type='text' name='username' placeholder='Username'>
    <input type='password' name='password' placeholder='Password'>
    <button id='login' class='btn' value='submit' name='submit'>Login</button>
    ";
}

?>


<?php
function login()
{
    if (
        !empty($_POST["username"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["submit"])
    ) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $db = connectToDatabase();

        $stmt = "SELECT password from administrator where username='$username'";
        $result = $db->query($stmt);

        if ($db->affected_rows >= 1) {
            $row = $result->fetch_object();
            $passwordHash = $row->password;
            $ok = password_verify($password, $passwordHash);
            if ($ok) {
                // echo "Passordet er korrekt";
                // $_SESSION["loggedIn"] = true;
                loginSession();
                updatePage("login");
                // echo $_SESSION["loggedIn"];
                // echo '<pre>';
                // var_dump($_SESSION);
                // echo '</pre>';
                // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
                // echo session_id();
            } else {
                echo "[PHP-Message] Passordet er ikke korrekt";
            }
        } else {
            echo "[PHP-Message] Fant ikke bruker";
        }
    } else {
        if (!empty($_POST["submit"])) {
            echo "<p style='color:red'>*[PHP-Message] Du må fylle ut alle felter</p>";
        } else {
            echo "<p>[PHP-Message]Fyll ut informasjon</p>";
        }
    }
}

if ($_SESSION["loggedIn"]) {
    if (!empty($_POST["logout"])) {
        echo "Du har logget ut!";
        session_destroy();
        updatePage("logout");
    }
}

function loginSession()
{
    if (!$_SESSION["loggedIn"]) {
        $_SESSION["loggedIn"] = true;
    } else {
        echo "Du er allerede logget inn";
    }
}


function updatePage($login)
{
    if ($login == "login") {
        if(isset($_SESSION["route"])) {
            Header('Location: ' . $_SESSION["route"]);
            exit();
        } else {
            Header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        }
    } else if ($login == "logout") {
        Header('Location:index.php');
        exit();
    }
}

?>