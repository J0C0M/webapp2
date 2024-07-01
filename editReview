<?php
include("include/connect.php");

if(isset($_GET["id"])) {
    $review_id = $_GET["id"];

    // Fetch the review data
    $query = "SELECT * FROM review_table WHERE review_id = :review_id";
    $statement = $pdo->prepare($query);
    $statement->execute([':review_id' => $review_id]);
    $review = $statement->fetch(PDO::FETCH_ASSOC);
}

if(isset($_POST["update"])) {
    $review_id = $_POST["review_id"];
    $user_name = $_POST["user_name"];
    $user_rating = $_POST["user_rating"];
    $user_review = $_POST["user_review"];

    // Update the review data
    $query = "
    UPDATE review_table 
    SET user_name = :user_name, user_rating = :user_rating, user_review = :user_review 
    WHERE review_id = :review_id
    ";
    $statement = $pdo->prepare($query);
    $statement->execute([
        ':user_name' => $user_name,
        ':user_rating' => $user_rating,
        ':user_review' => $user_review,
        ':review_id' => $review_id
    ]);

    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Review</title>
</head>
<body>
    <h1>Edit Review</h1>
    <form method="post">
        <input type="hidden" name="review_id" value="<?php echo $review['review_id']; ?>">
        <label>Username:</label><br>
        <input type="text" name="user_name" value="<?php echo $review['user_name']; ?>"><br>
        <label>Rating:</label><br>
        <input type="number" name="user_rating" value="<?php echo $review['user_rating']; ?>" min="1" max="5"><br>
        <label>Review:</label><br>
        <textarea name="user_review"><?php echo $review['user_review']; ?></textarea><br>
        <button type="submit" name="update">Update</button>
    </form>
    <a href="admin.php">Back to Admin Panel</a>
</body>
</html>