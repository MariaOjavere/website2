<?php
class controllerAdminCategory {
    public static function categoryList() {
        $arr = modelAdminCategory::getCategoryList();
        include_once dirname(__DIR__) . '/viewAdmin/CategoryList.php';
    }

    public static function getCategoryList() {
        return modelAdminCategory::getCategoryList();
    }

    public static function categoryAdd() {
        include_once dirname(__DIR__) . '/viewAdmin/CategoryAdd.php';
    }

    public static function categoryAddResult() {
        $test = modelAdminCategory::getCategoryAdd();
        if ($test[0]) {
            header('Location: /categoryAdmin');
            exit();
        } else {
            $_SESSION['errorString'] = $test[1];
            include_once dirname(__DIR__) . '/viewAdmin/CategoryAdd.php';
        }
    }

    public static function categoryEdit($id) {
        $category = modelAdminCategory::getCategoryEdit($id);
        include_once dirname(__DIR__) . '/viewAdmin/CategoryEdit.php';
    }

    public static function categoryEditResult($id) {
        $test = modelAdminCategory::getCategoryEditResult($id);
        if ($test[0]) {
            header('Location: /categoryAdmin');
            exit();
        } else {
            $_SESSION['errorString'] = $test[1];
            include_once dirname(__DIR__) . '/viewAdmin/CategoryEdit.php';
        }
    }

    public static function categoryDelete($id) {
        modelAdminCategory::getCategoryDelete($id);
        header('Location: /categoryAdmin');
        exit();
    }
}
?>

