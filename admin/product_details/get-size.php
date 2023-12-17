<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
  require_once BASE_URL .'app/models/' . $class . '.php';
});

$conn = new Database();
$template = new Template();
$sizeModels = new Sizes();


$sizes = array();

if (isset($_GET["id"])) {
    $sizes = $sizeModels->getSizeBySizeModelsId($_GET["id"]);
}


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

echo json_encode($sizes);