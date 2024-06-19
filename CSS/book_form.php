<?php
    $connection = mysqli_connect('localhost', 'root', 'book_db', )

    if(isset($_POST['Send'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $destenation = $_POST['destenation'];
        $guests = $_POST['guests'];
        $arrival = $_POST['arrival'];
        $leaving = $_POST['leaving'];

        $request = "insert into book_form(name,	email, phone_number, address, destenation, guests, arrivals, leaving)
        values ('$name', '$email', '$phone_number', '$address', '$destenation', '$guests', '$arrival', '$leaving')";

        mysqli_query($connection, $request);

        header ('location:book.php');
    }else{
        echo 'something went wrong try again';
    }
?>