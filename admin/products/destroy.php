<?php 
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
    require_once BASE_URL .'app/models/' . $class . '.php';
  });

$id;
if (isset($_POST['product_id']))
{
    $id =$_POST['product_id'];
    $productModels = new Product();
    $productModels->destroy($id);
    header("location: index.php");
}
