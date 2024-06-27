<?php 
    session_start();
    include("connect.php");

    $fullName = $_POST['fullName'];
    $fullNameArray = explode(" ", $fullName);
    $surname = $fullNameArray[0];
    $name = $fullNameArray[1];
    $patronymic = $fullNameArray[2];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = hash('md5', $password);
    $conn -> query("insert into `user` (`name`, `surname`, `patronymic`, `password`, `english_points`, `it_points`, `email`, `birthday`, `is_admin`) VALUE ('$name', '$surname', '$patronymic', '$password', NULL, NULL, '$email', NULL, '0')");
    $result = $conn -> query("select * from user where email='$email'");
    $_SESSION['login_status'] = true;
    $_SESSION['user_name'] = $result -> fetch_assoc()['name'];
    $_SESSION['user_id'] = $result -> fetch_assoc()['id'];
    
    $conn -> close();
    header('Location: /');
    
?>