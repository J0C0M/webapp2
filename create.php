<?php
include("include/connect.php");

/** 
* @var PDO $pdo 
*/

if (isset($_POST['submit'])) {
    // Ensure the uploads directory exists
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;

    // Check if file is uploaded
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        // Insert into database
        $sql = "INSERT INTO boeken (activities, image, name, about, book, price) VALUES (:activities, :image, :name, :about, :book, :price)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":activities", $_POST['activities']);
        $stmt->bindParam(":image", $target_file); // Save file path in database
        $stmt->bindParam(":name", $_POST['name']);
        $stmt->bindParam(":about", $_POST['about']);
        $stmt->bindParam(":book", $_POST['book']);
        $stmt->bindParam(":price", $_POST['price']);
        $stmt->execute();
        header('Location: admin.php');
        exit;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Item</h2>

        <?php 
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-danger'>
                <strong>$errorMessage</strong>
                <button type='button' class='close' data-bs-dismiss='alert' aria-label='Close'>&times;</button>
            </div>
            ";
        }
        ?>

        <form class="form" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Activities</label>
                <input type="text" class="form-control" name="activities" value="">
            </div>
            <div class="mb-3">
                <label>File</label>
                <input type="file" class="form-control" name="file">
            </div>
            <div class="mb-3">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="">
            </div>
            <div class="mb-3">
                <label>About</label>
                <input type="text" class="form-control" name="about" value="">
            </div>
            <div class="mb-3">
                <label>Book</label>
                <input type="text" class="form-control" name="book" value="">
            </div>
            <div class="mb-3">
                <label>Price</label>
                <input type="text" class="form-control" name="price" value="">
            </div>

            <?php 
            if (!empty($successMessage)) {
                echo "
                <div class='alert alert-success' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button' class='close'>&times;</button>
                </div>
                ";
            }
            ?>

                <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="submit" style="background-color: #00FFC2; border-color: #00FFC2; color: #000;">Submit</button>
                        <a class="btn btn-secondary" href="admin.php" role="button" style="background-color: #DB5461; border-color: #DB5461; color: #000;">Cancel</a>
                </div>
        </form>
    </div>    
</body>
</html>
