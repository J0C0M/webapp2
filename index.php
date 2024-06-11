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