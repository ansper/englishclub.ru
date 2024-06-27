<?php
$description = $_POST['description'];
$theory_id = $_POST['theory_id'];

include('connect.php');
$conn -> query("insert into `test` (`description`, `theory_id`) VALUE ('$description', '$theory_id')");
$_POST = array();
header('Location: /admin?table=Тесты');
?>