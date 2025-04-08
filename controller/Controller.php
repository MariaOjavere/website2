<?php
include_once 'view/viewreviews.php';

class Controller {

    public static function StartSite() {
        $arr = Products::getLast10Products();
        include_once 'view/start.php';
        return;
    }

    public static function AllCategory() {
        $arr = Category::getAllCategory();
        include_once 'view/category.php';
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
        include_once 'view/readproduct.php';
    }
    
    public static function SearchProducts($search) {
        $arr = Products::getSearchProducts($search);
        include_once 'view/searchview.php';
    }

    public static function error404() {
        include_once 'view/error404.php';
    }

    public static function Reviews($productId) {
        $arr = Reviews::getReviewsByProductID($productId);
        ViewReviews::ReviewsByProduct($arr);
    }
    
    public static function ReviewsCount($productId) {
        $arr = Reviews::getReviewsCountByProductID($productId);
        ViewReviews::ReviewsCount($arr);
    }
    
    public static function ReviewsCountWithAnchor($productId) {
        $arr = Reviews::getReviewsCountByProductID($productId);
        ViewReviews::ReviewsCountWithAnchor($arr);
    }
    
    public static function InsertReview($review, $id) {
        Reviews::InsertReview($review, $id);
        self::ProductByID($id);
    }
    
    public static function registerForm() {        
        include_once('view/formRegister.php');        
    }

    public static function registerUser() {
        $register = new Register();
        $result = $register->registerUser();
        include_once('view/answerRegister.php');    
    }
}
?>