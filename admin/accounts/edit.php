<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
  require_once BASE_URL .'app/models/' . $class . '.php';
});

$template = new Template();
$userModels = new User();
$id ;

if (isset($_GET['id']))
{
  $id = $_GET['id'];
}

$user = $userModels->getUserById($id);
$roles = $userModels->getAllRoles();
$data = [
  'title' => 'Update account',
  'slot' => $template->render('edit_account', ['roles'=> $roles,'user'=>$user]),
];

$template->view('layout_admin', $data);