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
$product = new Product();

// Get all products
$product_data = array();

// Get all parent categories and amount of products in each category
$category_parent = $category->getParentCategoryId();
foreach ($category_parent as $key => $parent) {
  $amout_item = $category->getAmountProductInCategory($parent['category_id']);
  $category_parent[$key]["amount_product"] = $amout_item[0]['amount_product'];
}

// Get all brands 
$brand_data = $product->getAllProductBrands();

// Get product by category
if (isset($category_id)) {
  $product_data = $product->getProductByCategoryId($category_id);
}

// Get product by category
if (isset($main_category_id)) {
  $product_data = $product->getProductByMainCategoryId($main_category_id);
}


$data = [
  'title' => 'Shop',
  'slot' => $template->render('shop', ['category_data' => $category_data, 'product_data' => $product_data, "category_parent_data" => $category_parent, "brand_data" => $brand_data]),
];

$template->view('layout', $data);
