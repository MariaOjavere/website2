<?php
class Category {
    public static function getAllCategory() {
        $sql = "SELECT * FROM category ORDER BY name";
        $db = new Database();
        return $db->getAll($sql);
    }

    public static function getCategoryById($id) {
        $sql = "SELECT * FROM category WHERE id = ?";
        $db = new Database();
        return $db->getOne($sql, [$id]);
    }
}