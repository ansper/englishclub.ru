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
    <link rel="stylesheet" href="../assets/css/news.css">
    <link rel="icon" href="../assets/img/favicon.ico">
    <title>EnglishClub.ru</title>
</head>
<body>
    <?php include 'components/header.php';?>
    <main class="_container">
        <?php include 'components/navigation.php';?>
        <div class="main">
            <section class="news">
                <h2>Новости</h2>
                <?php 
                    $newsResult = $conn -> query('SELECT * from news ORDER BY id DESC');
                    while($row = $newsResult -> fetch_assoc()) {
                ?>
                <div class="news__block">
                    <h3><?= $row['title']?></h3>
                    <span><?= $row['date']?></span>
                    <p><?= $row['description']?></p>
                    <div style="align-items: end; text-align: right;">
                        <a href="/news/<?= $row['id']?>">Новость</a>
                    </div>
                </div>
                <?php }?>
            </section>
        </div>
    </main>
    <?php include 'components/footer.php';?>
</body>
</html>