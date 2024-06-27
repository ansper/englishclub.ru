<?php
    include 'connect.php';
    session_start();
    if(!$_SESSION['login_status']) {
        header('Location: /auth');
    }

    $userId = $_SESSION['user_id'];
    $fullName = $_POST['fullName'];
    $fullNameArray = explode(" ", $fullName);
    $surname = $fullNameArray[0];
    $name = $fullNameArray[1];
    $patronymic = $fullNameArray[2];
    $email = $_POST['email'];
    $courseId = $_POST['courseId'];

    $conn -> query("insert into `courseregistration` (`name`, `surname`, `patronymic`, `email`, `course_id`) VALUE ('$name', '$surname', '$patronymic', '$email', '$courseId')");
    $conn -> query("insert into `usercourse` (`user_id`, `course_id`) VALUE ('$userId', '$courseId')");
    $moduleResult = $conn -> query('SELECT * from module where course_id = ' . $courseId);
    while($moduleRow = $moduleResult -> fetch_assoc()) {
        $conn -> query("insert into `usermodule` (`user_id`, `module_id`, `isCompleted`) VALUE ('$userId', '$moduleRow[id]', '0')");
    }

    $_POST = array();

    header('Location: /lk');

?>