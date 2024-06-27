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
    <link rel="stylesheet" href="../assets/css/catalog.css">
    <link rel="icon" href="../assets/img/favicon.ico">
    <title>EnglishClub.ru</title>
</head>
<body>
    <?php include 'components/header.php';?>
    <main class="_container">
        <?php include 'components/navigation.php';?>
        <section class="main">
            <h2>Курсы</h2>
            <div class="top__filter">
                <button class="filter-button filter-button-active" data-filter="all">Все</button>
                <button class="filter-button" data-filter="english">Английский</button>
                <button class="filter-button" data-filter="it">IT</button>
            </div>
            <div class="catalog">
                <?php
                    $result = $conn -> query('SELECT * from course');
                        while($row = $result -> fetch_assoc()) {
                ?>
                <div class="catalog__block <?= $row['type']?>" style="background: #DEF1FF;">
                    <h3><?= $row['name']?></h3>
                    <span>Длительность: <b><?= $row['duration']?> часов</b></span>
                    <span>Модулей: <b><?= $row['modules']?></b></span>
                    <div class="catalog__block__bottom">
                        <a href="/course/<?= $row['id']?>">Узнать подробнее &rarr;</a>
                        <span><b>От <?= $row['price']?> Р</b></span>
                    </div>
                </div>
                <?php }?>
            </div>
        </section>
    </main>

    <?php include 'components/footer.php';?>
</body>
    <script src="../scripts/js/catalogFilter.js"></script>
</html>