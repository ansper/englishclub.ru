<?php
$module_id = $_POST['module_id'];
$description = $_POST['description'];
$text = $_POST['text'];

include('connect.php');
$conn -> query("insert into `theory` (`module_id`, `description`, `text`) VALUE ('$module_id', '$description', '$text')");
$_POST = array();
header('Location: /admin?table=Теория');
?>