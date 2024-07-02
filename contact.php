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

    // dit is te vaak gebeurd
    if (!($pdo instanceof mysqli)) {
        die("kan niet connecten naar database.");
    }

    // contact php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $message = htmlspecialchars($_POST["message"]);

        $stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            echo "<div class='success'>New contact submission has been sent!</div>";
        } else {
            echo "<div class='error'>Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    }

    $conn->close();
    ?>

<div class="contact-container">
        <h1 class="index-btn">Contact us</h1>
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
            <button type="submit">Submit</button>
        </form>
    </div>

    <?php
    //include footer
    include("include/footer.php");
    ?>
</body>
</html>