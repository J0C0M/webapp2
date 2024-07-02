<?php
session_start();
if (isset($_SESSION['email'])) {
            echo $_SESSION['email'];
} else {
    header(header: "Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>account</title>
</head>
<body>
    
</body>
</html>