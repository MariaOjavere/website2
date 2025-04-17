<?php
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
} elseif ($path == 'insertreview' and isset($_POST['comment'], $_POST['product_id'])) {
    $review = [
        'username' => $_POST['username'],
        'comment' => $_POST['comment']
    ];
    $response = Controller::InsertReview($review, $_POST['product_id']);
} elseif ($path == 'registerForm') { 
    $response = Controller::registerForm();
} elseif ($path == 'registerAnswer') { 
    $response = Controller::registerUser();
} elseif ($path == 'loginForm') { 
    $response = Controller::loginForm();
} elseif ($path == 'loginAnswer') { 
    $response = Controller::loginUser();
} elseif ($path == 'info') { 
    $response = Controller::InfoPage(); // Новый маршрут для info
} else {
    $response = Controller::error404();
}
?>