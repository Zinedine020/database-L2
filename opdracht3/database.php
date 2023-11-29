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

    public function updateData($id, $newName, $newEmail)
    {
        try {
            $query = "UPDATE mensen SET naam = :naam, email = :email WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':naam', $newName);
            $stmt->bindParam(':email', $newEmail);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error updating data: " . $e->getMessage();
            return false;
        }
    }

    public function deleteData($id)
    {
        try {
            $query = "DELETE FROM mensen WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error deleting data: " . $e->getMessage();
            return false;
        }
    }

    public function closeConnection()
    {
        $this->conn = null;
    }
}
?>
