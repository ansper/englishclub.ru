<?php
  include 'connect.php';
  $id = $_POST['id'];
  $text = $_POST['text'];
  $is_correct = $_POST['is_correct'];
  $points = $_POST['points'];
  $sql = "UPDATE `answer` SET `text`='$text', `is_correct`='$is_correct', `points`='$points' WHERE id=$id";
  mysqli_query($conn, $sql);
  mysqli_close($conn);
  header('Location: /admin?table=Ответы');
?>