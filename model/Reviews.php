<?php

class Reviews {
    public static function getReviewsByProductID($id) {
        $id = (int)$id;
        $query = "SELECT reviews.*, users.username AS user_name 
                  FROM reviews 
                  LEFT JOIN users ON reviews.user_id = users.id 
                  WHERE reviews.product_id = $id 
                  ORDER BY reviews.id DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }
    
    public static function insertReview($c, $id) {
        $id = (int)$id;
        $c = htmlspecialchars($c);
        $query = "INSERT INTO `reviews` (`user_id`, `product_id`, `text`, `created_at`) 
                  VALUES ('2', '$id', '$c', CURRENT_TIMESTAMP)";
        $db = new Database();
        $q = $db->executeRun($query);
        return $q;
    }
    
    public static function getReviewsCountByProductID($id) {
        $id = (int)$id;
        $query = "SELECT COUNT(id) as 'count' FROM reviews WHERE product_id = $id";
        $db = new Database();
        $c = $db->getOne($query);
        return $c;
    }
}
?>