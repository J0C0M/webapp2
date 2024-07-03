<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $destination = isset($_POST['destination']) ? $_POST['destination'] : ''; // Assuming you have this field in your form
    $guests = isset($_POST['guests']) ? $_POST['guests'] : '';
    $arrivals = isset($_POST['arrivals']) ? $_POST['arrivals'] : '';
    $leaving = isset($_POST['leaving']) ? $_POST['leaving'] : '';
    $vacationName = isset($_POST['vacationName']) ? $_POST['vacationName'] : '';

    // Validate form data
    if (empty($name) || empty($email) || empty($phone_number) || empty($address) || empty($guests) || empty($arrivals) || empty($leaving)) {
        // Handle validation errors
        echo "Please fill in all required fields.";
        exit;
    }

    // Database connection parameters
    $host = 'mysql_db';
    $db = 'vakantie'; // Your database name
    $user = 'root';
    $pass = 'rootpassword';
    $charset = 'utf8mb4';

    // Establish PDO connection
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit;
    }

    // Insert query
    $sql = "INSERT INTO `book_form` (name, email, phone_number, address, destination, guests, arrivals, leaving)
            VALUES (:name, :email, :phone_number, :address, :destination, :guests, :arrivals, :leaving)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'phone_number' => $phone_number,
        'address' => $address,
        'destination' => $destination,
        'guests' => $guests,
        'arrivals' => $arrivals,
        'leaving' => $leaving,
    ]);

    // Check if the query executed successfully
    if ($stmt->rowCount()) {
        echo "Booking successful.";
        // Send confirmation email to the user
        $to = $email;
        $subject = 'Booking Confirmation';
        $message = "Dear $name,\n\nThank you for your booking.\n\nDestination: $destination\nArrival Date: $arrivals\nLeaving Date: $leaving\n\nRegards,\nYour Booking Team";
        $headers = 'From: your-email@example.com';

        if (mail($to, $subject, $message, $headers)) {
            echo " Confirmation email sent.";
        } else {
            echo "Failed to send confirmation email.";
        }
    } else {
        echo "Failed to insert booking details.";
    }
} else {
    echo "Invalid request.";
}
?>
