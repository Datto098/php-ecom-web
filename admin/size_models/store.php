<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
  require_once BASE_URL . 'app/models/' . $class . '.php';
});


$conn = new Database();
$template = new Template();
$sizeModels = new SizeModels();

if (isset($_GET["name"])) {
    $sizeModels->store($name);
}


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

$response = ['message' => 'Data received successfully']; // Chuẩn bị response JSON
echo json_encode($response); // Trả về response JSON










