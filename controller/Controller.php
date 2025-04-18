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
            session_start();
            $_SESSION['user'] = $_POST['name'];
            header('Location: /');
            exit();
        }
        include_once('view/answerRegister.php');    
    }

    public static function loginForm() {
        include_once('view/formLogin.php');
    }
    
    public static function loginUser() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $register = new Register();
        $user = $register->checkUser($username, $password);
        if ($user) {
            session_start();
            $_SESSION['user'] = $username;
            header('Location: /');
            exit();
        } else {
            $error = "Vale kasutajanimi või parool!";
            include_once('view/answerLogin.php');
        }
    }
}
?>