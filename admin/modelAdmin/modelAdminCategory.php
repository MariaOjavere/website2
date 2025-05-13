<?php
class modelAdminCategory {
    public static function getCategoryList() {
        $sql = 'SELECT * FROM category ORDER BY name ASC';
        $db = new Database();
        return $db->getAll($sql);
    }

    public static function getCategoryAdd() {
        $test = array(false, "Viga kategooria lisamisel");
        if (isset($_POST['btnAddCategory'])) {
            $name = $_POST['name'] ?? '';
            if ($name) {
                $sql = "INSERT INTO category (name) VALUES (?)";
                $db = new Database();
                $stmt = $db->prepare($sql);
                $result = $stmt->execute([$name]);
                if ($result) {
                    $test = array(true, "Kategooria lisamine õnnestus");
                }
            }
        }
        return $test;
    }

    public static function getCategoryEdit($id) {
        $sql = 'SELECT * FROM category WHERE id = ?';
        $db = new Database();
        return $db->getOne($sql, [$id]);
    }

    public static function getCategoryEditResult($id) {
        $test = array(false, "Viga kategooria lisamisel");
        if (isset($_POST['btnEditCategory'])) {
            $name = $_POST['name'] ?? '';
            if ($name) {
                $sql = "UPDATE category SET name = ? WHERE id = ?";
                $db = new Database();
                $stmt = $db->prepare($sql);
                $result = $stmt->execute([$name, $id]);
                if ($result) {
                    $test = array(true, "Kategooria lisamine õnnestus");
                }
            }
        }
        return $test;
    }

    public static function getCategoryDelete($id) {
        $sql = 'DELETE FROM category WHERE id = ?';
        $db = new Database();
        $db->executeRun($sql, [$id]);
    }
}
?>