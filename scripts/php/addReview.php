<?php
    include 'connect.php';

    $name = $_POST['name'];
    $mark = $_POST['rating'];
    $review = $_POST['review'];
    $courseId = $_POST['courseId'];

    $conn -> query("insert into `review` (`name`, `mark`, `description`, `course_id`) VALUE ('$name', $mark, '$review', $courseId)");
    $_POST = array();
    if(!isset($courseId)) {
        header('Location: /reviews');
    } else {
        header('Location: /course/'.$courseId);
    }
    

?>