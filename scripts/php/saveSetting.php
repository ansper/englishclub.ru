<?php 
    session_start();
    include 'connect.php';

    $id = $_SESSION['user_id'];
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $patronymic = $_POST['patronymic'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    //$password = $_POST['password'];
    //$passwordNew = $_POST['new-password'];

    $conn -> query("UPDATE user SET `surname` = '$surname', `name` = '$name', `patronymic` = '$patronymic', `birthday` = '$birthday', `email` = '$email' where id = $id");
    $_POST = array();
    header('Location: /setting');

?>