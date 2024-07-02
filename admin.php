<?php
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {
    // User is an admin
} else {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>
    <?php
    // Include the header
    include("include/header.php");
    ?>
    <h1>Admin Page</h1>
    <p>Reviews</p>
    <?php
    include("include/connect.php"); 

    // Fetch all reviews
    $query = "SELECT * FROM review_table ORDER BY review_id DESC";
    $result = $pdo->query($query, PDO::FETCH_ASSOC);
    ?>

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
            <?php foreach ($result as $review): ?>
            <tr>
                <td><?php echo $review["review_id"]; ?></td>
                <td><?php echo $review["user_name"]; ?></td>
                <td><?php echo $review["user_rating"]; ?></td>
                <td><?php echo $review["user_review"]; ?></td>
                <td><?php echo date('l jS, F Y h:i:s A', $review["datetime"]); ?></td>
                <td>
                    <a class='btn' href='editReview.php?id=<?php echo $review["review_id"]; ?>'>Edit</a>
                    <a class='btn' href='deleteReview.php?id=<?php echo $review["review_id"]; ?>'>Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>List of Vacation Packages</h2>
    <a class="btn" href="create.php" role="button">New Item</a>
    <br>
    <table border="1" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Activities</th>
                <th>Image</th>
                <th>Name</th>
                <th>About</th>
                <th>Book</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all vacation packages
            $sql = "SELECT * FROM boeken";
            $stmt = $pdo->query($sql);

            while ($boeken = $stmt->fetch()) {
                echo "  
                <tr class='boeken'>
                    <td>{$boeken['id']}</td>
                    <td>{$boeken['activities']}</td>
                    <td><img src='{$boeken['image']}' alt='Image' style='width: 100px;'></td>
                    <td>{$boeken['name']}</td>
                    <td>{$boeken['about']}</td>
                    <td>{$boeken['book']}</td>
                    <td>{$boeken['price']}</td>
                    <td>
                        <a class='btn' href='edit.php?id={$boeken['id']}'>Edit</a>
                        <a class='btn' href='delete.php?id={$boeken['id']}'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    // Include the footer
    include("include/footer.php");
    ?>
</body>
</html>
