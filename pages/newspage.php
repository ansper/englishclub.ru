<?php
    include 'scripts/php/connect.php';
    // id новости
    $id = $matches[1];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/newspage.css">
    <link rel="icon" href="../assets/img/favicon.ico">
    <title>EnglishClub.ru</title>
</head>
<body>
    <?php include 'components/header.php';?>
    <main class="_container">
        <?php include 'components/navigation.php';?>
        <div class="main">
            <?php 
                $result = $conn -> query('SELECT * from news where id =' . $id) -> fetch_assoc();
            ?>
            <section class="newspage">
                <h2><?= $result['title']?></h2>
                <span><?= $result['date']?></span>
                <p><?= $result['description']?></p>
            </section>
            <img src="../assets/img/newspage.png" alt="news">
        </div>
    </main>
    <?php include 'components/footer.php';?>
</body>
</html>