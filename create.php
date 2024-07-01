<?php
include("include/connect.php");    

/** 
* @var PDO $pdo 
*/

if (isset($_POST['submit'])) {
    $sql = "INSERT INTO vakantie(activities, image, name, about, book, price) VALUES (:activities, :image, :name, :about, : book, :price)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":activities", $_POST['activities']);
    $stmt->bindParam(":image", $_POST['image']);
    $stmt->bindParam(":name", $_POST['name']);
    $stmt->bindParam(":about", $_POST['about']);
    $stmt->bindParam(":book", $_POST['book']);
    $stmt->bindParam(":price", $_POST['price']);
    $stmt->execute();
    header('Location: admin.php');
    exit;
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
        if ( !empty($errorMessage)) {
            echo "
            <div>
                <strong>$errorMessage</strong>
                <button type='button' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form class="form" method="post">
            <div>
                <label>activities</label>
                <div>
                    <input type="text" name="activities" value="">
                </div>
            </div>
            <div>
                <label>image</label>
                <div>
                    <input type="text" name="image" value="">
                </div>
            </div>
            <div>
                <label>name</label>
                <div>
                    <input type="text" name="name" value="">
                </div>
            </div>
            <label>about</label>
                <div>
                    <input type="text" name="about" value="">
                </div>
            </div>
            <label>book</label>
                <div>
                    <input type="text" name="book" value="">
                </div>
            </div><label>price</label>
                <div>
                    <input type="text" name="price" value="">
                </div>
            </div>

            <?php 
            if ( !empty($successMessage)) {
                echo "
                <div role='alert'>
                <strong>$successMessage</strong>
                <button type='button' ></button>
            </div>
                ";
            }
            ?>

            <div>
                <div>
                    <button type="text" name="submit" value="">Submit</button>
                </div>
                <div>
                    <a class="btn" href="admin.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>    
</body>
</html>