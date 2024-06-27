<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Poetsen+One&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/style.css">
    <title>Vakantie Pagina</title>
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
                <input class = "input" type="text" placeholder = "Enter your name" name = "name">
            </div>
            <div class = "inputbox">
                <span>Email :</span>
                <input class = "input" type="email" placeholder = "Enter your email" name = "email">
            </div>
            <div class = "inputbox">
                <span>Phone number :</span>
                <input class = "input" type="number" placeholder = "Enter your phone number" name = "phone_number">
            </div>
            <div class = "inputbox">
                <span>Address :</span>
                <input class = "input" type="text" placeholder = "Enter your address" name = "address">
            </div>
            <div class = "inputbox">
                <span>Where to :</span>
                <input class = "input" type="text" placeholder = "Enter your destenation" name = "destenation">
            </div>
            <div class = "inputbox">
                <span>How many :</span>
                <input class = "input" type="number" placeholder = "Enter how many guests" name = "guests">
            </div>
            <div class = "inputbox">
                <span>Arrivals :</span>
                <input class = "input" type="date" name = "arrivals">
            </div>
            <div class = "inputbox">
                <span>Leaving :</span>
                <input class = "input" type="date" name = "leaving">
            </div>
        </div>

        <input type="Submit" value = "Submit" class = "btn" name = "send">

        </form>

    </section>

    <div class="container">
    	<h1 class="mt-5 mb-5">Review & Rating System in PHP & Mysql using Ajax</h1>
    	<div class="card">
    		<div class="card-header">Sample Product</div>
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4">
    					<h1 class="text-warning">
    						<b><span id="average_rating">0.0</span> / 5</b>
    					</h1>
    					<div class="mb-3">
    						<i class="fa-star"></i>
                            <i class="fa-star"></i>
                            <i class="fa-star"></i>
                            <i class="fa-star"></i>
                            <i class="fa-star"></i>
	    				</div>
    					<h3><span id="total_review">0</span> Review</h3>
    				</div>
    				<div class="col-sm-4">
    					<p>
                            <div class="progress-label-left"><b>5</b> <i class="fa-star"></i></div>

                            <div class="progress-label-right">(<span id="">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar"id=""></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>4</b> <i class="fa-star ]"></i></div>
                            
                            <div class="progress-label-right">(<span id="">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar " id=""></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class=""></i></div>
                            
                            <div class="progress-label-right">(<span id="">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar" id=""></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class=""></i></div>
                            
                            <div class="progress-label-right">(<span id="">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" id=""></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="fa-star"></i></div>
                            
                            <div class="progress-label-right">(<span id="">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" id=""></div>
                            </div>               
                        </p>
    				</div>
    				<div class="text-center">
    					<h3 class="">Write Review Here</h3>
    					<button type="button" name="" id="" class="btn">Review</button>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id=""></div>
    </div>

        <?php
        //include footer
        include("include/footer.php");
        ?>
    </body>
</html>
</body>

</html>
