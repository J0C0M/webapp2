<?php
session_start();
if (isset($_SESSION['user'])) {
            echo $_SESSION['user'];
} else {
    header(header: "Location: index.php");
}

?>

<?php
echo "Login succes!;"
?>