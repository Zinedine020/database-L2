<?php
require_once 'Database.php';

$servername = "localhost";
$username = "root";
$password = "Zinedine020";
$dbname = "data";

$database = new Database($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $newName = $_POST["newName"];
    $newEmail = $_POST["newEmail"];

    if ($database->updateData($id, $newName, $newEmail)) {
        echo "Data updated successfully";
    } else {
        echo "Failed to update data";
    }
}

$data = $database->fetchData(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>
<body>

<h2>Update Data</h2>

<form method="post" action="">
    <label for="id">ID:</label>
    <select name="id" required>
        <?php foreach ($data as $row): ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="newName">New Name:</label>
    <input type="text" name="newName" required>
    <br>
    <label for="newEmail">New Email:</label>
    <input type="email" name="newEmail" required>
    <br>
    <input type="submit" value="Update">
</form>

</body>
</html>
