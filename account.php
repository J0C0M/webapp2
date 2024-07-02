<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

$servername = "mysql_db"; // replace with your database server name
$username = "root"; // replace with your database username
$password = "rootpassword"; // replace with your database password
$dbname = "book_db"; // replace with your database name

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_SESSION['email'];

    // Fetch bookings for the logged-in user
    $stmt = $conn->prepare("SELECT * FROM book_form WHERE email = :email ORDER BY id DESC");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Handle cancellation request
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancel'])) {
        $bookingId = $_POST['cancel'];

        // Perform cancellation (delete the booking)
        $cancelStmt = $conn->prepare("DELETE FROM book_form WHERE id = :id");
        $cancelStmt->bindParam(':id', $bookingId);
        if ($cancelStmt->execute()) {
            // Redirect to refresh the page after cancellation
            header("Location: account.php");
            exit;
        } else {
            echo "Failed to cancel booking.";
        }
    }

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Poetsen+One&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
</head>
<body>
    <?php include("include/header.php"); ?>

    <div class="container">
        <h1 class="my-4">Your Booked Flights</h1>
        
        <?php if (!empty($bookings)): ?>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Destination</th>
                    <th>Guests</th>
                    <th>Arrival Date</th>
                    <th>Leaving Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($booking['name']); ?></td>
                        <td><?php echo htmlspecialchars($booking['email']); ?></td>
                        <td><?php echo htmlspecialchars($booking['phone_number']); ?></td>
                        <td><?php echo htmlspecialchars($booking['address']); ?></td>
                        <td><?php echo isset($booking['destination']) ? htmlspecialchars($booking['destination']) : 'N/A'; ?></td> <!-- Display destination or 'N/A' if not set -->
                        <td><?php echo htmlspecialchars($booking['guests']); ?></td>
                        <td><?php echo htmlspecialchars($booking['arrivals']); ?></td>
                        <td><?php echo htmlspecialchars($booking['leaving']); ?></td>
                        <td>
                            <form method="post">
                                <button type="submit" name="cancel" value="<?php echo $booking['id']; ?>" class="btn btn-danger">Cancel</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p class="no-bookings">No bookings found.</p>
        <?php endif; ?>
    </div>

    <?php include("include/footer.php"); ?>

</body>
</html>
