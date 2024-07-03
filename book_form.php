<?php
$servername = "mysql_db"; 
$username = "root"; 
$password = "rootpassword"; 
$dbname = "vakantie"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $destination = $_POST['destination'];
        $guests = $_POST['guests'];
        $arrivals = $_POST['arrivals'];
        $leaving = $_POST['leaving'];

        $stmt = $conn->prepare("INSERT INTO book_form (name, email, phone_number, address, destination, guests, arrivals, leaving) 
                                VALUES (:name, :email, :phone_number, :address, :destination, :guests, :arrivals, :leaving)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':destination', $destination);
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