<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
  require_once BASE_URL .'app/models/' . $class . '.php';
});

$template = new Template();
$colorModels = new Color();
$colors = $colorModels->getAllColors();
$sizeModelsModels = new SizeModels();
$sizeModels = $sizeModelsModels->getAllSizeModels();


$data = [
  'title' => 'Manage products',
  'slot' => $template->render('manage_product_details',['colors'=> $colors,'sizeModels'=> $sizeModels]),
];

$template->view('layout_admin', $data);
