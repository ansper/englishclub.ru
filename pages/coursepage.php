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
    <link rel="stylesheet" href="../assets/css/couresepage.css">
    <link rel="icon" href="../assets/img/favicon.ico">
    <title>EnglishClub.ru</title>
</head>
<body>
    <?php include 'components/header.php';?>
    <main class="_container">
        <?php include 'components/navigation.php';?>
        <div class="main">
            <div class="main__container">
                <?php
                    $result = $conn -> query('SELECT * from course where id = '.$id) -> fetch_assoc();
                ?>
                <section class="content">
                    <h2><?= $result['name']?></h2>
                    <h3>О курсе</h3>
                    <p><?= $result['about']?></p>
                    <h3>Программа курса</h3>
                    <?php
                        $modules = $conn -> query('SELECT * from module where course_id = '.$id);
                        $moduleId = 1;
                        while($row = $modules -> fetch_assoc()) {
                    ?>
                    <div class="module">
                        <h4><span>Модуль <?= $moduleId?>:</span> <?= $row['name']?></h4>
                        <span><?= $row['question']?> уроков / <?= $row['points']?> баллов</span>
                    </div>
                    <?php 
                        $moduleId = $moduleId + 1;
                    }
                    ?>
                </section>
                <div class="right__side">
                    <div class="signup">
                        <span class="price">От <?= $result['price']?> Р</span>
                        <span><b><?= $result['lesson']?></b> Уроков</span>
                        <span><b><?= $result['tests']?></b> Тестов</span>
                        <button id="openModalBtnSignUp">Записаться на курс</button>
                    </div>
                    <div class="leaderboard">
                        <h3>Лучшие ученики</h3>
                        <?php 
                            $userResult = $conn -> query('SELECT * from user ORDER BY ' . $result['type'] . '_points DESC LIMIT 3');
                            if($userResult -> num_rows > 0) {
                                $place = 1;
                                while($userRow = $userResult -> fetch_assoc()) {
                        ?>
                        <div class="people">
                            <div>
                                <div class="num"><?= $place?></div>
                                <?php $place = $place + 1;?>
                                <span class="name"><?= $userRow['name']?> <?= $userRow['surname']?></span>
                            </div>
                            <span class="score"><?php
                                if($userRow[$result['type'].'_points'] == NULL) {
                                    echo 0;
                                } else {
                                    echo $userRow[$result['type'].'_points'];
                                }
                                
                            ?> баллов</span>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
            </div>
            <section class="reviews__header">
                <h2>Отзывы о курсе</h2>
                <button id="openModalBtn">Написать отзыв</button>
            </section>
            <?php 
                $reviewResult = $conn -> query('SELECT * from review where course_id = '.$id);
                if($reviewResult -> num_rows > 0) {
                    while($reviewRow = $reviewResult -> fetch_assoc()) {
            ?>
            <div class="reviews__block">
                <div class="reviews__block__header">
                    <span><?= $reviewRow['name']?></span>
                    <div class="mark">
                        <?php
                            for ($mark=0; $mark < $reviewRow['mark']; $mark++) { 
                                echo '&#9733;';
                            }
                        ?>
                    </div>
                </div>
                <p><?= $reviewRow['description']?></p>
            </div>
            <?php 
            }
            } else {
                echo '<h5>Отзывов пока нет, но ты можешь первым написать его!</h5>';
            }
            ?>
        </div>
    </main>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Написать отзыв</h3>
            <form id="feedbackForm" action='../scripts/php/addReview.php' method="POST">
                <label for="name" class="label">Имя</label><br>
                <input type="text" class="input" id="name" name="name" required><br>
                <label for="rating" class="label">Оценка</label>
                <div id="rating">
                    <input type="radio" id="star5" name="rating" value="5" required/><label for="star5"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                </div><br>
                <label for="review">Отзыв</label><br>
                <textarea id="review" name="review" required></textarea><br>
                <input type="hidden" name="courseId" value="<?= $id?>">
                <div class="submit">
                    <input type="submit" value="Отправить">
                </div>
            </form>
        </div>
    </div>
    <div id="myModalSignUp" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Записаться на курс</h3>
            <form id="feedbackFormSignUp" action="../scripts/php/addCourseRegistration.php" method="POST">
                <label for="fullName" class="label">ФИО</label><br>
                <input type="text" class="input" id="fullName" name="fullName" placeholder="Ваше ФИО" required><br>
                <label for="email" class="label">Электронная почта</label><br>
                <input type="text" class="input" id="email" name="email" placeholder="Ваша электронная почта" required><br>
                <input type="hidden" name="courseId" value="<?= $id?>">
                <div class="submit">
                    <input type="submit" value="Отправить">
                </div>
            </form>
        </div>
    </div>
    <?php include 'components/footer.php';?>
    <script src="../scripts/js/reviewsModal.js"></script>
    <script src="../scripts/js/signUpModal.js"></script>
</body>
</html>