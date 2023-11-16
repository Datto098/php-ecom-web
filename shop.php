<?php
require_once "./config/database.php";

// Autoload 
spl_autoload_register(function ($class) {
  require_once './app/models/' . $class . '.php';
});

$conn = new Database();
$category = new Category();
$category_data = $category->getAllCategories();
$template = new Template();

$data = [
  'title' => 'Shop',
  'slot' => $template->render('shop', ['category_data' => $category_data]),
];

$template->view('layout', $data);
