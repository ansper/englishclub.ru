<?php
    include 'connect.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $review = $_POST['review'];

    $conn -> query("insert into `support` (`name`, `email`, `question`) VALUE ('$name', '$email', '$review')");
    $_POST = array();
    header('Location: /lk');
    

?>