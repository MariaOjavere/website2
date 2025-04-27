<?php
require_once 'controller/Controller.php';

$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/');
$path = explode('/', $host)[$num];

if ($path == '' || $path == 'index' || $path == 'index.php') {
    $response = Controller::StartSite();
} elseif ($path == 'all') {
    $response = Controller::AllProducts();
} elseif ($path == 'category' && isset($_GET['id'])) {
    $response = Controller::ProductsByCatID($_GET['id']);
} elseif ($path == 'product' && isset($_GET['id'])) {
    $response = Controller::ProductByID($_GET['id']);
} elseif ($path == 'search' && isset($_GET['otsi'])) {
    $response = Controller::SearchProducts($_GET['otsi']);
} elseif ($path == 'insertreview' && isset($_POST['comment'], $_POST['product_id'])) {
    $response = Controller::InsertReview($_POST['comment'], $_POST['product_id'], $_POST['username']);
} elseif ($path == 'registerForm') { 
    $response = Controller::registerForm();
} elseif ($path == 'registerAnswer') { 
    $response = Controller::registerUser();
} elseif ($path == 'loginForm') { 
    $response = Controller::loginForm();
} elseif ($path == 'loginAnswer') { 
    $response = Controller::loginUser();
} elseif ($path == 'logout') {
    $response = Controller::Logout();
} elseif ($path == 'info') { 
    $response = Controller::InfoPage();
} elseif ($path == 'admin') {
    // Проверяем, авторизован ли пользователь и имеет ли права администратора
    if (isset($_SESSION['userId']) && isset($_SESSION['status']) && $_SESSION['status'] == 'admin') {
        header('Location: admin/'); // Перенаправляем в админ-панель
        exit();
    } else {
        // Если нет прав или не авторизован, перенаправляем на страницу логина
        header('Location: loginForm');
        exit();
    }
} else {
    $response = Controller::error404();
}
?>