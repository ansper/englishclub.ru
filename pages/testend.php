<?php
    session_start();
    include 'scripts/php/connect.php';
    $points = $matches[1];

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
            <h2><?= $points?> баллов</h2>
            <?php 
                if($points >= 30) {
                    echo '<h2>Поздравляю с прохождением модуля</h2>';
                } else {
                    echo '<h2>Вам не хватило чуть-чуть баллов, попробуйте ещё раз</h2>';
                    echo '<a href="/lk">Перейти в личный кабинет</a>';
                }
            ?>
        </div>
    </main>
</body>
</html>