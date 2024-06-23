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
    ?>

    <div class="contact-container">
        <h1>Contact Us</h1>
        <form action="contact.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <?php 
        include("include/connect.php");


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

        
        if ($dsn->query($sql) === TRUE) {
            echo "Thank you for contacting us. We will get back to you shortly.";
        } else {
            echo "Error: " . $sql . "<br>" . $dsn->error;
        }

        $dsn->close();
    } else {
        echo "Invalid request method.";
    }
?>


    <?php
    //include footer
    include("include/footer.php");
    ?>
</body>
</html>