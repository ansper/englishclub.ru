<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/auth.css">
    <link rel="icon" href="../assets/img/favicon.ico">
    <title>EnglishClub.ru</title>
</head>
<body>
    <?php include 'components/header.php';?>
    <main>
        <h2>Вход в кабинет</h2>
        <form action="authPHP" method="POST">
            <label for="email">
                Электронная почта
                <input name="email" type="email" placeholder="Ваша электронная почта" required>
            </label>
            <label for="password">
                Пароль
                <input name="password" type="password" placeholder="Ваш пароль" required>
            </label>
            <input type="submit" value="Продолжить">
        </form>
        <span class="swap">Ещё нет аккаунта? <a href="/register">Зарегистрировать</a></span>
    </main>
    <?php include 'components/footer.php';?>
</body>
</html>