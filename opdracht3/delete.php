<?php
require_once 'Database.php'; 

$servername = "localhost";
$username = "root";
$password = "Zinedine020";
$dbname = "data";

$database = new Database($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    if ($database->deleteData($id)) {
        echo "Data deleted successfully";
    } else {
        echo "Failed to delete data";
    }
}

$data = $database->fetchData(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Data</title>
</head>
<body>

<h2>Delete Data</h2>

<form method="get" action="">
    <label for="id">ID:</label>
    <select name="id" required>
        <?php foreach ($data as $row): ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <input type="submit" value="Delete">
</form>

</body>
</html>
