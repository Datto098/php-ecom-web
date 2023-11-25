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
$category_data = $category->getCategories();
$template = new Template();


// Search category
if (isset($search)) {
    $category_data = $category->findCategory($search);
}


$data = [
    'title' => 'Quản lý danh mục',
    'slot' => $template->render('blocks/list_category', ['category_data' => $category_data])
];


$template->view("layout_admin", $data);
