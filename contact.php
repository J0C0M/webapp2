<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Poetsen+One&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact page</title>
</head>
<body>
    <?php
    //header include
    include("include/header.php");
    include("include/connect.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $message = htmlspecialchars($_POST["message"]);

        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
            if ($stmt->execute([$name, $email, $message])) {
                } else {
                echo "<div class='error'>Error: " . $stmt->errorInfo()[2] . "</div>";
            }
        } catch (PDOException $e) {
            echo "<div class='error'>connectie is mislukt: " . $e->getMessage() . "</div>";
        }
    }
    ?>

    <div class="contact-container">
        <h1 class="index-btn">Contact Us</h1>
        <form action="" method="post">
            <div class="form-group">
                <label class="contact-text" for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label class="contact-text" for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label class="contact-text" for="message">Message</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <button class="btn" id="submit" type="submit">Submit</button>
        </form>
    </div>

    <?php
    //include footer
    include("include/footer.php");
    ?>
</body>
</html>