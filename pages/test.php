<?php
    session_start();
    include 'scripts/php/connect.php';
    $id = $matches[1];

    $userHave = $conn -> query('SELECT * from usermodule where user_id = '.$_SESSION['user_id'].' and module_id='.$id.' and isCompleted=0');
    
    if($userHave -> num_rows < 1) {
        header('Location: /catalog');
    }
    $userHaveRow = $userHave -> fetch_assoc();
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
            $theory = $conn -> query('SELECT id from theory where module_id = '.$id) -> fetch_assoc();
            $test = $conn -> query('SELECT * from test where theory_id = '.$theory['id']) -> fetch_assoc();
            echo '<p class="description">'.$test['description'].'</p>';
            $questionResult = $conn -> query('SELECT * from question where test_id = '.$test['id']);
            $num = 1;?>
            <form action="../scripts/php/testResult.php" method="POST">
                <input type="hidden" name="testId" value="<?= $test['id']?>">
                <input type="hidden" name="userHaveId" value="<?= $userHaveRow['id']?>">
            <?php while($questionRow = $questionResult -> fetch_assoc()) {
                echo '<h3 class="question">'.$num.' '.$questionRow['question_text'].'</h3>';
                $num = $num + 1;
                $answerResult = $conn -> query('SELECT * from answer where question_id = '.$questionRow['id']);
                while($answerRow = $answerResult -> fetch_assoc()) {?>
                    <input type="radio" id="<?= $answerRow['id']?>" name="<?= $questionRow['id']?>" value="<?= $answerRow['is_correct']?>"> <label for="<?= $answerRow['id']?>"><?= $answerRow['text']?></label><br> 
                <?php } } ?>
                <br><input class="goEnd" type="submit" value="Отправить">
            </form>
        </div>
    </main>
</body>
</html>