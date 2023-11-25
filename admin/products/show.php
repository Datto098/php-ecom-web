<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
  require_once BASE_URL .'app/models/' . $class . '.php';
});

$conn = new Database();
$template = new Template();
$productModels = new Product();
$products = $productModels->

$data = [
  'title' => 'details products',
  'slot' => $template->render('details_product', []),
];

$template->view('layout_admin', $data);