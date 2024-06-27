<?php 
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    include("conn.php");

    $sql = "DELETE FROM menukaart WHERE id=$id";
    $pdo->query($sql);
} 

header("Location: admin.php");
exit;
?>