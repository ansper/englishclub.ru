<?php
  include 'connect.php';
  $id = $_POST['id'];
  $question_text = $_POST['question_text'];
  $sql = "UPDATE `question` SET `question_text`='$question_text' WHERE id=$id";
  mysqli_query($conn, $sql);
  mysqli_close($conn);
  header('Location: /admin?table=Вопросы');
?>