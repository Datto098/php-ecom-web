<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
  require_once BASE_URL .'app/models/' . $class . '.php';
});

$colorModels = new Color();
if (isset($_GET["name"]) && isset($_GET["id"])) {
    $id = $_GET["id"];
    $name = $_GET["name"];
    if ($colorModels->update($name,$id) == true)
    {
        echo json_encode(true);
    }
    else{
        echo json_encode(false);
    }
}
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');
