<?php
require_once "../config/database.php";
require_once "../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
    require_once BASE_URL . 'app/models/' . $class . '.php';
});

// Get data from request
$request = '_' . $_SERVER['REQUEST_METHOD'];
foreach ($$request as $key => $value) {
    $$key = $value;
}

$conn = new Database();
$product = new Product();


header("Content-Type: application/json");
echo json_encode($product->getAllProducts());
