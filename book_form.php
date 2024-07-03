<?php
$servername = "mysql_db";
$username = "root";
$password = "rootpassword";
$dbname = "book_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate and sanitize inputs (if needed)
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone_number = htmlspecialchars($_POST['phone_number']);
        $address = htmlspecialchars($_POST['address']);
        $destination = htmlspecialchars($_POST['destination']); // Corrected variable name
        $guests = htmlspecialchars($_POST['guests']);
        $arrivals = htmlspecialchars($_POST['arrivals']);
        $leaving = htmlspecialchars($_POST['leaving']);

        $stmt = $conn->prepare("INSERT INTO book_form (name, email, phone_number, address, destination, guests, arrivals, leaving) 
                                VALUES (:name, :email, :phone_number, :address, :destination, :guests, :arrivals, :leaving)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':destination', $destination); // Corrected parameter binding
        $stmt->bindParam(':guests', $guests);
        $stmt->bindParam(':arrivals', $arrivals);
        $stmt->bindParam(':leaving', $leaving);

        if ($stmt->execute()) {
            echo "Booking successful!";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
