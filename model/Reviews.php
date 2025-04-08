<?php
class Reviews{
	
     	
	 public static function getReviewByProductID($id)
	 {
        $query = "SELECT * FROM reviews where product_id=".(string)$id." ORDER BY id DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }
	
	public static function insertComment($c,$id)
	{
		$query = "INSERT INTO `reviews` ( `user_id`, `product_id`, `text`, `date`) VALUES ( '2', '".$id."', '".$c."', CURRENT_TIMESTAMP); ";
        $db = new Database();
        $q = $db->executeRun($query);
        return $q;
	}
	
	public static function getReviewsCountByProductID($id)
	 {
        $query = "SELECT count(id) as 'count' FROM reviews where product_id=".(string)$id;
        $db = new Database();
        $c = $db->getOne($query);
        return $c;
    }
	
	
}
?>	
	