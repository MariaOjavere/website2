<?php
class controllerAdminProducts {
    public static function productsList() {
        $search = isset($_GET['search']) ? trim($_GET['search']) : '';

        if ($search) {
            $arr = modelAdminProducts::searchProducts($search);
        } else {
            $arr = modelAdminProducts::getProductsList();
        }
        
        include_once dirname(__DIR__) . '/viewAdmin/productsList.php';
    }

    public static function productsAdd() {
        $arr = controllerAdminCategory::getCategoryList();
        include_once dirname(__DIR__) . '/viewAdmin/productsAddForm.php';
    }

    public static function productsAddResult() {
        $test = modelAdminProducts::getProductsAdd();
        if ($test[0]) {
            header('Location: /admin/productsAdmin');
            exit();
        } else {
            $_SESSION['errorString'] = $test[1];
            $arr = controllerAdminCategory::getCategoryList();
            include_once dirname(__DIR__) . '/viewAdmin/productsAddForm.php';
        }
    }

    public static function productsEdit($id) {
        $id = (int)$id;
        if ($id <= 0) {
            header('Location: /admin/productsAdmin');
            exit();
        }
        $product = modelAdminProducts::getProductEdit($id);
        if ($product === false) {
            header('Location: /admin/productsAdmin');
            exit();
        }
        $arr = controllerAdminCategory::getCategoryList();
        include_once dirname(__DIR__) . '/viewAdmin/productsEditForm.php';
    }

    public static function productsEditResult($id) {
        $id = (int)$id;
        if ($id <= 0) {
            header('Location: /admin/productsAdmin');
            exit();
        }
        $test = modelAdminProducts::getProductEditResult($id);
        if ($test[0]) {
            header('Location: /admin/productsAdmin');
            exit();
        } else {
            $_SESSION['errorString'] = $test[1];
            $product = modelAdminProducts::getProductEdit($id);
            $arr = controllerAdminCategory::getCategoryList();
            include_once dirname(__DIR__) . '/viewAdmin/productsEditForm.php';
        }
    }

    public static function productsDelete($id) {
        $id = (int)$id;
        if ($id <= 0) {
            header('Location: /admin/productsAdmin');
            exit();
        }
        modelAdminProducts::getProductDelete($id);
        header('Location: /admin/productsAdmin');
        exit();
    }
}
?>