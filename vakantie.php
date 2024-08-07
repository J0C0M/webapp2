<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Poetsen+One&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/style.css">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vakantie Pagina</title>
</head>
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
        <section>
    <form action="book_form.php" method="post" class="book-form">
        <div class="flex">
            <div class="inputbox">
                <span>Name :</span>
                <input class="input" type="text" placeholder="Enter your name" name="name" required>
            </div>
            <div class="inputbox">
                <span>Email :</span>
                <input class="input" type="email" placeholder="Enter your email" name="email" required>
            </div>
            <div class="inputbox">
                <span>Phone number :</span>
                <input class="input" type="tel" placeholder="Enter your phone number" name="phone_number" required>
            </div>
            <div class="inputbox">
                <span>Address :</span>
                <input class="input" type="text" placeholder="Enter your address" name="address" required>
            </div>
            <div class="inputbox">
                <span>Where to :</span>
                <select class="input" name="destination" required>
                <div class="container">
                    <?php
                    // Your PHP code to fetch and display books/vacations
                    session_start();

                    $host = 'mysql_db';
                    $db = 'vakantie';
                    $user = 'root';
                    $pass = 'rootpassword';
                    $charset = 'utf8mb4';

                    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

                    $options = [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ];

                    try {
                        $pdo = new PDO($dsn, $user, $pass, $options);
                    } catch (\PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                        exit;
                    }

                    $sql = "SELECT * FROM boeken";
                    $result = $pdo->query($sql);

                    while ($boeken = $result->fetch()) {
                        $image = htmlspecialchars($boeken["image"]);
                        $activities = htmlspecialchars($boeken["activities"]);
                        $name = htmlspecialchars($boeken["name"]);
                        $about = htmlspecialchars($boeken["about"]);
                        $book = htmlspecialchars($boeken["book"]);
                        $price = htmlspecialchars($boeken["price"]);

                        // Output each vacation as a block
                        echo "<div class='boeken'>" .
                            "<div class='activities'>$activities</div>" .
                            "<img src='$image' alt='Image' class='book-image'>" .
                            "<div class='name'>$name</div>" .
                            "<div class='about'>$about</div>" .
                            "<button class='book-button' data-name='$name' data-about='$about' data-price='$price' data-toggle='modal' data-target='#bookingModal'>Book</button>" . // Button with data attributes
                            "<div class='price'>$price</div>" .
                            "</div>";
                    }
                    ?>
    </div>
                </select>
            </div>
            <div class="inputbox">
                <span>How many :</span>
                <input class="input" type="number" placeholder="Enter how many guests" name="guests" required>
            </div>
            <div class="inputbox">
                <span>Arrivals :</span>
                <input class="input" type="date" name="arrivals" required>
            </div>
            <div class="inputbox">
                <span>Leaving :</span>
                <input class="input" type="date" name="leaving" required>
            </div>
        </div>
        <input type="submit" value="Submit" class="btn" name="send">
    </form>
</section>

<div class="container">
  <?php
  // Your PHP code to fetch and display books/vacations
  $host = 'mysql_db';
  $db = 'vakantie';
  $user = 'root';
  $pass = 'rootpassword';
  $charset = 'utf8mb4';

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

  $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false,
  ];

  try {
      $pdo = new PDO($dsn, $user, $pass, $options);
  } catch (\PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      exit;
  }

  $sql = "SELECT * FROM boeken";
  $result = $pdo->query($sql);

  while ($boeken = $result->fetch()) {
      $image = htmlspecialchars($boeken["image"]);
      $activities = htmlspecialchars($boeken["activities"]);
      $name = htmlspecialchars($boeken["name"]);
      $about = htmlspecialchars($boeken["about"]);
      $book = htmlspecialchars($boeken["book"]);
      $price = htmlspecialchars($boeken["price"]);

      // Output each vacation as a block
      echo "<div class='boeken'>" .
          "<div class='activities'>$activities</div>" .
          "<img src='$image' alt='Image' class='book-image'>" .
          "<div class='name'>$name</div>" .
          "<div class='about'>$about</div>" .
          "<button class='book-button' data-name='$name' data-about='$about' data-price='$price' data-toggle='modal' data-target='#bookingModal'>Book</button>" . // Button with data attributes
          "<div class='price'>$price</div>" .
          "</div>";
  }
  ?>
</div>

<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookingModalLabel">Book Vacation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Booking Form -->
        <section>
        <form action="book_form.php" method="post" class="book-form">
            <div class="flex">
                <div class="inputbox">
                    <span>Name :</span>
                    <input class="input" type="text" placeholder="Enter your name" name="name" required>
                </div>
                <div class="inputbox">
                    <span>Email :</span>
                    <input class="input" type="email" placeholder="Enter your email" name="email" required>
                </div>
                <div class="inputbox">
                    <span>Phone Number :</span>
                    <input class="input" type="text" placeholder="Enter your phone number" name="phone_number" required>
                </div>
                <div class="inputbox">
                    <span>Address :</span>
                    <input class="input" type="text" placeholder="Enter your address" name="address" required>
                </div>
                <div class="inputbox">
                    <span>Destination :</span>
                    <input class="input" type="text" placeholder="Enter your destination" name="destination" required>
                </div>
                <div class="inputbox">
                    <span>Number of Guests :</span>
                    <input class="input" type="number" placeholder="Enter number of guests" name="guests" required>
                </div>
                <div class="inputbox">
                    <span>Arrival Date :</span>
                    <input class="input" type="date" name="arrivals" required>
                </div>
                <div class="inputbox">
                    <span>Leaving Date :</span>
                    <input class="input" type="date" name="leaving" required>
                </div>
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
    </section>
      </div>
    </div>
  </div>
</div>


        
    <div class="container column">
    	<h1 class="mt-5 mb-5"></h1>
    	<div class="card">
    		<div class="card-header">Epic Vacations reviews</div>
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating">0.0</span> / 5</b>
    					</h1>
    					<div class="mb-3">
    						<i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
	    				</div>
    					<h3><span id="total_review">0</span> Review</h3>
    				</div>
    				<div class="col-sm-4">
    					<p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                        </p>
    				</div>
    				<div class="col-sm-4 text-center">
    					<h3 class="mt-4 mb-3">Schrijf je review hier</h3>
    					<button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
    </div>

    <?php
        //include footer
        include("include/footer.php");
        ?>
</body>
</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit de review</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>

<script>

$(document).ready(function(){

	var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"submitRating.php",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
        $.ajax({
            url:"submitRating.php",
            method:"POST",
            data:{action:'load_data'},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

});

</script>
<script>
$(document).ready(function() {
  // When a book button is clicked
  $('.book-button').click(function() {
    var name = $(this).data('name');
    var about = $(this).data('about');
    var price = $(this).data('price');

    // Set modal inputs with vacation details
    $('#vacationName').val(name);
    $('#bookingModalLabel').text('Book ' + name); // Update modal title with vacation name

    // Show the modal
    $('#bookingModal').modal('show');
  });
});

</script>

