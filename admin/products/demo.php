<?php 
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
    require_once BASE_URL .'app/models/' . $class . '.php';
  });



 //khai bao bien
$image;
$desc;
$brand;
$name;
$price;
$category_id;

//

if (isset($_POST['product_desc'])  && isset($_POST['product_brand']) && isset($_POST['product_name']) && isset($_POST['product_price']) 
  && isset($_POST['product_category_id']) && isset($_FILES['product_image'])
) {
    $desc = $_POST['product_desc'];
    $brand = $_POST['product_brand'];
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $category_id = $_POST['category_id'];
    $image = $_FILES['product_image'];


    //khoi tao doi tuong Product
    $productModels = new Product();

    if ($productModels->addProduct($image,$desc,$brand,$name,$price,$category_id))
    {
        header('location: index.php');
    }
}


