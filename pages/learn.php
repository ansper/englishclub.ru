<?php
    session_start();
    include 'scripts/php/connect.php';
    $id = $matches[1];
    $userHave = $conn -> query('SELECT * from usercourse where user_id = '.$_SESSION['user_id'].' and course_id='.$id);
    
    if($userHave -> num_rows < 1) {
        header('Location: /catalog');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/learn.css">
    <link rel="icon" href="../assets/img/favicon.ico">
    <title>EnglishClub.ru</title>
</head>
<body>
    <?php include 'components/header.php';?>
    <main class="_container">
        <?php include 'components/navigation.php';?>
        <div class="main">
        <?php
            $course = $conn -> query('SELECT * from course where id = '.$id) -> fetch_assoc();
            echo '<h2>' . $course['name'] . '</h2>';
            $modules = $conn -> query('SELECT * from module where course_id = '.$id);
            $moduleId = 1;
                while($row = $modules -> fetch_assoc()) {
                    $usermodule = $conn -> query('SELECT * from usermodule where module_id = '.$row['id'].' AND user_id = '.$_SESSION['user_id']) -> fetch_assoc();
        ?>
        
        <div class="module">
            <h4><span>Модуль <?= $moduleId?>:</span> <?= $row['name']?></h4>
            <?php
                if($usermodule['isCompleted']) {
            ?>
                <h4>Пройдено</h4>
            <?php
                } else {
            ?>
                <a href="/module/<?= $row['id']?>">Начать</a>
            <?php
                }
            ?>
        </div>
        <?php 
            $moduleId = $moduleId + 1;
        }
        ?>
        </div>
    </main>
</body>
</html>