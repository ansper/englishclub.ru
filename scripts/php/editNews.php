<?php
  include 'connect.php';
  $id = $_POST['id'];
  $title = $_POST['title'];
  $date = $_POST['date'];
  $description = $_POST['description'];
  $sql = "UPDATE `news` SET `title`='$title', `date`='$date', `description`='$description' WHERE id=$id";
  mysqli_query($conn, $sql);
  mysqli_close($conn);
  header('Location: /admin?table=Новости');
?>