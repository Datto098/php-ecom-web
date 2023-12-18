<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
  require_once BASE_URL .'app/models/' . $class . '.php';
});

$full_path;
$product_id;
$status =false;
$href_value;
$productModels = new Product();
if (isset($_POST['href'])){
    $full_path = $_POST['href'];
    $array = explode('/',$full_path);
    $href_value = end ($array);
    $product_id = $_POST['product_id'];
    $productModels->deleteImageByName($href_value,$product_id);
    $status = unlink($full_path);
}


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');
echo json_encode($status);