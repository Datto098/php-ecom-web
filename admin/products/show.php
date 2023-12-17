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
$id ;

if (!empty($_GET['id']))
{
    $id = $_GET['id'];
}
$product = $productModels->getProductById($id);
$attributes = $productModels->getAttributesById($id);

// echo "<pre>";
//   print_r($attributes);
// echo "</pre>";
$data = [
  'title' => $product['product_name'],
  'slot' => $template->render('details_product', ['product'=> $product,'attributes'=>$attributes]),
];

$template->view('layout_admin', $data);
