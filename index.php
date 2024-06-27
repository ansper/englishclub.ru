<?php

class Router {
    private $routes = [];

    public function addRoute($route, $name, $handler) {
        $this->routes[$route] = ['name' => $name, 'handler' => $handler];
    }

    public function handleRequest($url) {
        $request = $_SERVER['REQUEST_URI'];
        if (array_key_exists($url, $this->routes)) {
            // Если URL соответствует маршруту, вызываем обработчик
            call_user_func($this->routes[$url]['handler']);
        } else if(preg_match('/^\/news\/([0-9]+)/', $request, $matches)) {
            include 'pages/newspage.php';
        } else if(preg_match('/^\/course\/([0-9]+)/', $request, $matches)) {
            include 'pages/coursepage.php';
        } else if (preg_match('/^\/learn\/([0-9]+)/', $request, $matches)) {
            include 'pages/learn.php';
        } else if (preg_match('/^\/module\/([0-9]+)/', $request, $matches)) {
            include 'pages/module.php';
        } else if (preg_match('/^\/test\/([0-9]+)/', $request, $matches)) {
            include 'pages/test.php';
        } else if (preg_match('/^\/testend\/([0-9]+)/', $request, $matches)) {
            include 'pages/testend.php';
        } else {
            // Если не найдено соответствующего маршрута, показываем ошибку 404
            echo "Error 404: Page not found";
        }
    }
}

// Создаем экземпляр маршрутизатора
$router = new Router();

// Добавляем маршруты
$router->addRoute('/', 'Home', function() {
    include 'pages/main.php';
});

$router->addRoute('/lk', 'Lk', function() {
    include 'pages/lk.php';
});

$router->addRoute('/auth', 'Auth', function() {
    include 'pages/auth.php';
});

$router->addRoute('/register', 'Register', function() {
    include 'pages/register.php';
});

$router->addRoute('/catalog', 'Catalog', function() {
    include 'pages/catalog.php';
});

$router->addRoute('/news', 'News', function() {
    include 'pages/news.php';
});

$router->addRoute('/payment', 'Payment', function() {
    include 'pages/payment.php';
});

$router->addRoute('/reviews', 'Reviews', function() {
    include 'pages/reviews.php';
});

$router->addRoute('/setting', 'Setting', function() {
    include 'pages/lk-setting.php';
});

$router->addRoute('/registerPHP', 'RegisterPHP', function() {
    include 'scripts/php/register.php';
});

$router->addRoute('/authPHP', 'AuthPHP', function() {
    include 'scripts/php/auth.php';
});

$router->addRoute('/logout', 'Logout', function() {
    include 'scripts/php/logout.php';
});

$router->addRoute('/admin', 'Admin', function() {
    include 'pages/admin.php';
});

$router->addRoute('/add', 'Add', function() {
    include 'pages/add.php';
});

// Обрабатываем запрос
$url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
$url = parse_url($url, PHP_URL_PATH);

// Обрабатываем запрос
$router->handleRequest($url);

?>


