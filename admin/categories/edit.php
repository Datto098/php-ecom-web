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


// Update category
if (isset($category_id) && isset($category_name)) {
    if ($category->updateCategoryById($category_id, $category_name, $parent_id)) {
        echo "<script>alert('Lưu thành công')</script>";
        header("location: ./");
    } else {
        echo "<script>alert('Xảy ra lỗi trong qúa trình cập nhật')</script>";
    }
}
