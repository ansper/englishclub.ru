<?php
$course_id = $_POST['course_id'];
$name = $_POST['name'];
$question = $_POST['question'];
$points = $_POST['points'];

include('connect.php');
$conn -> query("insert into `module` (`course_id`, `name`, `question`, `points`) VALUE ('$course_id', '$name', '$question', '$points')");
$_POST = array();
header('Location: /admin?table=Модули');
?>