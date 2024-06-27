<?php include 'scripts/php/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="../assets/img/favicon.ico">
    <title>Add</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .addphp {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .addphp span {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .addphp div {
            margin-bottom: 10px;
        }

        .addphp label {
            font-size: 14px;
            color: #666;
        }

        .addphp select,
        .addphp input[type='text'] {
            width: calc(100% - 10px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            margin-top: 5px;
        }

        .addphp input[type='submit'] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .addphp input[type='submit']:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
        switch ($_GET['table']) {
            case 'Ответы':
                ?>
                <form class='addphp' action='scripts/php/addAnswer.php' method='POST'>
                    <span>Вопрос</span>
                    <div>
                        <select name="question" id="question">
                            <?php
                                $result = $conn -> query("select * from question");
                                foreach($result as $row){
                            ?>
                            <option value="<?= $row['id']?>"><?= $row['question_text']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <span>Ответ</span>
                    <div>
                        <input type='text' name='text' id='text'/><br>
                    </div>
                    <span>Верный/не верный</span>
                    <div>
                        <select name="is_correct">
                            <option value="1">Верный</option>
                            <option value="0">Не верный</option>
                        </select>
                    </div>
                    <span>Баллы</span>
                    <div>
                        <input type='text' name='points' id='points'/><br>
                    </div>
                    <input type='submit' value='Добавить'>
                </form>
                <?php
                break;
            
            case 'Курсы':
                ?>
                <form class='addphp' action='scripts/php/addCourse.php' method='POST'>
                    <span>Название</span>
                    <div>
                        <input type='text' name='name' id='name'/><br>
                    </div>
                    <span>Модули</span>
                    <div>
                        <input type='text' name='modules' id='modules'/><br>
                    </div>
                    <span>Продолжительность</span>
                    <div>
                        <input type='text' name='duration' id='duration'/><br>
                    </div>
                    <span>Цена</span>
                    <div>
                        <input type='text' name='price' id='price'/><br>
                    </div>
                    <span>Тип</span>
                    <div>
                        <select name="type" id="type">
                            <option value="english">Английский</option>
                            <option value="it">IT</option>
                        </select>
                    </div>
                    <span>Описание</span>
                    <div>
                        <input type='text' name='about' id='about'/><br>
                    </div>
                    <span>Тестов</span>
                    <div>
                        <input type='text' name='tests' id='tests'/><br>
                    </div>
                    <span>Уроки</span>
                    <div>
                        <input type='text' name='lesson' id='lesson'/><br>
                    </div>
                    <input type='submit' value='Добавить'>
                </form>
                <?php
                break;

            case 'Модули':
                ?>
                <form class='addphp' action='scripts/php/addModule.php' method='POST'>
                    <span>Курс</span>
                    <div>
                        <select name="course_id" id="course_id">
                            <?php
                                $result = $conn -> query("select * from course");
                                foreach($result as $row){
                            ?>
                            <option value="<?= $row['id']?>"><?= $row['name']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <span>Название</span>
                    <div>
                        <input type='text' name='name' id='name'/><br>
                    </div>
                    <span>Вопросов</span>
                    <div>
                        <input type='text' name='question' id='question'/><br>
                    </div>
                    <span>Баллов</span>
                    <div>
                        <input type='text' name='points' id='points'/><br>
                    </div>
                    <input type='submit' value='Добавить'>
                </form>
                <?php
                break;

            case 'Новости':
                ?>
                <form class='addphp' action='scripts/php/addNews.php' method='POST'>
                    <span>Заголовок</span>
                    <div>
                        <input type='text' name='title' id='title'/><br>
                    </div>
                    <span>Дата</span>
                    <div>
                        <input type='date' name='date' id='date'/><br>
                    </div>
                    <span>Описание</span>
                    <div>
                        <input type='text' name='description' id='description'/><br>
                    </div>
                    <input type='submit' value='Добавить'>
                </form>
                <?php
                break;

            case 'Вопросы':
                ?>
                <form class='addphp' action='scripts/php/addQuestion.php' method='POST'>
                    <span>Тест</span>
                    <div>
                        <select name="test_id" id="test_id">
                            <?php
                                $result = $conn -> query("select * from test");
                                foreach($result as $row){
                            ?>
                            <option value="<?= $row['id']?>"><?= $row['description']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <span>Текст</span>
                    <div>
                        <input type='text' name='question_text' id='question_text'/><br>
                    </div>
                    <input type='submit' value='Добавить'>
                </form>
                <?php
                break;

            case 'Тесты':
                ?>
                <form class='addphp' action='scripts/php/addTest.php' method='POST'>
                    <span>Описание</span>
                    <div>
                        <input type='text' name='description' id='description'/><br>
                    </div>
                    <span>Теория</span>
                    <div>
                        <select name="theory_id" id="theory_id">
                            <?php
                                $result = $conn -> query("select * from theory");
                                foreach($result as $row){
                            ?>
                            <option value="<?= $row['id']?>"><?= $row['description']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <input type='submit' value='Добавить'>
                </form>
                <?php
                break;

            case 'Теория':
                ?>
                <form class='addphp' action='scripts/php/addTheory.php' method='POST'>
                    <span>Модуль</span>
                    <div>
                        <select name="module_id" id="module_id">
                            <?php
                                $result = $conn -> query("select * from module");
                                foreach($result as $row){
                            ?>
                            <option value="<?= $row['id']?>"><?= $row['name']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <span>Описание</span>
                    <div>
                        <input type='text' name='description' id='description'/><br>
                    </div>
                    <span>Теория</span>
                    <div>
                        <textarea name='text' id='text'></textarea><br>
                    </div>
                    <input type='submit' value='Добавить'>
                </form>
                <?php
                break;

            case 'Слова':
                ?>
                <form class='addphp' action='scripts/php/addWord.php' method='POST'>
                    <span>Теория</span>
                    <div>
                        <select name="theory_id" id="theory_id">
                            <?php
                                $result = $conn -> query("select * from theory");
                                foreach($result as $row){
                            ?>
                            <option value="<?= $row['id']?>"><?= $row['description']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <span>Слово на английском</span>
                    <div>
                        <input type='text' name='word_english' id='word_english'/><br>
                    </div>
                    <span>Слово на русском</span>
                    <div>
                        <input type='text' name='word_russia' id='word_russia'/><br>
                    </div>
                    <input type='submit' value='Добавить'>
                </form>
                <?php
                break;
        }
    ?>    
</body>
</html>