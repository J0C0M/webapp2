<?php ob_start(); ?>
<?php
require "include/connect.php";
session_start();

?>
<?php
if (isset($_POST['login'])) {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        die("Er moet iets ingevuld worden.");
    } else {
        $query = "SELECT * FROM user WHERE email = :email AND password = :password";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $_POST['email']);
        $stmt->bindParam(":password", $_POST['password']);
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['admin'] = $user['admin'];
        }

        if ($user == false) {
        die("Dit account bestaat niet!");
        }
        if ($user['admin'] == '0') {
            header("Location: account.php");
        }

        if ($user['admin'] == '1') {
            header("Location: admin.php");
        }
    }
}

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
                    Hallo,
                </p>
                <p class="login-introduction-text-bottom">
                    Welkom!
                </p>
            </div>
            <form name="login-form" action="login.php" method="post" class="login-form">
                <input type="email" id="email" name="email" class="login-name-box" placeholder="email">
                <input type="password" id="password" name="password" class="login-password-box" placeholder="Wachtwoord">
                <div class="login-button-box">
                    <a class="login-forgot-password-button" href="resetPassword.php">Wachtwoord vergeten</a>
                    <a class="login-signup-button" href="signup.php">Sign up</a>
                    <button value="submit" type="submit" name="login" class="login-submit-button">Log in</button>
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