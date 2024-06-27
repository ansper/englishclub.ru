<?php
    session_start();
    include 'scripts/php/connect.php';
    $admin = $conn -> query('SELECT * from user where id = '.$_SESSION['user_id'].' and is_admin = 1');
    if(!($admin -> num_rows)) {
        header('Location: /');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="icon" href="../assets/img/favicon.ico">
    <title>Admin</title>
</head>
<body>
    <header>
        <ul>
            <li>
                <a href="?table=Ответы">Ответы</a>
            </li>
            <li>
                <a href="?table=Курсы">Курсы</a>
            </li>
            <li>
                <a href="?table=Регистрация курса">Регистрация курса</a>
            </li>
            <li>
                <a href="?table=Модули">Модули</a>
            </li>
            <li>
                <a href="?table=Новости">Новости</a>
            </li>
            <li>
                <a href="?table=Вопросы">Вопросы</a>
            </li>
            <li>
                <a href="?table=Отзывы">Отзывы</a>
            </li>
            <li>
                <a href="?table=Поддержка">Поддержка</a>
            </li>
            <li>
                <a href="?table=Тесты">Тесты</a>
            </li>
            <li>
                <a href="?table=Теория">Теория</a>
            </li>
            <li>
                <a href="?table=Курсы пользователя">Курсы пользователя</a>
            </li>
            <li>
                <a href="?table=Модули пользователя">Модули пользователя</a>
            </li>
            <li>
                <a href="?table=Слова">Слова</a>
            </li>
        </ul>
        <a class="logout" href="/logout">Выход</a>
    </header>
    <main>
    <h2 class="h2"><?= $_GET['table']?></h2>
        <?php
        
        switch ($_GET['table']) {
            case 'Ответы':
                echo "<a class='add' href='/add?table=Ответы'>Добавить ответы</a>";
                $result = $conn -> query("select * from answer");
                echo "<table><tr><th>ID</th><th>Вопрос</th><th>Текст</th><th>Верный/не верный</th><th>Баллы</th><th>Изменение данных</th></tr>";
                foreach($result as $row){
                    $question = $conn -> query("select * from question where id= ".$row['question_id']) -> fetch_assoc();
                    echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $question['question_text'] . "</td>";
                        echo "<td>" . $row["text"] . "</td>";
                        echo "<td>" . $row["is_correct"] . "</td>";
                        echo "<td>" . $row["points"] . "</td>";
                        echo "<td>
                                <div class='conf'>
                                  <form class='edit' action='scripts/php/editAnswer.php' method='POST'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='text' name='text' id='text' value='" . $row["text"] . "' /><label for='text'> - Текст</label><br>
                                    <input type='text' name='is_correct' id='is_correct' value='" . $row["is_correct"] . "' /><label for='is_correct'> - Верный/не верный</label><br>
                                    <input type='text' name='points' id='points' value='" . $row["points"] . "' /><label for='points'> - Поинты</label><br>
                                    <input type='submit' value='Сохранить настройки'>
                                  </form>                        
                                  <form class='delete' action='scripts/php/delete.php' method='post'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='hidden' name='table' value='answer' />
                                    <input type='submit' value='Удалить'>
                                  </form>
                                </div>
                              </td>";      
                    echo "</tr>";
                }
                echo "</table>";
                break;

            case 'Курсы':
                echo "<a class='add' href='/add?table=Курсы'>Добавить курс</a>";
                $result = $conn -> query("select * from course");
                echo "<table><tr><th>ID</th><th>Название</th><th>Модулей</th><th>Продолжительность</th><th>Цена</th><th>Тип</th><th>Описание</th><th>Тестов</th><th>Уроков</th><th>Изменение данных</th></tr>";
                foreach($result as $row){
                    echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row["modules"] . "</td>";
                        echo "<td>" . $row["duration"] . "</td>";
                        echo "<td>" . $row["price"] . "</td>";
                        echo "<td>" . $row['type'] . "</td>";
                        echo "<td>" . $row["about"] . "</td>";
                        echo "<td>" . $row["tests"] . "</td>";
                        echo "<td>" . $row["lesson"] . "</td>";
                        echo "<td>
                                <div class='conf'>
                                  <form class='edit' action='scripts/php/editCourse.php' method='POST'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='text' name='name' id='name' value='" . $row["name"] . "' /><label for='name'> - Название</label><br>
                                    <input type='text' name='modules' id='modules' value='" . $row["modules"] . "' /><label for='modules'> - Модулей</label><br>
                                    <input type='text' name='duration' id='duration' value='" . $row["duration"] . "' /><label for='duration'> - Продолжительность</label><br>
                                    <input type='text' name='price' id='price' value='" . $row["price"] . "' /><label for='price'> - Цена</label><br>
                                    <input type='text' name='type' id='type' value='" . $row["type"] . "' /><label for='type'> - Тип</label><br>
                                    <input type='text' name='about' id='about' value='" . $row["about"] . "' /><label for='about'> - Тестов</label><br>
                                    <input type='text' name='tests' id='tests' value='" . $row["tests"] . "' /><label for='tests'> - Уроков</label><br>
                                    <input type='text' name='lesson' id='lesson' value='" . $row["lesson"] . "' /><label for='lesson'> - Поинты</label><br>
                                    <input type='submit' value='Сохранить настройки'>
                                  </form>                        
                                  <form class='delete' action='scripts/php/delete.php' method='post'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='hidden' name='table' value='course' />
                                    <input type='submit' value='Удалить'>
                                  </form>
                                </div>
                              </td>";      
                    echo "</tr>";
                }
                echo "</table>";
                break;

            case 'Регистрация курса':
                $result = $conn -> query("select * from courseregistration");
                echo "<table><tr><th>ID</th><th>Имя</th><th>Фамилия</th><th>Отчество</th><th>Почта</th><th>Курс</th><th>Изменение данных</th></tr>";
                foreach($result as $row){
                    $course = $conn -> query("select * from course where id = ".$row['course_id']) -> fetch_assoc();
                    echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["surname"] . "</td>";
                        echo "<td>" . $row["patronymic"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $course['name'] . "</td>";
                        echo "<td>
                                <div class='conf'>                     
                                  <form class='delete' action='scripts/php/delete.php' method='post'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='hidden' name='table' value='courseregistration' />
                                    <input type='submit' value='Удалить'>
                                  </form>
                                </div>
                              </td>";      
                    echo "</tr>";
                }
                echo "</table>";
                break;

            case 'Модули':
                echo "<a class='add' href='/add?table=Модули'>Добавить модуль</a>";
                $result = $conn -> query("select * from module");
                echo "<table><tr><th>ID</th><th>Курс</th><th>Название</th><th>Вопросов</th><th>Баллов</th><th>Изменение данных</th></tr>";
                foreach($result as $row){
                    $course = $conn -> query("select * from course where id = ".$row['course_id']) -> fetch_assoc();
                    echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $course['name'] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["question"] . "</td>";
                        echo "<td>" . $row["points"] . "</td>";
                        echo "<td>
                                <div class='conf'>   
                                   <form class='edit' action='scripts/php/editModule.php' method='POST'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='text' name='name' id='name' value='" . $row["name"] . "' /><label for='name'> - Название</label><br>
                                    <input type='text' name='question' id='question' value='" . $row["question"] . "' /><label for='question'> - Вопросов</label><br>
                                    <input type='text' name='points' id='points' value='" . $row["points"] . "' /><label for='points'> - Баллов</label><br>
                                    <input type='submit' value='Сохранить настройки'>
                                  </form>                        
                                  <form class='delete' action='scripts/php/delete.php' method='post'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='hidden' name='table' value='module' />
                                    <input type='submit' value='Удалить'>
                                  </form>
                                </div>
                              </td>";      
                    echo "</tr>";
                }
                echo "</table>";
                break;

            case 'Новости':
                echo "<a class='add' href='/add?table=Новости'>Добавить новость</a>";
                $result = $conn -> query("select * from news");
                echo "<table><tr><th>ID</th><th>Заголовок</th><th>Дата</th><th>Описание</th><th>Изменение данных</th></tr>";
                foreach($result as $row){
                    echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["title"] . "</td>";
                        echo "<td>" . $row["date"] . "</td>";
                        echo "<td>" . $row["description"] . "</td>";
                        echo "<td>
                                <div class='conf'>   
                                   <form class='edit' action='scripts/php/editNews.php' method='POST'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='text' name='title' id='title' value='" . $row["title"] . "' /><label for='title'> - Заголовок</label><br>
                                    <input type='text' name='date' id='date' value='" . $row["date"] . "' /><label for='date'> - Дата</label><br>
                                    <input type='text' name='description' id='description' value='" . $row["description"] . "' /><label for='description'> - Описание</label><br>
                                    <input type='submit' value='Сохранить настройки'>
                                  </form>                        
                                  <form class='delete' action='scripts/php/delete.php' method='post'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='hidden' name='table' value='news' />
                                    <input type='submit' value='Удалить'>
                                  </form>
                                </div>
                              </td>";      
                    echo "</tr>";
                }
                echo "</table>";
                break;

            case 'Вопросы':
                echo "<a class='add' href='/add?table=Вопросы'>Добавить вопрос</a>";
                $result = $conn -> query("select * from question");
                echo "<table><tr><th>ID</th><th>Описание теста</th><th>Вопрос</th><th>Изменение данных</th></tr>";
                foreach($result as $row){
                    $test = $conn -> query("select * from test where id = ".$row['test_id']) -> fetch_assoc();
                    echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $test["description"] . "</td>";
                        echo "<td>" . $row["question_text"] . "</td>";
                        echo "<td>
                                <div class='conf'>   
                                   <form class='edit' action='scripts/php/editQuestion.php' method='POST'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='text' name='question_text' id='question_text' value='" . $row["question_text"] . "' /><label for='question_text'> - Вопрос</label><br>
                                    <input type='submit' value='Сохранить настройки'>
                                  </form>                        
                                  <form class='delete' action='scripts/php/delete.php' method='post'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='hidden' name='table' value='question' />
                                    <input type='submit' value='Удалить'>
                                  </form>
                                </div>
                              </td>";      
                    echo "</tr>";
                }
                echo "</table>";
                break;

            case 'Отзывы':
                $result = $conn -> query("select * from review");
                echo "<table><tr><th>ID</th><th>Имя</th><th>Оценка</th><th>Отзыв</th><th>Курс</th><th>Изменение данных</th></tr>";
                foreach($result as $row){
                    if($row['course_id'] != NULL) {
                        $course = $conn -> query("select * from course where id = ".$row['course_id']) -> fetch_assoc();
                        $courseName = $course["name"];
                    } else {
                        $courseName = ' ';
                    }
                    echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["mark"] . "</td>";
                        echo "<td>" . $row["description"] . "</td>";
                        echo "<td>" . $courseName . "</td>";
                        echo "<td>
                                <div class='conf'>                         
                                  <form class='delete' action='scripts/php/delete.php' method='post'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='hidden' name='table' value='review' />
                                    <input type='submit' value='Удалить'>
                                  </form>
                                </div>
                              </td>";      
                    echo "</tr>";
                }
                echo "</table>";
                break;

            case 'Поддержка':
                $result = $conn -> query("select * from support");
                echo "<table><tr><th>ID</th><th>Имя</th><th>Почта</th><th>Вопрос</th><th>Изменение данных</th></tr>";
                foreach($result as $row){
                    echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["question"] . "</td>";
                        echo "<td>
                                <div class='conf'>                      
                                  <form class='delete' action='scripts/php/delete.php' method='post'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='hidden' name='table' value='support' />
                                    <input type='submit' value='Удалить'>
                                  </form>
                                </div>
                              </td>";      
                    echo "</tr>";
                }
                echo "</table>";
                break;

            case 'Тесты':
                echo "<a class='add' href='/add?table=Тесты'>Добавить тест</a>";
                $result = $conn -> query("select * from test");
                echo "<table><tr><th>ID</th><th>Описание</th><th>Теория</th><th>Изменение данных</th></tr>";
                foreach($result as $row){
                    $theory = $conn -> query("select * from theory where id = ".$row['theory_id']) -> fetch_assoc();
                    echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["description"] . "</td>";
                        echo "<td>" . $theory["description"] . "</td>";
                        echo "<td>
                                <div class='conf'>   
                                   <form class='edit' action='scripts/php/editTest.php' method='POST'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='text' name='description' id='description' value='" . $row["description"] . "' /><label for='description'> - Описание</label><br>
                                    <input type='submit' value='Сохранить настройки'>
                                  </form>                        
                                  <form class='delete' action='scripts/php/delete.php' method='post'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='hidden' name='table' value='test' />
                                    <input type='submit' value='Удалить'>
                                  </form>
                                </div>
                              </td>";      
                    echo "</tr>";
                }
                echo "</table>";
                break;

            case 'Теория':
                echo "<a class='add' href='/add?table=Теория'>Добавить теорию</a>";
                $result = $conn -> query("select * from theory");
                echo "<table><tr><th>ID</th><th>Модуль</th><th>Описание</th><th>Теория</th><th>Изменение данных</th></tr>";
                foreach($result as $row){
                    $module = $conn -> query("select * from module where id = ".$row['module_id']) -> fetch_assoc();
                    echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $module["name"] . "</td>";
                        echo "<td>" . $row["description"] . "</td>";
                        echo "<td>" . $row["text"] . "</td>";
                        echo "<td>
                                <div class='conf'>   
                                   <form class='edit' action='scripts/php/editTheory.php' method='POST'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='text' name='description' id='description' value='" . $row["description"] . "' /><label for='description'> - Описание</label><br>
                                    <input type='text' name='text' id='text' value='" . $row["text"] . "' /><label for='text'> - Текст</label><br>
                                    <input type='submit' value='Сохранить настройки'>
                                  </form>                        
                                  <form class='delete' action='scripts/php/delete.php' method='post'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='hidden' name='table' value='theory' />
                                    <input type='submit' value='Удалить'>
                                  </form>
                                </div>
                              </td>";      
                    echo "</tr>";
                }
                echo "</table>";
                break;

            case 'Курсы пользователя':
                $result = $conn -> query("select * from usercourse");
                echo "<table><tr><th>ID</th><th>Пользователь</th><th>Курс</th><th>Изменение данных</th></tr>";
                foreach($result as $row){
                    $user = $conn -> query("select * from user where id = ".$row['user_id']) -> fetch_assoc();
                    $course = $conn -> query("select * from course where id = ".$row['course_id']) -> fetch_assoc();
                    echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $user["name"] . "</td>";
                        echo "<td>" . $course["name"] . "</td>";
                        echo "<td>
                                <div class='conf'>                      
                                  <form class='delete' action='scripts/php/delete.php' method='post'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='hidden' name='table' value='usercourse' />
                                    <input type='submit' value='Удалить'>
                                  </form>
                                </div>
                              </td>";      
                    echo "</tr>";
                }
                echo "</table>";
                break;

            case 'Модули пользователя':
                $result = $conn -> query("select * from usermodule");
                echo "<table><tr><th>ID</th><th>Пользователь</th><th>Модуль</th><th>Статус</th><th>Изменение данных</th></tr>";
                foreach($result as $row){
                    $user = $conn -> query("select * from user where id = ".$row['user_id']) -> fetch_assoc();
                    $module = $conn -> query("select * from module where id = ".$row['module_id']) -> fetch_assoc();
                    if($row['isCompleted']) {
                        $compl = 'Завершен';
                    } else {
                        $compl = 'В процессе';
                    }
                    echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $user["name"] . "</td>";
                        echo "<td>" . $module["name"] . "</td>";
                        echo "<td>" . $compl . "</td>";
                        echo "<td>
                                <div class='conf'>                      
                                  <form class='delete' action='scripts/php/delete.php' method='post'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='hidden' name='table' value='usermodule' />
                                    <input type='submit' value='Удалить'>
                                  </form>
                                </div>
                              </td>";      
                    echo "</tr>";
                }
                echo "</table>";
                break;

            case 'Слова':
                echo "<a class='add' href='/add?table=Слова'>Добавить слово</a>";
                $result = $conn -> query("select * from word");
                echo "<table><tr><th>ID</th><th>Теория</th><th>Слово на английском</th><th>Слово на русском</th><th>Изменение данных</th></tr>";
                foreach($result as $row){
                    $theory = $conn -> query("select * from theory where id = ".$row['theory_id']) -> fetch_assoc();
                    echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $theory["description"] . "</td>";
                        echo "<td>" . $row["word_english"] . "</td>";
                        echo "<td>" . $row["word_russia"] . "</td>";
                        echo "<td>
                                <div class='conf'>                      
                                  <form class='delete' action='scripts/php/delete.php' method='post'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                                    <input type='hidden' name='table' value='word' />
                                    <input type='submit' value='Удалить'>
                                  </form>
                                </div>
                              </td>";      
                    echo "</tr>";
                }
                echo "</table>";
                break;
            }
        ?>
    </main>
</body>
</html>