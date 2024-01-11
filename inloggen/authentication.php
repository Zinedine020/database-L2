<?php

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "Zinedine020";
    private $database = "registreren";
    
    protected $connect; // Make it protected to be accessed in the child class

    public function __construct()
    {
        try {
            $this->connect = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

class Authentication extends Database
{
    public function loginUser($email, $password)
    {
        if (empty($email) || empty($password)) {
            return 'Vul je email en wachtwoord in!';
        } else {
            try {
                $query = "SELECT * FROM maken WHERE email = :email";
                $statement = $this->connect->prepare($query);
                $statement->execute(['email' => $email]);
                $user = $statement->fetch(PDO::FETCH_ASSOC);

                if ($user && password_verify($password, $user['wachtwoord'])) {
                    $_SESSION["email"] = $email;
                    header("location: website.php");
                    exit;
                } else {
                    return 'Je email komt niet overeen met je wachtwoord';
                }
            } catch (PDOException $e) {
                return 'Error: ' . $e->getMessage();
            }
        }
    }

    public function isLoggedIn()
    {
        return isset($_SESSION["email"]);
    }
}

?>
