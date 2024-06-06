<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Poetsen+One&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<?php include("include/header.php"); ?>

<body>
    <div class="form-container">
        <div class="form-box">
            <div class="introduction-box">
            <p class="introduction-text-top">
                Hallo,
            </p>
            <p class="introduction-text-bottom">
                Welkom!
            </p>
            </div>
            <form name="login-form" action="login.php" method="post" class="form">
                <input type="email" class="email-box" placeholder="Email">
                <input type="password" class="password-box" placeholder="Wachtwoord">
                <div class="button-box">
                <button type="submit" class="submit-button">Sign up</button>
                <button type="submit" class="submit-button">Log in</button>
        </div>
        </form>
    </div>
    </div>
    <video class="video" autoplay loop muted plays-inline>
        <source src="images/login.mp4" type="video/mp4">
    </video>
</body>
<?php include("include/header.php"); ?>

</html>