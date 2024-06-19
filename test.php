<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Poetsen+One&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/style.css">
    <title>Go Trip</title>
</head>

<body>

    <body>

        <?php
            //header include
            include("include/header.php");
        ?>
        
        <!--===============Banner================-->
    <video autoplay muted loop class="banner-video">
        <source src="images/mixkit-bright-orange-sunset-on-beach-2168-full-hd.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>


        <!--===== Booking =====-->
    <section class = "booking">

        <h1 class = "heading-title">Find your Next tour!</h1>

        <form action="book_form.php" method="post" class = "book-form">

        <div class = "flex">
            <div class = "inputbox">
                <span>Name :</span>
                <input class = "input" type="text" placeholder = "Enter your name" name = "Name">
            </div>
            <div class = "inputbox">
                <span>Email :</span>
                <input class = "input" type="email" placeholder = "Enter your email" name = "Email">
            </div>
            <div class = "inputbox">
                <span>Phone number :</span>
                <input class = "input" type="number" placeholder = "Enter your phone number" name = "Phone number">
            </div>
            <div class = "inputbox">
                <span>Address :</span>
                <input class = "input" type="text" placeholder = "Enter your address" name = "Address">
            </div>
            <div class = "inputbox">
                <span>Where to :</span>
                <input class = "input" type="text" placeholder = "Enter your destenation" name = "Destenation">
            </div>
            <div class = "inputbox">
                <span>How many :</span>
                <input class = "input" type="number" placeholder = "Enter how many guests" name = "Guests">
            </div>
            <div class = "inputbox">
                <span>Arrivals :</span>
                <input class = "input" type="date" name = "Arrivals">
            </div>
            <div class = "inputbox">
                <span>Leaving :</span>
                <input class = "input" type="date" name = "Leaving">
            </div>
        </div>

        <input type="Submit" value = "Submit" class = "btn" name = "Send">

        </form>

    </section>

        <!--===========Footer=================-->
        <div class="footer">
            <div class="links">
                <h3>Quick Links</h3>
                <ul>
                    <li>Offers & Discounts</li>
                    <li>Get Coupon</li>
                    <li>Contact Us</li>
                    <li>About</li>
                </ul>
            </div>
            <div class="links">
                <h3>New Products</h3>
                <ul>
                    <li>Woman Cloth</li>
                    <li>Fashion Accessories</li>
                    <li>Man Accessories</li>
                    <li>Rubber made Toys</li>
                </ul>
            </div>
            <div class="links">
                <h3>Support</h3>
                <ul>
                    <li>Frequently Asked Questions</li>
                    <li>Report a Payment Issue</li>
                    <li>Terms & Conditions</li>
                    <li>Privacy Policy</li>
                </ul>
            </div>
        </div>
    </body>

</html>
</body>

</html>