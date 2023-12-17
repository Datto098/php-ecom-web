<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
  require_once BASE_URL . 'app/models/' . $class . '.php';
});

//khai bao bien
$id;
$name;
$brand;
$price;
$categoriesID;
$colorsID;
$sizesID;
$quantities;
$image;
$galleries_image;
$images;
$imagesOld;
$desc;
$productModels = new Product();

if (isset($_POST['id'])) {
  $id = $_POST['id'];
  $product = $productModels->getProductById($id);
  $name = (isset($_POST['name'])) ? $_POST['name'] : '';
  $brand = (isset($_POST['brand'])) ? $_POST['brand'] : '';
  $price = (isset($_POST['price'])) ? $_POST['price'] : 0;

  if (isset($_POST['categoriesID'])) {
    $categoriesID = $_POST['categoriesID'];
  } else {
    $categoriesID = explode(',',$product['categoriesID']);
    // echo "<pre>";
    // print_r($categoriesID);
    // echo "</pre>";
  }

  if (isset($_POST['colorsID'])) {
    $colorsID = $_POST['colorsID'];
  } else {
    $colorsID = [];
  }

  if (isset($_POST['sizesID'])) {
    $sizesID = $_POST['sizesID'];
  } else {
    $sizesID = [];
  }

  if (isset($_POST['quantities'])) {
    $quantities = $_POST['quantities'];
  } else {
    $quantities = [];
  }

  if (!empty($_FILES['galleries']['name'][0]))
  {
    $galleries_image = $_FILES['galleries'];
  }
  else {
    $galleries_image = [];
  }

  $desc = (isset($_POST['desc'])) ? $_POST['desc'] : '';






  //XU LY FILE

  // Đường dẫn thư mục uploads
  $uploadDirectory = BASE_URL . 'public/img/products/';
  //dua mang name anh ve chung 1 mang
  $nameFolder = explode('/', $product['image'])[0] . '/';
  //xoa file
  $nameFile = $product['image'];
  $newArrayNameImage = [];
  //
  $imagesOld = explode("~", $product['galleries_image']);

  if (isset($_POST['images'])) {
    $images = $_POST['images'];
  } else {
    $images = [];
  }

  $image = isset($_FILES['image']) ? $_FILES['image'] : $product['image'];


  // echo 'check  :'  . !empty($_FILES["image"]);

  //main image khi co thay doi
  if (!empty($_FILES['image']['name'][0])) {
    $link = $uploadDirectory . $nameFile;
    if (unlink($link)) {
      //xoa image cu khoi folder
      move_uploaded_file($image['tmp_name'], $uploadDirectory . $nameFolder . $image['name']); // them anh moi vua cap nhat vao folder
      $nameFile = $nameFolder . $image['name'];
    }
  }






  foreach ($imagesOld as $image) {
    if (!in_array($image,$images)){
      $link = $uploadDirectory . $image;
      echo $link;
      if (file_exists($link)) {
        unlink($link);
      }
    }
  }

  // galleries image
  if (!empty($galleries_image)) {

    // //them file product images
    for ($i = 0; $i < count($galleries_image['tmp_name']); $i++) {
      move_uploaded_file($galleries_image['tmp_name'][$i], $uploadDirectory . $nameFolder . $galleries_image['name'][$i]);
    }
    foreach ($galleries_image['name'] as $gallery_image) {
      array_push($newArrayNameImage, ($nameFolder . $gallery_image));
    }

  }

$newArrayNameImage = array_merge($newArrayNameImage,$images);

//   //day du lieu ve lai db
if ($productModels->update($name, $brand, $price, $desc, $nameFile,$newArrayNameImage,$sizesID,$colorsID,$quantities,$categoriesID,$id))
{
  $_SESSION['notify'] = "Update product success";
  $_SESSION["alert"] = "alert-success";
}
else{
  $_SESSION['notify'] = "Update product fail";
  $_SESSION["alert"] = "alert-danger";
  
}
header("location: index.php");


} 



