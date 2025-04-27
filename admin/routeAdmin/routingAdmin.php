<?php
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/');
$path = explode('/', $host)[$num];

// Если пользователь уже авторизован и имеет права администратора
if (isset($_SESSION['userId']) && isset($_SESSION['sessionID']) && isset($_SESSION['status']) && $_SESSION['status'] == 'admin') {
    if ($path == '' || $path == 'index' || $path == 'index.php') {
        header('Location: /admin/productsAdmin');
        exit();
    }
    elseif ($path == 'login') {
        controllerAdmin::loginAction();
    }
    elseif ($path == 'logout') {
        controllerAdmin::logoutAction();
    }
    elseif ($path == 'productsAdmin') {
        controllerAdminProducts::productsList();
    }
    elseif ($path == 'productsAdd') {
        controllerAdminProducts::productsAdd();
    }
    elseif ($path == 'productsAddResult') {
        controllerAdminProducts::productsAddResult();
    }
    elseif ($path == 'productsEdit' && isset($_GET['id'])) {
        controllerAdminProducts::productsEdit($_GET['id']);
    }
    elseif ($path == 'productsEditResult' && isset($_GET['id'])) {
        controllerAdminProducts::productsEditResult($_GET['id']);
    }
    elseif ($path == 'productsDelete' && isset($_GET['id'])) {
        controllerAdminProducts::productsDelete($_GET['id']);
    }
    elseif ($path == 'categoryAdmin') {
        controllerAdminCategory::categoryList();
    }
    elseif ($path == 'categoryAdd') { // Исправлено: categoryAddForm → categoryAdd
        controllerAdminCategory::categoryAdd();
    }
    elseif ($path == 'categoryAddResult') {
        controllerAdminCategory::categoryAddResult();
    }
    elseif ($path == 'categoryEdit' && isset($_GET['id'])) { // Исправлено: categoryEditForm → categoryEdit
        controllerAdminCategory::categoryEdit($_GET['id']);
    }
    elseif ($path == 'categoryEditResult' && isset($_GET['id'])) {
        controllerAdminCategory::categoryEditResult($_GET['id']);
    }
    elseif ($path == 'categoryDelete' && isset($_GET['id'])) { // Исправлено: categoryDeleteForm → categoryDelete
        controllerAdminCategory::categoryDelete($_GET['id']);
    }
    elseif ($path == 'profile') {
        controllerAdmin::profileTable();
    }
    elseif ($path == 'profileEditResult') {
        controllerAdmin::profileEditResult();
    }
    else {
        header('Location: /admin'); // Изменено: / → /admin
        exit();
    }
} else {
    if ($path == 'login') {
        controllerAdmin::loginAction();
    } else {
        controllerAdmin::formLoginSite();
    }
}
?>