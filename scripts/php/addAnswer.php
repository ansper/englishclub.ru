<?php
$question = $_POST['question'];
$text = $_POST['text'];
$is_correct = $_POST['is_correct'];
$points = $_POST['points'];

include('connect.php');
$conn -> query("insert into `answer` (`question_id`, `text`, `is_correct`, `points`) VALUE ('$question', '$text', '$is_correct', '$points')");
$_POST = array();
header('Location: /admin?table=Ответы');
?>