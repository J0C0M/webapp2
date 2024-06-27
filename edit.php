<?php 

include("conn.php");

/** 
* @var PDO $pdo 
*/

$sql = "SELECT * FROM menukaart WHERE ID = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $_GET['id']);
$stmt->execute();
$result = $stmt->fetch();

if (isset($_POST['submit'])) {
    $sql = "UPDATE menukaart SET name = :name, discription = :discription, price = :price WHERE ID = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $_GET['id']);
    $stmt->bindParam(":name", $_POST['name']); 
    $stmt->bindParam(":discription", $_POST['discription']);
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
    <title>da shop</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Edit Item</h2>

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
                <label>Name</label>
                <div>
                    <input type="text" name="name" value="<?php echo $result['name']; ?>">
                </div>
            </div>
            <div>
                <label>Omschrijving</label>
                <div>
                    <input type="text" name="discription" value="<?php echo $result['discription']; ?>">
                </div>
            </div>
            <div>
                <label>Prijs</label>
                <div>
                    <input type="text" name="price" value="<?php echo $result['price']; ?>">
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