<?php
  include 'connect.php';
  $id = $_POST['id'];
  $description = $_POST['description'];
  $text = $_POST['text'];
  $sql = "UPDATE `theory` SET `description`='$description', `text`='$text' WHERE id=$id";
  mysqli_query($conn, $sql);
  mysqli_close($conn);
  header('Location: /admin?table=Теория');
?>