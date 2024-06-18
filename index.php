<?php 
include("include/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Poetsen+One&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index page</title>
</head>
<body>
    <?php
    //header include
    include("include/header.php");
    ?>

    <div id="cookie-consent-banner" class="cookie-banner">
        <p>Wij gebruiken cookies om uw ervaring te verbeteren. Door onze site te gebruiken, gaat u akkoord met ons gebruik van cookies. <a href="cookie.php">Leer meer</a>.</p>
        <button id="accept-cookies">Accept</button>
    </div>

    <script src="javascript/cookie.js"></script> 

    <div>
        <!--slide show van plaatsen-->
        <div class="slider-wrapper">
            <div class="slider">
                <img id="slide-1" src="images/mcbeach.jpg" alt="3D rendering of a minecraft beach">
                <img id="slide-2" src="images/gotham.png" alt="3D rendering of gotham city">
                <img id="slide-3" src="images/lootlake.png" alt="3D rendering of the og fortnite loot lake">
            </div>
            <div class="slider-nav">
                <a href="#slide-1"></a>
                <a href="#slide-2"></a>
                <a href="#slide-3"></a>
            </div>
        </div>
    </div>

    <div>
        <!--search bar-->
    </div>
    
    <div>
        <!--over tab-->
        <skidi class="over-ons-home">
            <h1>Boek snel een crazy vakantie bij Epic Vacations</h1>
            <div>
                <p>Bij Epic Vacations maken we jouw droomreizen werkelijkheid door je de kans te bieden om echte vakanties te boeken naar de meest fantastische en iconische locaties in de wereld! Of je nu altijd al hebt gedroomd van een bezoek aan de duistere straten van Gotham City, 90s cranken op het Fortnite eiland, een hotel boeken in Bikini Bottom, of andere fantastische bestemmingen wilt verkennen, dan is dit de enige en beste plaats daarvoor.</p>
                <img src="images/arrowpng.parspng 1.png">
            </div>
        </div>

    <?php 
    //booking
    ?>

    <?php
    //include footer
    include("include/footer.php");
    ?>
</body>
</html>