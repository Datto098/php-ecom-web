<?php 
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
    require_once BASE_URL .'app/models/' . $class . '.php';
  });

$id;
if (isset($_GET['id']))
{
    $id = $_GET['id'];
}


if (!empty($id))
{
    $userModels = new User();
    $userModels->destroy($id);
    header('location: index.php');
}