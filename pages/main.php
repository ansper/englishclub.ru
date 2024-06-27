<?php
    include 'scripts/php/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="icon" href="../assets/img/favicon.ico">
    <title>EnglishClub.ru</title>
</head>
<body>
    <?php include 'components/header.php';?>
    <main class="_container">
        <?php include 'components/navigation.php';?>
        <div class="main">
            <section class="intro">
                <img src="../assets/img/main/intro.png" alt="intro">
                <h2>Платформа для изучения иностранных языков и IT</h2>
                <p>Учите английский с увлечением и азартом — каждый ваш шаг к цели вознаграждается! Присоединяйтесь к 'Английскому клубу' и откройте для себя мир знаний и новых возможностей!</p>
                <a href="/catalog">Каталог курсов</a>
            </section>
            <section class="courses">
                <div class="courses__header">
                    <h2>Курсы иностранных языков и IT для любого уровня</h2>
                    <a href="/catalog" class="main__all">Все курсы</a>
                </div>
                <div class="courses__body">
                    <?php
                        $courseResult = $conn -> query('SELECT * from course ORDER BY id ASC LIMIT 2');
                        while($row = $courseResult -> fetch_assoc()) {
                    ?>
                    <div class="course__block" style="background: #DEF1FF;">
                        <h3><?= $row['name']?></h3>
                        <span>Длительность: <b><?= $row['duration']?> часов</b></span>
                        <span>Модулей: <b><?= $row['modules']?></b></span>
                        <div class="course__block__bottom">
                            <a href="/course/<?= $row['id']?>">Узнать подробнее &rarr;</a>
                            <span><b>От <?= $row['price']?> Р</b></span>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </section>
            <section class="reviews">
                <div class="reviews__header">
                    <h2>Что говорят о нас ученики?</h2>
                    <a href="/reviews" class="main__all">Все отзывы</a>
                </div>
                <div class="reviews__body">
                    <img src="../assets/img/main/review.png" alt="review">
                    <div class="reviews__body__text">
                        <h3>Последний отзыв</h3>
                        <div class="reviews__block">
                            <div class="reviews__block__header">
                                <?php 
                                    $result = $conn -> query('SELECT * from review ORDER BY id DESC LIMIT 1') -> fetch_assoc();
                                ?>
                                <span><?= $result['name']?></span>
                                <div class="mark">
                                    <?php
                                        for ($mark=0; $mark < $result['mark']; $mark++) { 
                                            echo '&#9733;';
                                        }
                                    ?>
                                </div>
                            </div>
                            <p><?= $result['description']?></p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="reg">
                <div class="reg__text">
                    <h2>Регистрируйтесь и приступайте к первому бесплатному уроку</h2>
                    <a href="/auth">Начать обучение</a>
                </div>
                <img src="../assets/img/main/reg.png" alt="reg">
            </section>
            <section class="news">
                <div class="news__header">
                    <h2>Полезные новости и статьи</h2>
                    <a href="/news" class="main__all">Все новости</a>
                </div>
                <div class="news__body">
                    <?php 
                        $newsResult = $conn -> query('SELECT * from news ORDER BY id DESC LIMIT 3');
                        while($row = $newsResult -> fetch_assoc()) {
                    ?>
                    <div class="news__block">
                        <h3><?= $row['title']?></h3>
                        <span><?= $row['date']?></span>
                        <p><?= $row['description']?></p>
                        <div class="news__block__bottom">
                            <a href="">Новость</a>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </section>
        </div>
    </main>
    <?php include 'components/footer.php';?>
</body>
</html>
