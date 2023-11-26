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
$id;

//

if (isset($_POST['product_description']) && isset($_POST['product_brand']) && isset($_POST['product_name']) && isset($_POST['product_price']) 
  && isset($_POST['category_id'])) {
    $desc = $_POST['product_description'];
    $brand = $_POST['product_brand'];
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $category_id = $_POST['category_id'];
    $image = $_FILES['product_image']['name'];


    //khoi tao doi tuong Product
    $productModels = new Product();

    $id = $productModels->addProduct($image,$desc,$brand,$name,$price,$category_id);

    // if ($id != -1)
    // {
    //     header("location: show.php?id={$id}");
    // }

    echo $id;
}
else {
    echo "rong";
}

// echo  $_POST['product_description'];
// echo  $_POST['product_brand'];
// echo  $_POST['product_name'];
// echo  $_POST['product_price'];
// echo  $_POST['category_id'];
// echo  $_FILES['product_image']['name'];


