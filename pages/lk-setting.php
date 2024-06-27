<?php 
    session_start();
    if (!$_SESSION['login_status']) {
        header('Location: /auth');
    }   
    include 'scripts/php/connect.php';
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
                <label for="name">Email</label><br>
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
                <li>
                    <a href="/lk"><img src="../assets/img/lk/home.svg" alt="main"> Главная</a>
                </li>
                <li class="active">
                    <a href="/setting"><img src="../assets/img/lk/setting-active.svg" alt="setting"> Настройки аккаунта</a>
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
            <?php 
                $result = $conn -> query('SELECT * from user where id =' . $_SESSION['user_id']) -> fetch_assoc();
            ?>
            <form action="scripts/php/saveSetting.php" method="POST" class="setting">
                <div class="setting__fields">
                    <h2>Настройки аккаунта</h2>
                    <label for="surname">
                        <span>Изменить фамилию </span>
                        <input id="surname" name="surname" value="<?= $result['surname']?>" type="text">
                    </label>
                    <label for="name">
                        <span>Изменить имя</span> 
                        <input id="name" name="name" value="<?= $result['name']?>" type="text">
                    </label>
                    <label for="patronymic">
                        <span>Изменить отчество</span>
                        <input id="patronymic" name="patronymic" value="<?= $result['patronymic']?>" type="text">
                    </label>
                    <label for="birthday">
                        <span>Изменить дату рождения</span>
                        <input id="birthday" name="birthday" value="<?= $result['birthday']?>" type="date">
                    </label>
                    <label for="email">
                        <span>Изменить почту</span>
                        <input id="email" name="email" value="<?= $result['email']?>" type="text">
                    </label>
                    <input type="submit" value="Сохранить">
                </div>
            </form>
        </section>
    </main>
    <script src="../scripts/js/reviewsModal.js"></script>
</body>
</html>