<?php
$title = $_POST['title'];
$date = $_POST['date'];
$description = $_POST['description'];

include('connect.php');
$conn -> query("insert into `news` (`title`, `date`, `description`) VALUE ('$title', '$date', '$description')");
$_POST = array();
header('Location: /admin?table=Новости');
?>