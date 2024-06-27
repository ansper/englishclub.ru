<?php 
    session_start();
    if (!$_SESSION['login_status']) {
        header('Location: /auth');
    }
    include 'scripts/php/connect.php';
    $result = $conn -> query('SELECT it_points, english_points from user where id =' . $_SESSION['user_id']) -> fetch_assoc();
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/lk.css">
    <link rel="icon" href="../assets/img/favicon.ico">
    <title>EnglishClub.ru</title>
</head>
<body>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Ваше обращение</h3>
            <form id="feedbackForm" method="POST" action="scripts/php/addSupport.php">
                <label for="name">Имя</label><br>
                <input type="text" id="name" name="name" required><br>
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" required><br>
                <label for="review">Ваш вопрос</label><br>
                <textarea id="review" name="review" required></textarea><br>
                <div class="submit">
                    <input type="submit" value="Отправить">
                </div>
            </form>
        </div>
    </div>
    <main class="_container">
        <nav>
            <a href="/"><img src="../assets/img/logo.png" alt="logo"></a>
            <ul>
                <li class="active">
                    <a href="/lk"><img src="../assets/img/lk/home-active.svg" alt="main"> Главная</a>
                </li>
                <li>
                    <a href="/setting"><img src="../assets/img/lk/setting.svg" alt="setting"> Настройки аккаунта</a>
                </li>
                <li>
                    <a id="openModalBtn"><img src="../assets/img/lk/phone.svg" alt="support"> Поддержка</a>
                </li>
                <li>
                    <a href="/logout"><img src="../assets/img/lk/logout.svg" alt="logout"> Выход</a>
                </li>
            </ul>
        </nav>
        <section class="main">
            <h1>Здравствуйте <?= $_SESSION['user_name']?>!</h1>
            <div class="your__score">
                <div class="it__english">
                    <h2>Ваши баллы за IT: 
                    <?php
                        if($result['it_points'] == NULL) {
                            echo '0';
                        } else {
                            echo $result['it_points'];
                        }
                    ?>
                    </h2>
                    <div class="leaderboard">
                        <h3>Лучшие ученики в IT</h3>
                        <?php 
                            $userResultIt = $conn -> query('SELECT * from user ORDER BY it_points DESC LIMIT 3');
                            if($userResultIt -> num_rows > 0) {
                                $place = 1;
                                while($userRowId = $userResultIt -> fetch_assoc()) {
                        ?>
                        <div class="people">
                            <div>
                                <div class="num"><?= $place?></div>
                                <?php $place = $place + 1;?>
                                <span class="name"><?= $userRowId['name']?> <?= $userRowId['surname']?></span>
                            </div>
                            <span class="score"><?php
                                if($userRowId['it_points'] == NULL) {
                                    echo 0;
                                } else {
                                    echo $userRowId['it_points'];
                                }
                                
                            ?> баллов</span>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
                <div class="it__english">
                    <h2>Ваши баллы за английский: 
                    <?php
                        if($result['english_points'] == NULL) {
                            echo '0';
                        } else {
                            echo $result['english_points'];
                        }
                    ?>
                    </h2>
                    <div class="leaderboard">
                        <h3>Лучшие ученики в английском</h3>
                        <?php 
                            $userResultEnglish = $conn -> query('SELECT * from user ORDER BY english_points DESC LIMIT 3');
                            if($userResultEnglish -> num_rows > 0) {
                                $place = 1;
                                while($userRowEnglish = $userResultEnglish -> fetch_assoc()) {
                        ?>
                        <div class="people">
                            <div>
                                <div class="num"><?= $place?></div>
                                <?php $place = $place + 1;?>
                                <span class="name"><?= $userRowEnglish['name']?> <?= $userRowEnglish['surname']?></span>
                            </div>
                            <span class="score"><?php
                                if($userRowEnglish['english_points'] == NULL) {
                                    echo 0;
                                } else {
                                    echo $userRowEnglish['english_points'];
                                }
                                
                            ?> баллов</span>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
            </div>
            <div class="your__course">
                <h3>Ваши курсы</h3>
                <div class="courses__body">
                <?php
                    $userCourseResult = $conn -> query('SELECT * from usercourse where user_id = ' . $_SESSION['user_id']);
                    if ($userCourseResult -> num_rows > 0) {
                        while($userCourseRow = $userCourseResult -> fetch_assoc()) {                
                            $courseResult = $conn -> query('SELECT * from course where id = ' . $userCourseRow['course_id']);
                            while($courseRow = $courseResult -> fetch_assoc()) {
                ?>
                    <div class="course__block" style="background: #FDEDE4;">
                        <h3><?= $courseRow['name']?></h3>
                        <span>Длительность: <b><?= $courseRow['duration']?> часов</b></span>
                        <span>Модулей: <b><?= $courseRow['modules']?></b></span>
                        <div class="course__block__bottom">
                            <a href="/learn/<?= $courseRow['id']?>">Обучение</a>
                        </div>
                    </div>
                <?php
                    } } } else { echo '<span>у вас еще нет оплаченных курсов</span>'; }
                ?>
                </div>
                
            </div>
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
        </section>
    </main>
    <script src="../scripts/js/reviewsModal.js"></script>
</body>
</html>