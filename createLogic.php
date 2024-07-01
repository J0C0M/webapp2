</html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Logic</title>
</head>
<body>

<?php

$host = 'mysql_db'; 
$db = 'vakantie'; 
$user = 'root'; 
$pass = 'rootpassword'; 
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

$sql = "SELECT * FROM boeken";
$result = $pdo->query($sql);

while($boeken = $result->fetch()) {
    echo "<div class='boeken'>" . 
         htmlspecialchars($boeken["activities"]) . 
         "<img src='" . htmlspecialchars($boeken["image"]) . "' alt='Image'>" . 
         htmlspecialchars($boeken["name"]) . 
         htmlspecialchars($boeken["about"]) . 
         htmlspecialchars($boeken["book"]) . 
         htmlspecialchars($boeken["price"]) . 
         "</div>";
}
?>

</body>
</html>
