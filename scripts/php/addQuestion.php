<?php
$test_id = $_POST['test_id'];
$question_text = $_POST['question_text'];

include('connect.php');
$conn -> query("insert into `question` (`test_id`, `question_text`) VALUE ('$test_id', '$question_text')");
$_POST = array();
header('Location: /admin?table=Вопросы');
?>