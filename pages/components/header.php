<?php
    session_start();
?>
<header>
    <div class="header__container _container">
        <h1><a href="/">ООО “Английский клуб”</a></h1>
        <ul>
            <li>
                <img src="../assets/img/header/map.png" alt="map">
                <span>Сургут, ул. 30 лет Победы, 44/3</span>
            </li>
            <li>
                <img src="../assets/img/header/phone.png" alt="phone">
                <span>8 (800) 350-53-74</span>
            </li>
            <li>
                <img src="../assets/img/header/mail.png" alt="mail">
                <span>712517@mail.ru</span>
            </li>
        </ul>
        <?php 
            if($_SESSION['login_status']) {
                echo '<a href="/lk" class="lk-reg">Личный кабинет</a>';
            } else {
                echo '<a href="/auth" class="lk-reg">Авторизоваться</a>';
            }
        ?>
    </div>
</header>