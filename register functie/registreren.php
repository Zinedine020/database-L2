<?php
session_start();
include "connect.php";

class Register extends Database
{
    public function __construct($servername, $dbname, $username, $password)
    {
        parent::__construct($servername, $dbname, $username, $password);
    }

    public function insertUser($naam, $email, $wachtwoord)
    {
        $sql = "INSERT INTO maken (naam, email, wachtwoord) VALUES (:naam, :email, :wachtwoord)";
        $stmt = $this->connect->prepare($sql);

        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':wachtwoord', $wachtwoord); 
        
        try {
            $stmt->execute();
            echo "Registratie succesvol!";
            echo '<a href="website.php">Ga terug naar de homepagina</a>';
        } catch (PDOException $e) {
            echo "Fout bij registratie: " . $e->getMessage();
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST["naam"];
    $email = $_POST["registreerder-email"];
    $wachtwoord = $_POST["registreerder-password"];

    $register = new Register("localhost", "registreren", "root", "Zinedine020");
    $register->insertUser($naam, $email, $wachtwoord);
}
?>


