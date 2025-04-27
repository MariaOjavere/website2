<?php
require_once dirname(__DIR__) . '/modelAdmin/modelAdminCategory.php';

if (!class_exists('controllerAdminCategory')) {
    class controllerAdminCategory {
        public static function categoryList() {
            $arr = modelAdminCategory::getCategoryList();
            include_once dirname(__DIR__) . '/viewAdmin/categoryList.php';
        }

        public static function getCategoryList() {
            return modelAdminCategory::getCategoryList();
        }

        public static function categoryAdd() {
            include_once dirname(__DIR__) . '/viewAdmin/categoryAddForm.php';
        }

        public static function categoryAddResult() {
            $test = modelAdminCategory::getCategoryAdd();
            if ($test[0]) {
                $_SESSION['successString'] = 'Kategooria lisatud edukalt!'; // Сообщение об успехе
                header('Location: /admin/categoryAdmin');
                exit();
            } else {
                $_SESSION['errorString'] = $test[1];
                include_once dirname(__DIR__) . '/viewAdmin/categoryAddForm.php';
            }
        }

        public static function categoryEdit($id) {
            $category = modelAdminCategory::getCategoryEdit($id);
            include_once dirname(__DIR__) . '/viewAdmin/categoryEditForm.php';
        }

        public static function categoryEditResult($id) {
            $test = modelAdminCategory::getCategoryEditResult($id);
            if ($test[0]) {
                $_SESSION['successString'] = 'Kategooria muudetud edukalt!'; // Сообщение об успехе
                header('Location: /admin/categoryAdmin');
                exit();
            } else {
                $_SESSION['errorString'] = $test[1];
                include_once dirname(__DIR__) . '/viewAdmin/categoryEditForm.php';
            }
        }

        public static function categoryDelete($id) {
            modelAdminCategory::getCategoryDelete($id);
            $_SESSION['successString'] = 'Kategooria kustutatud edukalt!'; // Сообщение об успехе
            header('Location: /admin/categoryAdmin');
            exit();
        }
    }
}
?>