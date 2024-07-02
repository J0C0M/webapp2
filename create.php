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
    if (isset($_POST["submit"])) {
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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Item</h2>

        <?php 
        if (!empty($errorMessage)) {
            echo "
            <div>
                <strong>$errorMessage</strong>
                <button type='button' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form class="form" method="post" enctype="multipart/form-data">
            <div>
                <label>Activities</label>
                <div>
                    <input type="text" name="activities" value="">
                </div>
            </div>
            <div>
                <label>File</label>
                <div>
                    <input type="file" name="file">
                </div>
            </div>
            <div>
                <label>Name</label>
                <div>
                    <input type="text" name="name" value="">
                </div>
            </div>
            <div>
                <label>About</label>
                <div>
                    <input type="text" name="about" value="">
                </div>
            </div>
            <div>
                <label>Book</label>
                <div>
                    <input type="text" name="book" value="">
                </div>
            </div>
            <div>
                <label>Price</label>
                <div>
                    <input type="text" name="price" value="">
                </div>
            </div>

            <?php 
            if (!empty($successMessage)) {
                echo "
                <div role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button'></button>
                </div>
                ";
            }
            ?>

            <div>
                <div>
                    <button type="submit" name="submit" value="">Submit</button>
                </div>
                <div>
                    <a class="btn" href="admin.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>    
</body>
</html>
