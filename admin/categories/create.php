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


// Create new category
if (isset($category_name)) {
    if (isset($parent_id)) {
        if ($category->addCategory($category_name, $parent_id)) {
            echo "<script>alert('Xóa thành công')</script>";
            header("location: ./");
        } else {
            echo "<script>alert('Xảy ra lỗi trong qúa trình xóa')</script>";
        }
    } else {
        if ($category->addCategory($category_name)) {
            echo "<script>alert('Xóa thành công')</script>";
            header("location: ./");
        } else {
            echo "<script>alert('Xảy ra lỗi trong qúa trình xóa')</script>";
        }
    }
}
