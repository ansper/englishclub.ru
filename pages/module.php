<?php
    session_start();
    include 'scripts/php/connect.php';
    $id = $matches[1];

    $userHave = $conn -> query('SELECT * from usermodule where user_id = '.$_SESSION['user_id'].' and module_id='.$id.' and isCompleted = 0');
    
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
    <link rel="stylesheet" href="../assets/css/module.css">
    <link rel="icon" href="../assets/img/favicon.ico">
    <title>EnglishClub.ru</title>
</head>
<body>
    <?php include 'components/header.php';?>
    <main class="_container">
        <?php include 'components/navigation.php';?>
        <div class="main">       
        <?php
            $module = $conn -> query('SELECT * from module where id = '.$id) -> fetch_assoc();
            echo '<h2>' . $module['name'] . '</h2>';
            $theory = $conn -> query('SELECT * from theory where module_id = '.$id) -> fetch_assoc();
        ?>
            <p class="description"><?= $theory['description']?></p>
            <p class="text"><?= $theory['text']?></p>
        
            <?php
                $course = $conn -> query('SELECT * from course where id = '.$module['course_id']) -> fetch_assoc();
                if($course['type'] == 'english') {
            ?>
                <p class="description">Ключевые слова:</p>
            <?php }?>
            <div>
                <?php
                    $wordResult = $conn -> query('SELECT * from word where theory_id = '.$theory['id']);
                    while($wordRow = $wordResult -> fetch_assoc()) {
                ?>     
                <span class="words"><?= $wordRow['word_english']?> / <?= $wordRow['word_russia']?></span> <br>
                <?php }?>
            </div>
            <div class="goTest">
                <a href="/test/<?= $id?>">Перейти к тестированию</a>
            </div>
        </div>
    </main>
</body>
</html>