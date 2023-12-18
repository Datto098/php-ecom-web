<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";
spl_autoload_register(function ($class) {
    require_once BASE_URL . 'app/models/' . $class . '.php';
});

$template = new Template();
$categoryModels = new Category();
$parentCategories = $categoryModels->getParentCategoryId();
$colorModels = new Color();
$colors = $colorModels->getAllColors();
$sizeModelsModels = new SizeModels();
$sizeModels = $sizeModelsModels->getAllSizeModels();
$data = [
    'title' => 'Manage products',
    'slot' => $template->render('add_product', ['parentCategories'=> $parentCategories,'colors'=>$colors,'sizeModels'=>$sizeModels]),
  ];
$template->view('layout_admin', $data);

