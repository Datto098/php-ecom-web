<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
  require_once BASE_URL .'app/models/' . $class . '.php';
});

$conn = new Database();
$template = new Template();
$id;

if (!empty($_GET['id']))
{
    $id = $_GET['id'];
}

$userModels = new User();
$user = $userModels->getUserById($id);

$data = [
  'title' => $user['username'],
  'slot' => $template->render('details_account', ["user"=>$user]),
];

$template->view('layout_admin', $data);