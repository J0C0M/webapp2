<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Poetsen+One&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="CSS/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Logic</title>
</head>
<body>

<div class="container">
  <?php
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

      echo "<div class='boeken'>" .
          "<div class='activities'>$activities</div>" .
          "<img src='$image' alt='Image' class='book-image'>" .
          "<div class='name'>$name</div>" .
          "<div class='about'>$about</div>" .
          "<div class='book'>$book</div>" .
          "<div class='price'>$price</div>" .
          "</div>";
  }
  ?>
</div>


</body>
</html>
