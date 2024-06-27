<?php
    session_start();
    include 'connect.php';
    $userId = $_SESSION['user_id'];
    $testId = $_POST['testId'];
    $userHaveId = $_POST['userHaveId'];
    $points = 0;

    $questionResult = $conn -> query('SELECT * from question where test_id = '.$testId);
    while($questionRow = $questionResult -> fetch_assoc()) {
        if($_POST[$questionRow['id']] == 1) {
            $answerIsCorrectPoints = $conn -> query('SELECT * from answer where question_id = '.$questionRow['id'].' AND is_correct = 1') -> fetch_assoc();
            $points = $points + $answerIsCorrectPoints['points'];
        }
    }
    if($points >= 30) {
        $conn -> query("UPDATE usermodule SET `isCompleted` = '1' where id =".$userHaveId);
        $usermodule = $conn -> query('SELECT * from usermodule where id = '.$userHaveId) -> fetch_assoc();
        $module = $conn -> query('SELECT * from module where id = '.$usermodule['module_id']) -> fetch_assoc();
        $course = $conn -> query('SELECT * from course where id = '.$module['course_id']) -> fetch_assoc();
        $conn -> query("UPDATE user SET `".$course['type']."_points` = ".$points." where id = ".$userId);
    } 
    header('Location: /testend/'.$points);

?>