<?php
// Вычислить маршрут из адресной строки
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/');
$path = explode('/', $host)[$num];

if ($path == '' OR $path == 'index' OR $path == 'index.php') {
    $response = Controller::StartSite();
} elseif ($path == 'all') {
    $response = Controller::AllProducts();
} elseif ($path == 'category' and isset($_GET['id'])) {
    $response = Controller::ProductsByCatID($_GET['id']);
} elseif ($path == 'product' and isset($_GET['id'])) {
    $response = Controller::ProductByID($_GET['id']);
} elseif ($path == 'search' and isset($_GET['otsi'])) {
    $response = Controller::SearchProducts($_GET['otsi']);
} elseif ($path == 'insertreview' and isset($_GET['review'], $_GET['id'])) {
    $response = Controller::InsertReview($_GET['review'], $_GET['id']);
}

//---------------- Регистрация пользователя
elseif ($path == 'registerForm') { 
    $response = Controller::registerForm();
} elseif ($path == 'registerAnswer') { 
    $response = Controller::registerUser();
}

// Страница ошибки
else {
    $response = Controller::error404();
}

?>














