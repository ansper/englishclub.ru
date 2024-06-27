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
    <link rel="stylesheet" href="../assets/css/reviews.css">
    <link rel="icon" href="../assets/img/favicon.ico">
    <title>EnglishClub.ru</title>
</head>
<body>
    <?php include 'components/header.php';?>
    <main class="_container">
        <?php include 'components/navigation.php';?>
        <div class="main">
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h3>Написать отзыв</h3>
                    <form id="feedbackForm" method="POST" action="scripts/php/addReview.php">
                        <label for="name">Имя</label><br>
                        <input type="text" id="name" name="name" required><br>
                        <label for="rating">Оценка</label>
                        <div id="rating">
                            <input type="radio" id="star5" name="rating" value="5" required/><label for="star5"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                        </div><br>
                        <label for="review">Отзыв</label><br>
                        <textarea id="review" name="review" required></textarea><br>
                        <div class="submit">
                            <input type="submit" value="Отправить">
                        </div>
                    </form>
                </div>
            </div>
            <section class="reviews__header">
                <h2>Отзывы о платформе</h2>
                <button id="openModalBtn">Написать отзыв</button>
            </section>
            <?php 
                $result = $conn -> query("select * from review where course_id IS NULL");
                if($result -> num_rows > 0) {
                    while($row = $result -> fetch_assoc()) {
            ?>
            <div class="reviews__block">
                <div class="reviews__block__header">
                    <span><?= $row['name']?></span>
                    <div class="mark">
                        <?php
                            for ($mark=0; $mark < $row['mark']; $mark++) { 
                                echo '&#9733;';
                            }
                        ?>
                    </div>
                </div>
                <p><?= $row['description']?></p>
            </div>
            <?php } }?>
        </div>
    </main>
    <?php include 'components/footer.php';?>
    <script src="../scripts/js/reviewsModal.js"></script>
</body>
</html>