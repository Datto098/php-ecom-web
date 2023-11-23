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
$category_data = $category->getAllCategories();
$template = new Template();

$data = [
  'title' => 'Trang chủ',
  'slot' => $template->render('blocks/home', ['category_data' => $category_data]),
];

$template->view('layout', $data);
