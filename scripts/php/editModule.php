<?php
  include 'connect.php';
  $id = $_POST['id'];
  $name = $_POST['name'];
  $question = $_POST['question'];
  $points = $_POST['points'];
  $sql = "UPDATE `module` SET `name`='$name', `question`='$question', `points`='$points' WHERE id=$id";
  mysqli_query($conn, $sql);
  mysqli_close($conn);
  header('Location: /admin?table=Модули');
?>