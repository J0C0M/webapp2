<?php 
session_start();
require "include/connect.php"

$stmt = $pdo->prepare('SELECT id, name, password_hash')
?>