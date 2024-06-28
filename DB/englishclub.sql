-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3325
-- Время создания: Июн 19 2024 г., 21:22
-- Версия сервера: 10.6.7-MariaDB-log
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `englishclub`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `answer`
--

INSERT INTO `answer` (`id`, `question_id`, `text`, `is_correct`, `points`) VALUES
(1, 1, 'Hello', 0, 0),
(2, 1, 'Good morning', 1, 5),
(3, 1, 'Goodbye', 0, 0),
(4, 1, 'Thank you', 0, 0),
(5, 2, 'Yes', 0, 0),
(6, 2, 'What\'s your name?', 0, 0),
(7, 2, 'I\'m fine, thank you', 1, 5),
(8, 2, 'Sorry', 0, 0),
(9, 3, 'Sorry', 0, 0),
(10, 3, 'Thank you', 1, 5),
(11, 3, 'Goodbye', 0, 0),
(12, 3, 'Please', 0, 0),
(13, 4, 'Sorry', 1, 5),
(14, 4, 'Yes', 0, 0),
(15, 4, 'Good morning', 0, 0),
(16, 4, 'Okay', 0, 0),
(17, 5, 'My name is', 1, 5),
(18, 5, 'You\'re welcome', 0, 0),
(19, 5, 'Excuse me', 0, 0),
(20, 5, 'I\'m fine, thank you', 0, 0),
(21, 6, 'Sorry', 0, 0),
(22, 6, 'Maybe', 0, 0),
(23, 6, 'Okay', 1, 5),
(24, 6, 'Good evening', 0, 0),
(25, 7, 'Thank you', 0, 0),
(26, 7, 'Goodbye', 0, 0),
(27, 7, 'Alloha', 0, 0),
(28, 7, 'Hello', 1, 5),
(29, 8, 'Please', 0, 0),
(30, 8, 'Excuse me', 1, 5),
(31, 8, 'Good morning', 0, 0),
(32, 8, 'Sure', 0, 0),
(33, 9, 'Excuse me', 0, 0),
(34, 9, 'Thank you', 0, 0),
(35, 9, 'Goodbye', 1, 5),
(36, 9, 'Please', 0, 0),
(37, 10, 'What\'s your name?', 0, 0),
(38, 10, 'You\'re welcome', 1, 5),
(39, 10, 'Maybe', 0, 0),
(40, 10, 'I\'m sorry', 0, 0),
(42, 12, 'Программированный язык для создания веб-сайтов.', 0, 0),
(43, 12, 'Язык разметки для создания структуры веб-страниц.', 1, 5),
(44, 12, 'Язык стилей для оформления веб-страниц.', 0, 0),
(45, 13, '`header`', 0, 0),
(46, 13, '`h1`', 1, 5),
(47, 13, '`head`', 0, 0),
(48, 14, '`link`', 0, 0),
(49, 14, '`a`', 1, 5),
(50, 14, '`href`', 0, 0),
(51, 15, '`class`', 1, 5),
(52, 15, '`id`', 0, 0),
(53, 15, '`style`', 0, 0),
(54, 16, 'ul', 0, 0),
(55, 16, 'ol', 1, 5),
(56, 16, 'li', 0, 0),
(57, 17, '`img`', 1, 5),
(58, 17, '`picture`', 0, 0),
(59, 17, '`src`', 0, 0),
(60, 18, '`table`', 1, 5),
(61, 18, '`tr`', 0, 0),
(62, 18, '`td`', 0, 0),
(63, 19, '`paragraph`', 0, 0),
(64, 19, '`p`', 1, 5),
(65, 19, '`text`', 0, 0),
(66, 20, '`end`', 0, 0),
(67, 20, '`/close`', 0, 0),
(68, 20, '`/tag`', 1, 5),
(69, 21, 'target', 0, 0),
(70, 21, 'href', 1, 5),
(71, 21, 'link', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modules` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tests` int(11) NOT NULL,
  `lesson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `course`
--

INSERT INTO `course` (`id`, `name`, `modules`, `duration`, `price`, `type`, `about`, `tests`, `lesson`) VALUES
(1, 'Английский для начинающих', 5, 45, 5000, 'english', 'Курс \"Английский для начинающих\" предназначен для тех, кто только начинает изучать английский язык и хочет освоить его базовые аспекты. В рамках курса вы познакомитесь с основами английской грамматики, основным лексическим запасом и базовыми разговорными оборотами, необходимыми для повседневного общения.', 9, 40),
(2, 'HTML для начинающих', 3, 45, 5000, 'it', 'Хотите научиться создавать свои веб-страницы с нуля? Курс HTML для начинающих идеально подходит для всех, кто хочет освоить основы веб-разработки и создания контента для интернета.', 9, 40);

-- --------------------------------------------------------

--
-- Структура таблицы `courseregistration`
--

CREATE TABLE `courseregistration` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `courseregistration`
--

INSERT INTO `courseregistration` (`id`, `name`, `surname`, `patronymic`, `email`, `course_id`) VALUES
(2, 'Андрей', 'Каспаров', 'Артёмович', 'kasparov04@list.ru', 1),
(3, 'Александр', 'Сигалев', 'Алексеевич', 'sigalevaleksandr68@gmail.com', 1),
(4, 'Владислав', 'Баринов', 'Дмитриевич', 'barim@mail.ru', 1),
(5, 'Андрей', 'Каспаров', 'Артёмович', 'kasparov04@list.ru', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` int(11) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `module`
--

INSERT INTO `module` (`id`, `course_id`, `name`, `question`, `points`) VALUES
(1, 1, 'Everyday Expressions / Введение в повседневные выражения ', 10, 50),
(2, 1, 'About me / О себе ', 10, 50),
(4, 2, 'Основы HTML', 3, 50),
(5, 2, 'Теги и атрибуты', 3, 50);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `description`) VALUES
(1, 'Новая система достижений и наград!', '2024-04-19', 'Мы обновили нашу систему геймификации! Теперь вас ждут новые достижения и награды за каждый пройденный курс и выполненное задание'),
(2, 'Особое предложение: -20% на все курсы', '2024-06-01', 'Только в этом месяце получите 20% скидку на все наши курсы по IT и английскому. Не упустите шанс улучшить свои навыки по выгодной цене!'),
(3, 'Добавлены курсы по кибербезопасности', '2024-06-04', 'Встречайте новый курс по кибербезопасности! Защитите свои данные и освоите основные принципы безопасности в IT. Курс доступен с подробными видеоуроками и практическими заданиями.');

-- --------------------------------------------------------

--
-- Структура таблицы `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question_text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `question`
--

INSERT INTO `question` (`id`, `test_id`, `question_text`) VALUES
(1, 1, 'Как можно сказать \"Доброе утро\" на английском?'),
(2, 1, 'Как можно ответить на вопрос \"Как дела?\" на английском?'),
(3, 1, 'Что означает \"Спасибо\" на английском?'),
(4, 1, 'Как можно попросить кого-то о прощении на английском?'),
(5, 1, 'Что означает \"Меня зовут...\" на английском?'),
(6, 1, 'Как можно выразить согласие на английском?'),
(7, 1, 'Как можно сказать \"Привет\" на английском?'),
(8, 1, 'Как можно попросить о прощении за просьбу о проходе на английском?'),
(9, 1, 'Как можно сказать \"До свидания\" на английском?'),
(10, 1, 'Как можно ответить на слова \"Хорошо, спасибо\" на английском?'),
(12, 3, 'Что такое HTML?'),
(13, 3, 'Какой тег используется для создания заголовка верхнего уровня в HTML?'),
(14, 3, 'Какой тег используется для создания ссылки в HTML?'),
(15, 3, 'Какой атрибут используется для добавления класса к элементу в HTML?'),
(16, 3, 'Какой тег используется для создания списка с нумерованными элементами?'),
(17, 3, 'Какой тег используется для вставки изображения в HTML?'),
(18, 3, 'Какой тег используется для создания таблицы в HTML?'),
(19, 3, 'Какой элемент HTML используется для создания параграфа текста?'),
(20, 3, 'Какой тег закрывает любой элемент HTML, если он не пустой?'),
(21, 3, 'Какой атрибут используется для задания адреса, на который будет переходить ссылка?');

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `name`, `mark`, `description`, `course_id`) VALUES
(2, 'Андрей', 5, 'Занятия курса очень понравились, в основном благодаря необычной системе — я человек настроения и не могу подстраиваться под график индивидуального репетитора или тем более целой группы. Иногда занимался несколько часов подряд — настолько легко и интересно организована подача материала, а один раз по болезни пропустил целую неделю. ', NULL),
(7, 'Андрей', 5, 'Все круто, благодаря данному курсу начал понимать основы английского языка', 1),
(8, 'Дмитрий', 4, 'Отличный курс! Благодаря нему узнал много нового, единственное, жаль нет мини-игр, было бы круто', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `support`
--

INSERT INTO `support` (`id`, `name`, `email`, `question`) VALUES
(1, 'Андрей', 'kasparov04@list.ru', 'Вопрос по оплате, свяжитесь со мной по почте');

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `theory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `description`, `theory_id`) VALUES
(1, 'Этот тест представляет собой небольшой викторинный опрос, состоящий из 10 вопросов на английском языке. Он основан на общих фразах и выражениях, используемых в повседневной жизни. Цель теста - проверить знания и понимание базовых выражений приветствия, благодарности, извинения и других общих фраз на английском языке. <br> <b>Каждый правильный ответ принесет вам 5 баллов</b><br><b>Если количество баллов будет меньше 30, тест не будет считаться выполненным</b>', 1),
(3, 'Этот тест представляет собой небольшой викторинный опрос, состоящий из 10 вопросов на английском языке. Он основан на общих фразах и выражениях, используемых в повседневной жизни. Цель теста - проверить знания и понимание базовых выражений приветствия, благодарности, извинения и других общих фраз на английском языке. <br> <b>Каждый правильный ответ принесет вам 5 баллов</b><br><b>Если количество баллов будет меньше 30, тест не будет считаться выполненным</b>', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `theory`
--

CREATE TABLE `theory` (
  `id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `theory`
--

INSERT INTO `theory` (`id`, `module_id`, `description`, `text`) VALUES
(1, 1, 'В этом разделе мы собрали фразы, которые пригодятся вам в повседневной жизни, чтобы поприветствовать человека, попрощаться, познакомиться и поддержать небольшой разговор.', '<b>Основы общения:</b> <br> Приветствие: Обычно начинается с приветствия, такого как \"Hello!\", \"Hi!\" или \"Hey!\". <br> Представление: Включает ваше имя и, возможно, краткое обсуждение о том, как ваши дела, например можно начать с \"My name is...\", \"How are you?\" <br> Обсуждение темы: Может включать разговор о погоде, новостях, планах на день и т. д. Например \"What do you think about the new movie that came out?\" <br> Запрос информации: Возможно, вы хотите узнать что-то новое или спросить совета. Например\"Do you know any good restaurants in this area?\" <br> Выражение мнения: Поделитесь своим мнением о том, о чем вы говорите. Можно начать с \"I think...\" <br> Поблагодарить: Важно проявлять благодарность, когда кто-то вам помог. \"Thank you\" <br> Прощание: Заканчивается обычно словом \"Goodbye\" или \"Bye\" с пожеланием хорошего дня/вечера. <br>   <b>Вариации в зависимости от ситуации:</b> <br> Формальное общение: Включает более стандартизированные фразы, используемые в официальных или профессиональных ситуациях. <br> Неформальное общение: Может включать более непринужденные и дружелюбные выражения, так как вы можете общаться с друзьями или близкими. <br> Профессиональное общение: Включает формульные выражения, специфичные для вашей профессии или области деятельности. <br> Социальное общение: Обычно более свободное и разговорное, охватывая широкий спектр тем, от повседневных до личных.'),
(3, 4, 'Модуль \"Основы HTML\" представляет собой введение в основные принципы и элементы языка разметки веб-страниц HTML. В этом курсе вы узнаете, как создавать структуру веб-документов с помощью различных HTML-элементов, включая заголовки, параграфы, ссылки, изображения, списки и таблицы. Вы также познакомитесь с основными атрибутами элементов и их использованием для создания интерактивных и информативных веб-страниц.', '<b>HTML (HyperText Markup Language) является стандартным языком разметки для создания веб-страниц. Он используется для определения структуры и содержимого документа, который браузер отображает пользователю. В этом модуле мы погрузимся в основы HTML, изучая ключевые концепции, теги и атрибуты.</b> <br> <b>Основные понятия</b> <br> <b>Элементы и теги:</b> <br> Элементы в HTML состоят из начального тега, содержимого элемента и закрывающего тега (если элемент не является пустым). <br> Теги определяют различные типы элементов и их поведение в документе. <br> <b>Cтруктура документа:</b> <br> Все теги обернуты в скобки `<` и `>` \r\n<br> Основной элемент HTML-документа: `html` <br> Заголовок документа: `head` br Тело документа: `<body>` <br> <b>Основные теги</b> <br> <b>Заголовки:</b> `h1` - `h6`: Определяют уровень заголовка, где `h1` самый высокий уровень. <br> <b>Параграфы:</b> `p`: Определяет абзац текста. <br> <b>Ссылки:</b> `a`: Создает ссылку на другую страницу или ресурс. <br> <b>Изображения:</b> `img`: Вставляет изображение на страницу. <br> <b>Списки:</b> Неупорядоченный список `ul` и его элементы `li`. Упорядоченный список `ol` и его элементы `li`. <br> <b>Таблицы:</b> <br> `table`: Определяет таблицу. <br> `tr`: Определяет строку в таблице. <br> `td`: Определяет ячейку в таблице. <br> <b>Атрибуты элементов</b> <br> class и id: Используются для добавления классов и идентификаторов элементам, что позволяет стилизовать их с помощью CSS или ссылаться на них через JavaScript. <br> href: Определяет адрес ссылки для элемента `a`. <br> src: Определяет путь к изображению или другому ресурсу для элемента `img`. <br> <b>Валидация и современные стандарты</b> <br> Валидность HTML: Значение использования валидного HTML для обеспечения совместимости с различными браузерами и устройствами. <br> Современные стандарты HTML5: Введение в новые возможности и улучшения, предложенные HTML5. <br> <b>Современные стандарты HTML5: Введение в новые возможности и улучшения, предложенные HTML5.</b> <br> Создание базовой веб-страницы с использованием основных элементов HTML. <br> Вставка изображений, создание списков и таблиц. <br> Создание ссылок и понимание использования атрибутов.');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `english_points` int(11) DEFAULT NULL,
  `it_points` int(11) DEFAULT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `patronymic`, `password`, `english_points`, `it_points`, `email`, `birthday`, `is_admin`) VALUES
(1, 'Андрей', 'Каспаров', 'Артёмович', '2864bf486820cc78015d39473ed26ab8', 50, NULL, 'kasparov04@list.ru', '2004-05-19', 1),
(3, 'Александр', 'Сигалев', 'Алексеевич', '9f59bd97e54c7fd25e9914ca614e7a52', 30, NULL, 'sigalevaleksandr68@gmail.com', NULL, 0),
(7, 'Владислав', 'Баринов', 'Дмитриевич', '9a660dc85a287377c6a22d52f19d00de', 35, NULL, 'barim@mail.ru', '2004-08-05', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `usercourse`
--

CREATE TABLE `usercourse` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `usercourse`
--

INSERT INTO `usercourse` (`id`, `user_id`, `course_id`) VALUES
(2, 1, 1),
(5, 1, 2),
(3, 3, 1),
(4, 7, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `usermodule`
--

CREATE TABLE `usermodule` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `isCompleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `usermodule`
--

INSERT INTO `usermodule` (`id`, `user_id`, `module_id`, `isCompleted`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 0),
(3, 3, 1, 1),
(4, 3, 2, 0),
(5, 7, 1, 1),
(6, 7, 2, 0),
(7, 1, 4, 0),
(8, 1, 5, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `word`
--

CREATE TABLE `word` (
  `id` int(11) NOT NULL,
  `theory_id` int(11) NOT NULL,
  `word_english` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `word_russia` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `word`
--

INSERT INTO `word` (`id`, `theory_id`, `word_english`, `word_russia`) VALUES
(1, 1, 'Hello', 'Привет'),
(2, 1, 'Good morning', 'Доброе утро'),
(3, 1, 'Good afternoon', 'Добрый день'),
(4, 1, 'Good evening', 'Добрый вечер'),
(5, 1, 'Goodbye ', 'До свидания'),
(6, 1, 'Please', 'Пожалуйста'),
(7, 1, 'Thank you (Thanks)', 'Спасибо'),
(8, 1, 'You\'re welcome', 'Пожалуйста (в ответ на \"спасибо\")'),
(9, 1, 'Sorry ', 'Простите'),
(10, 1, 'Excuse me', 'Извините (для просьбы о проходе)'),
(11, 1, 'Maybe ', 'Возможно'),
(12, 1, 'Sure ', 'Конечно'),
(13, 1, 'I\'m sorry', 'Мне жаль'),
(14, 1, 'How are you?', 'Как дела?'),
(15, 1, 'I\'m fine, thank you', 'Хорошо, спасибо'),
(16, 1, 'What\'s your name?', 'Как вас зовут?'),
(17, 1, 'My name is...', 'Меня зовут...'),
(18, 1, 'Yes', 'Да'),
(19, 1, 'No', 'Нет'),
(20, 1, 'Okay (OK)', 'Хорошо');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Индексы таблицы `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `courseregistration`
--
ALTER TABLE `courseregistration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Индексы таблицы `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Индексы таблицы `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`theory_id`),
  ADD KEY `theory_id` (`theory_id`);

--
-- Индексы таблицы `theory`
--
ALTER TABLE `theory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`module_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `usercourse`
--
ALTER TABLE `usercourse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Индексы таблицы `usermodule`
--
ALTER TABLE `usermodule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`module_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Индексы таблицы `word`
--
ALTER TABLE `word`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theory_id` (`theory_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT для таблицы `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `courseregistration`
--
ALTER TABLE `courseregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `theory`
--
ALTER TABLE `theory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `usercourse`
--
ALTER TABLE `usercourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `usermodule`
--
ALTER TABLE `usermodule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `word`
--
ALTER TABLE `word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`);

--
-- Ограничения внешнего ключа таблицы `courseregistration`
--
ALTER TABLE `courseregistration`
  ADD CONSTRAINT `courseregistration_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Ограничения внешнего ключа таблицы `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Ограничения внешнего ключа таблицы `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`);

--
-- Ограничения внешнего ключа таблицы `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Ограничения внешнего ключа таблицы `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`theory_id`) REFERENCES `theory` (`id`);

--
-- Ограничения внешнего ключа таблицы `theory`
--
ALTER TABLE `theory`
  ADD CONSTRAINT `theory_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`);

--
-- Ограничения внешнего ключа таблицы `usercourse`
--
ALTER TABLE `usercourse`
  ADD CONSTRAINT `usercourse_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `usercourse_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `usermodule`
--
ALTER TABLE `usermodule`
  ADD CONSTRAINT `usermodule_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `usermodule_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`);

--
-- Ограничения внешнего ключа таблицы `word`
--
ALTER TABLE `word`
  ADD CONSTRAINT `word_ibfk_1` FOREIGN KEY (`theory_id`) REFERENCES `theory` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
