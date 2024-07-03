<?php ob_start(); ?>
<?php
require "include/connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $newPassword = $_POST['password'];

    $sql = "UPDATE user SET password = :password WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':password', $newPassword);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        die("Je wachtwoord is gereset!");
    } else {
        die("Er bestaat geen account met deze email!");
    }
}
?>
<?php

?>

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
    <div class="login-form-container">
        <div class="login-form-box">
            <div class="login-introduction-box">
                <p class="login-introduction-text-top">
                    Wachtwoord
                </p>
                <p class="login-introduction-text-bottom">
                    vergeten?
                </p>
            </div>
            <form name="login-form" action="resetPassword.php" method="post" class="login-form">
                <input type="email" id="email" name="email" class="login-name-box" placeholder="email">
                <input type="password" id="password" name="password" class="login-name-box" placeholder="Nieuw wachtwoord">
                <div class="login-button-box">
                    <button value="submit" type="submit" name="submit" class="login-submit-button">Log in</button>
                </div>
            </form>
        </div>
    </div>
    <video class="video" autoplay loop muted plays-inline>
        <source src="images/login.mp4" type="video/mp4">
    </video>
</body>
<?php include("include/footer.php"); ?>

</html>