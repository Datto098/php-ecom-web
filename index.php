<?php
require_once "./config/database.php";
require_once "./config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
  require_once './app/models/' . $class . '.php';
});

// Get data from request
$request = '_' . $_SERVER['REQUEST_METHOD'];
foreach ($$request as $key => $value) {
  $$key = $value;
}

$conn = new Database();
$category = new Category();
$product = new Product();
$template = new Template();

// Get all categories
$category_data = $category->getAllCategories();


// Get product sales
$product_sale = $product->getProductSales();

$data = [
  'title' => 'Trang chủ',
  'slot' => $template->render('home', ['category_data' => $category_data, 'product_sale_data' => $product_sale]),
];

$template->view('layout', $data);
