<?php
class Category {
    public static function getAllCategory() {
        $sql = "SELECT * FROM category ORDER BY name";
        $db = new Database();
        return $db->getAll($sql);
    }

    // Добавим метод для получения категории по ID
    public static function getCategoryById($id) {
        $sql = "SELECT * FROM category WHERE id = ?";
        $db = new Database();
        return $db->getOne($sql, [$id]);
    }
}