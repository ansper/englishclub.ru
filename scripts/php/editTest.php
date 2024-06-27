<?php
  include 'connect.php';
  $id = $_POST['id'];
  $description = $_POST['description'];
  $sql = "UPDATE `test` SET `description`='$description' WHERE id=$id";
  mysqli_query($conn, $sql);
  mysqli_close($conn);
  header('Location: /admin?table=Тесты');
?>