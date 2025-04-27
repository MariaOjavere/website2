<?php
class Controller {

    public static function StartSite() {
        $arr = Products::getLast10Products();
        ob_start();
        include_once 'view/start.php';
        $content = ob_get_clean();
        include_once 'view/layout.php';
    }

    public static function AllCategory() {
        $arr = Category::getAllCategory();
        include_once 'view/category.php';
    }

    public static function InfoPage() {
        include 'view/info.php';
    }

    public static function AllProducts() {
        $arr = Products::getAllProducts();
        include_once 'view/allproducts.php';
    }
    
    public static function ProductsByCatID($id) {
        $arr = Products::getProductsByCategoryID($id);
        include_once 'view/catproducts.php';
    }
    
    public static function ProductByID($id) {
        $p = Products::getProductByID($id);
        if ($p) {
            $content = ViewProducts::ReadProduct($p);
            include_once 'view/layout.php';
        } else {
            self::error404(); 
        }
    }
    
    public static function SearchProducts($search) {
        $arr = Products::getSearchProducts($search);
        include_once 'view/searchview.php';
    }

    public static function error404() {
        include_once 'view/error404.php';
    }
    
    public static function ReviewsCount($productId) {
        $arr = Reviews::getReviewsCountByProductID($productId);
        ViewReviews::ReviewsCount($arr);
    }
    
    public static function ReviewsCountWithAnchor($productId) {
        $arr = Reviews::getReviewsCountByProductID($productId);
        ViewReviews::ReviewsCountWithAnchor($arr);
    }
    
    public static function InsertReview($comment, $id, $username) {
        try {
            Reviews::insertReview($comment, $id, $username);
            self::ProductByID($id);
        } catch (Exception $e) {
            $content = '<div class="alert alert-danger">' . htmlspecialchars($e->getMessage()) . '</div>';
            include_once 'view/layout.php';
        }
    }
    
    public static function registerForm() {        
        include_once('view/formRegister.php');        
    }

    public static function registerUser() {
        $register = new Register();
        $result = $register->registerUser();
        if ($result[0]) {
            $_SESSION['userId'] = $result[1]['id'];
            $_SESSION['username'] = $result[1]['username'];
            $_SESSION['status'] = $result[1]['status'];
            $_SESSION['sessionID'] = session_id();
            $_SESSION['email'] = $result[1]['email'];
            $_SESSION['is_admin'] = ($result[1]['status'] === 'admin');
            $_SESSION['user'] = $result[1]['username']; // Для совместимости
            header('Location: /');
            exit();
        }
        include_once('view/answerRegister.php');    
    }

    public static function loginForm() {
        include_once('view/formLogin.php');
    }
    
    public static function loginUser() {
        $error = '';
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            error_log("User login attempt: username = $username");
    
            $register = new Register();
            $user = $register->checkUser($username, $password);
            if ($user) {
                error_log("User found: id = " . $user['id'] . ", status = " . $user['status']);
                $_SESSION['userId'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['status'] = $user['status'];
                $_SESSION['sessionID'] = session_id();
                $_SESSION['email'] = $user['email'];
                $_SESSION['is_admin'] = ($user['status'] === 'admin');
                $_SESSION['user'] = $user['username']; // Для совместимости
                error_log("Login successful: userId = " . $user['id'] . ", status = " . $user['status']);
    
                // Перенаправляем в зависимости от статуса
                if ($user['status'] === 'admin') {
                    header('Location: /admin'); // Перенаправляем на маршрут /admin
                    exit();
                } else {
                    header('Location: /');
                    exit();
                }
            } else {
                error_log("Login failed for username: $username");
                $error = "Vale kasutajanimi või parool!";
                include_once('view/answerLogin.php');
            }
        } else {
            error_log("Username or password not provided");
            $error = "Palun sisestage kasutajanimi ja parool!";
            include_once('view/answerLogin.php');
        }
    }

    public static function Logout() {
        // Очищаем все сессионные переменные
        $_SESSION = [];
        // Уничтожаем сессию
        session_destroy();
        // Перенаправляем на главную страницу
        header('Location: /');
        exit();
    }
}
?>