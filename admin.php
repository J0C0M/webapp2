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
    <link rel="stylesheet" href="CSS/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        .container {
            margin-top: 50px;
        }
        .table img {
            max-width: 100px;
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
        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <?php
    // Include the header
    if (file_exists("include/header.php")) {
        include("include/header.php");
    } else {
        echo "<p style='color:red;'>Header file not found.</p>";
    }
    ?>
    <div class="container">
        <h1 class="mb-4">Admin Page</h1>

        <h2 class="mb-3">Reviews</h2>
        <?php
        include("include/connect.php"); 

        // Fetch all reviews
        $query = "SELECT * FROM review_table ORDER BY review_id DESC";
        $result = $pdo->query($query, PDO::FETCH_ASSOC);
        ?>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
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
                    <td><?php echo ($review["review_id"]); ?></td>
                    <td><?php echo ($review["user_name"]); ?></td>
                    <td><?php echo ($review["user_rating"]); ?></td>
                    <td><?php echo ($review["user_review"]); ?></td>
                    <td><?php echo date('l jS, F Y h:i:s A', $review["datetime"]); ?></td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='editReview.php?id=<?php echo $review["review_id"]; ?>'>Edit</a>
                        <a class='btn btn-secondary btn-sm' href='deleteReview.php?id=<?php echo $review["review_id"]; ?>'>Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2 class="mb-3">List of Vacation Packages</h2>
        <a class="btn btn-primary mb-3" href="create.php" role="button">New Item</a>
        
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
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
                        <td>" . htmlspecialchars($boeken['id']) . "</td>
                        <td>" . htmlspecialchars($boeken['activities']) . "</td>
                        <td><img src='" . htmlspecialchars($boeken['image']) . "' alt='Image' class='img-thumbnail'></td>
                        <td>" . htmlspecialchars($boeken['name']) . "</td>
                        <td>" . htmlspecialchars($boeken['about']) . "</td>
                        <td>" . htmlspecialchars($boeken['book']) . "</td>
                        <td>" . htmlspecialchars($boeken['price']) . "</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='edit.php?id=" . htmlspecialchars($boeken['id']) . "'>Edit</a>
                            <a class='btn btn-secondary btn-sm' href='delete.php?id=" . htmlspecialchars($boeken['id']) . "'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    // Include the footer
    if (file_exists("include/footer.php")) {
        include("include/footer.php");
    } else {
        echo "<p style='color:red;'>Footer file not found.</p>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
