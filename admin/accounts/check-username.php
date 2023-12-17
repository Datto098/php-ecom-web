<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
  require_once BASE_URL .'app/models/' . $class . '.php';
});

$userModels = new User();
$users = $userModels->getAllUsers();
$username;
$currentUsername;
$result = true;
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $currentUsername = $_POST['currentUsername'];
}

foreach ($users as $user) {
    if ($user['username'] == $username) {
        $result = false;
        break;
   }
}

if ($currentUsername == $username) {
    $result = true;
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

echo json_encode($result);