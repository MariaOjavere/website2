<?php
class controllerAdminProducts {
    public static function productsList() {
        $arr = modelAdminProducts::getProductsList();
        include_once dirname(__DIR__) . '/viewAdmin/productsList.php';
    }

    public static function productsAdd() {
        $arr = controllerAdminCategory::getCategoryList();
        include_once dirname(__DIR__) . '/viewAdmin/productsAddForm.php';
    }

    public static function productsAddResult() {
        $test = modelAdminProducts::getProductsAdd();
        if ($test[0]) {
            header('Location: /productsAdmin');
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
            header('Location: /productsAdmin');
            exit();
        }
        $product = modelAdminProducts::getProductEdit($id);
        if ($product === false) {
            header('Location: /productsAdmin');
            exit();
        }
        include_once dirname(__DIR__) . '/viewAdmin/productsEditForm.php';
    }

    public static function productsEditResult($id) {
        $id = (int)$id;
        if ($id <= 0) {
            header('Location: /productsAdmin');
            exit();
        }
        $test = modelAdminProducts::getProductEditResult($id);
        if ($test[0]) {
            header('Location: /productsAdmin');
            exit();
        } else {
            $_SESSION['errorString'] = $test[1];
            $product = modelAdminProducts::getProductEdit($id); // Загружаем данные товара для формы
            include_once dirname(__DIR__) . '/viewAdmin/productsEditForm.php';
        }
    }

    public static function productsDelete($id) {
        modelAdminProducts::getProductDelete($id);
        header('Location: /productsAdmin');
        exit();
    }
}
?>