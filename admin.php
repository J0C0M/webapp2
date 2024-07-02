<?php
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {
}
else {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //header include
    include("include/header.php");
    ?>
    <h1>Admin pagina</h1>
    <p>reviews</p>
    <?php
    include("include/connect.php"); 

    // Fetch all reviews
    $query = "SELECT * FROM review_table ORDER BY review_id DESC";
    $result = $pdo->query($query, PDO::FETCH_ASSOC);
    ?>

    <title>Admin Panel</title>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Rating</th>
                <th>Review</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($result as $review):
            ?>
            <tr>
                <td><?php echo $review["review_id"]; ?></td>
                <td><?php echo $review["user_name"]; ?></td>
                <td><?php echo $review["user_rating"]; ?></td>
                <td><?php echo $review["user_review"]; ?></td>
                <td><?php echo date('l jS, F Y h:i:s A', $review["datetime"]); ?></td>
                <td>
                    <?php
                    echo "
                    <a class='btn' href='editReview.php?id=$review[review_id]'>Edit</a>
                    <a class='btn' href='deleteReview.php?id=$review[review_id]'>Delete</a>
                    ";
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>List Of Menu Items</h2>
    <a class="btn" href="create.php" role="button">New Item</a>
    <br>
    <table border="1" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Omschrijving</th>
                <th>Prijs</th>
            </tr>
        </thead>
        <tbody>
            <?php

            include("connect.php");

            $sql = "SELECT * FROM menukaart";
            $stmt = $pdo->query($sql);

            while($menukaart = $stmt->fetch()) {
                echo "  
                <tr class='menukaart'>
                    <td>$menukaart[id]</td>
                    <td>$menukaart[name]</td>
                    <td>$menukaart[discription] </td>
                    <td>$menukaart[price]</td>
                    <td>
                        <a class='btn' href='edit.php?id=$menukaart[id]'>Edit</a>
                        <a class='btn' href='delete.php?id=$menukaart[id]'>Delete</a>
                    </td>
                </tr>
                ";
            }
            ?>
            
        </tbody>
    </table>
    <?php
    //include footer
    include("include/footer.php");
    ?>
</body>


</html>