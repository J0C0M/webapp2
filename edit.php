<?php
include("include/connect.php"); // Correct path to the connect file

/** 
* @var PDO $pdo 
*/

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing data for the record
    $sql = "SELECT * FROM boeken WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch();

    if (!$result) {
        echo "Record not found!";
        exit;
    }

    if (isset($_POST['submit'])) {
        // Initialize variable for file upload path
        $imagePath = $result['image'];

        // Handle image upload if a new file is provided
        if (!empty($_FILES["image"]["name"])) {
            $target_dir = "uploads/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }
            $imagePath = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
        }

        // Update the record
        $sql = "UPDATE boeken SET name = :name, about = :about, price = :price, image = :image WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":name", $_POST['name']);
        $stmt->bindParam(":about", $_POST['about']);
        $stmt->bindParam(":price", $_POST['price']);
        $stmt->bindParam(":image", $imagePath);
        $stmt->execute();
        
        header('Location: admin.php');
        exit;
    }
} else {
    echo "ID not provided!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-top: 50px;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #00FFC2;
            border: none;
            color: black;
        }
        .btn-secondary {
            background-color: #DB5461;
            border: none;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Edit Item</h2>

        <?php 
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-danger'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($result['name']); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">About</label>
                <textarea class="form-control" name="about" rows="4"><?php echo htmlspecialchars($result['about']); ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" name="price" value="<?php echo htmlspecialchars($result['price']); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
                <img src="<?php echo $result['image']; ?>" alt="Current Image" class="img-thumbnail mt-3" style="max-width: 150px;">
            </div>

            <?php 
            if (!empty($successMessage)) {
                echo "
                <div class='alert alert-success' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
            ?>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <a class="btn btn-secondary" href="admin.php" role="button">Cancel</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
