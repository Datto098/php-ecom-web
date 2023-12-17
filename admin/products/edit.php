<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
  require_once BASE_URL . 'app/models/' . $class . '.php';
});

$template = new Template();
$productModels = new Product();
$categoryModels = new Category();
$parentCategories = $categoryModels->getParentCategoryId();
$colorModels = new Colors();
$colors = $colorModels->getAllColors();
$sizeModelsModels = new SizeModels();
$sizeModels = $sizeModelsModels->getAllSizeModels();
$product;

$id;
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $product = $productModels->getProductById($id);

  $data = [
    'title' => 'Edit ' . $product['name'],
    'slot' => $template->render('edit_product', ['product'=>$product,'parentCategories'=> $parentCategories,'colors'=>$colors,'sizeModels'=>$sizeModels]),
  ];

  $template->view('layout_admin', $data);
}
