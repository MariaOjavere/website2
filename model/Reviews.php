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
    
    public static function insertReview($comment, $id, $username) {
        $id = (int)$id;
        $comment = htmlspecialchars($comment);
        $username = htmlspecialchars($username);

        $db = new Database();
        $query = "SELECT id FROM users WHERE username = '$username'";
        $user = $db->getOne($query);
        
        if ($user) {
            $user_id = (int)$user['id'];
        } else {
            $user_id = 2;
        }

        $query = "SELECT id FROM reviews WHERE user_id = '$user_id' AND product_id = '$id' AND text = '$comment'";
        $existingReview = $db->getOne($query);
        if ($existingReview) {
            return false; 
        }

        $query = "INSERT INTO `reviews` (`user_id`, `product_id`, `text`, `created_at`) 
                  VALUES ('$user_id', '$id', '$comment', CURRENT_TIMESTAMP)";
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