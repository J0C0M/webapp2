<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Ensure the connect.php file is included correctly
    include("include/connect.php");

    try {
        // Use prepared statements to delete the record securely
        $sql = "DELETE FROM boeken WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Redirect to admin.php after deletion
        header("Location: admin.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // Redirect to admin.php if no ID is provided
    header("Location: admin.php");
    exit;
}
?>
