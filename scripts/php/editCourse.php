<?php
  include 'connect.php';
  $id = $_POST['id'];
  $name = $_POST['name'];
  $modules = $_POST['modules'];
  $duration = $_POST['duration'];
  $price = $_POST['price'];
  $type = $_POST['type'];
  $about = $_POST['about'];
  $tests = $_POST['tests'];
  $lesson = $_POST['lesson'];
  $sql = "UPDATE `course` SET `name`='$name', `modules`='$modules', `duration`='$duration', `price`='$price', `type`='$type', `about`='$about', `tests`='$tests', `lesson`='$lesson' WHERE id=$id";
  mysqli_query($conn, $sql);
  mysqli_close($conn);
  header('Location: /admin?table=Курсы');
?>