<?php

class Database {
    public $pdo;

    public function __construct($db = "winkel", $user = "root", $pwd = "Zinedine020", $host = "localhost") {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "connected to database $db";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function insertData($tableName, $columns, $values) {
        try {
            $sql = "INSERT INTO $tableName (" . implode(", ", $columns) . ") VALUES (:" . implode(", :", $columns) . ")";

            $statement = $this->pdo->prepare($sql);

            foreach ($columns as $column) {
                $statement->bindParam(":$column", $values[$column]);
            }

            $statement->execute();

            echo "Data inserted successfully.";
        } catch (PDOException $e) {
            echo "Error inserting data: " . $e->getMessage();
        }
    }
}

$database = new Database();

$tableName = "voorbeeld_tabel";
$columns = ["naam", "leeftijd", "stad"];
$values = ["John Doe", 25, "New York"];

$database->insertData($tableName, $columns, $values);

?>
