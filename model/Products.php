<?php
include_once 'Database.php'; 
class Products {
    
    public static function getLast10Products() {
        $query = "SELECT * FROM products ORDER BY id DESC LIMIT 2" ;
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getAllProducts() {
        $query = "SELECT * FROM products ORDER BY id DESC" ;
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getProductsByCategoryID($id) {
        $query = "SELECT * FROM products WHERE category_id=" . (string)$id . " ORDER BY id DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getProductByID($id) {
        $query = "SELECT * FROM products WHERE id=" . (string)$id;
        $db = new Database();
        $p = $db->getOne($query);
        return $p;
    }

    public static function getSearchProducts($s) {
        $query = 'SELECT * FROM products WHERE name LIKE "%' . $s . '%" OR description LIKE "%' . $s . '%"';
        $db = new Database();
        $p = $db->getAll($query);
        return $p;
    }
}
?>
