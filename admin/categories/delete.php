<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
    require_once BASE_URL . 'app/models/' . $class . '.php';
});

// Get data from request
$request = '_' . $_SERVER['REQUEST_METHOD'];
foreach ($$request as $key => $value) {
    $$key = $value;
}

$conn = new Database();
$category = new Category();


// Delete category
if (isset($id)) {
    if ($category->deleteCategoryAndSubcategories($id)) {
        echo "<script>alert('Xóa thành công')</script>";
        header("location: ./");
    } else {
        echo "<script>alert('Xảy ra lỗi trong qúa trình xóa')</script>";
    }
}
