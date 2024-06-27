<?php 
    session_start();
    include("connect.php");

    $login = $_POST['email'];
    $password = $_POST['password'];

    $password = md5($password);
    $result = $conn -> query("select * from user where email='$login' and password='$password'");
    if($result -> num_rows > 0) {
        $res = $result -> fetch_assoc();
        $_SESSION['login_status'] = true;
        $_SESSION['user_name'] = $res['name'];
        $_SESSION['user_id'] = $res['id'];
        header('Location: /');
    } else {
        $conn -> close();
        header('Location: /auth');
    }
?>