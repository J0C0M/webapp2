<?php
session_start();
if (isset($_SESSION['email'])) {
} else {
    header(header: "Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="CSS/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>account</title>
</head>
<?php include("include/header.php"); ?>
<body>
        <a href="logout.php" Uitloggen>Uitloggen</a>
</body>
<?php include("include/footer.php"); ?>

</html>