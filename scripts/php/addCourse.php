<?php
$name = $_POST['name'];
$modules = $_POST['modules'];
$duration = $_POST['duration'];
$price = $_POST['price'];
$type = $_POST['type'];
$about = $_POST['about'];
$tests = $_POST['tests'];
$lesson = $_POST['lesson'];

include('connect.php');
$conn -> query("insert into `course` (`name`, `modules`, `duration`, `price`, `type`, `about`, `tests`, `lesson`) VALUE ('$name', '$modules', '$duration', '$price', '$type', '$about', '$tests', '$lesson')");
$_POST = array();
header('Location: /admin?table=Курсы');
?>