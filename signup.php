<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Poetsen+One&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
</head>
<?php include("include/header.php"); ?>

<body>
    <div class="signup-form-container">
        <div class="signup-form-box">
            <div class="signup-introduction-box">
                <p class="signup-introduction-text">
                    Maak een account!
                </p>
            </div>
            <form action="signupLogic.php" name="signup-form" method="post" class="signup-form" novalidate>
                <input id="name" type="text" name="name" class="signup-input-box" placeholder="Naam">
                <input id="email" type="email" name="email" class="signup-input-box" placeholder="Email">
                <input id="password" type="password" name="password" class="signup-input-box" placeholder="Wachtwoord">
                <input id="password_confirmation" type="password" name="password_confirmation" class="signup-input-box" placeholder="Bevestig wachtwoord">
                <div class="signup-button-box">
                    <button class="signup-submit-button">Create</button>
                </div>
            </form>
        </div>
    </div>
    <video class="video" autoplay loop muted plays-inline>
        <source src="images/login.mp4" type="video/mp4">
    </video>
</body>
<?php include("include/footer.php");
?>

</html>