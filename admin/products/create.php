<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
    require_once BASE_URL . 'app/models/' . $class . '.php';
});

// // Get data from request
// $request = '_' . $_SERVER['REQUEST_METHOD'];
// foreach ($$request as $key => $value) {
//     $$key = $value;
// }

$template = new Template();
$categoryModels = new Category();
$parentCategories = $categoryModels->getParentCategoryId();
$colorModels = new Colors();
$colors = $colorModels->getAllColors();
$sizeModelsModels = new SizeModels();
$sizeModels = $sizeModelsModels->getAllSizeModels();
$data = [
    'title' => 'Manage products',
    'slot' => $template->render('add_product', ['parentCategories'=> $parentCategories,'colors'=>$colors,'sizeModels'=>$sizeModels]),
  ];
  
  $template->view('layout_admin', $data);

