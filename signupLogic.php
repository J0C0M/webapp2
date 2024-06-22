<?php

// checkt of er een naam is ingevuld
if (empty($_POST["name"])) {
    die("Er moet een naam ingevuld worden");
}

// checkt of er een email is ingevuld
if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Er moet een email ingevuld worden");
}

// checkt of de wachtwoord uit meer dan 8 characters betsaat
if (strlen($_POST["password"]) < 8) {
    die("Wachtwoord moet minimaal uit 8 characters bestaan");
}

// checkt of wachtwoord minimaal 1 letter heeft
if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Wachtwoord moet minimaal 1 letter hebben");
}

// checkt of wachtwoord minimaal 1 cijfer heeft
if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Wachtwoord moet minimaal 1 cijfer hebben");
}

// checkt of de beide wachtwoorden hetzelfde zijn
if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Wachtwoord moet hetzelfde zijn");
}

// zorgt ervoor dat je wachtwoord in de database random generated nummers en cijfers wordt
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/include/database.php";
    

print_r($_POST);
var_dump($password_hash);