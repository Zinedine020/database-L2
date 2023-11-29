<?php

class Database
{
    private $conn;

    public function __construct($servername, $username, $password, $dbname)
    {
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function fetchData($id = null)
    {
        try {
            $query = "SELECT * FROM mensen"; 

            if ($id !== null) {
                $query .= " WHERE id = :id";
            }

            $stmt = $this->conn->prepare($query);

            if ($id !== null) {
                $stmt->bindParam(':id', $id);
            }

            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function closeConnection()
    {
        $this->conn = null;
    }
}


$servername = "localhost";
$username = "root";
$password = "Zinedine020";
$dbname = "data";

$database = new Database($servername, $username, $password, $dbname);

$data = $database->fetchData();

echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Email</th>
            <th>Acties</th>
        </tr>";

foreach ($data as $row) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['naam'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>
            <a href='edit.php?id=" . $row['id'] . "'>Edit</a>
            <a href='delete.php?id=" . $row['id'] . "'>Delete</a>
          </td>";
    echo "</tr>";
}

echo "</table>";

$database->closeConnection();
?>
