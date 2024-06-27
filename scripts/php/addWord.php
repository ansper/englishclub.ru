<?php
$theory_id = $_POST['theory_id'];
$word_english = $_POST['word_english'];
$word_russia = $_POST['word_russia'];

include('connect.php');
$conn -> query("insert into `word` (`theory_id`, `word_english`, `word_russia`) VALUE ('$theory_id', '$word_english', '$word_russia')");
$_POST = array();
header('Location: /admin?table=Слова');
?>