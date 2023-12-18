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







  $uploadDirectory = BASE_URL . 'public/storage/';
  $newArrayNameImage = [];
  if (isset($_POST['images'])) {
    $images = $_POST['images'];
  } else {
    $images = [];
  }

 
  $imageNameNw;
  if (!empty($_FILES['image']['name'][0]))
  {
    $image = $_FILES['image'];
    $array = explode('.', $image['name']);
    $imageNameNw = hash('md5', $image['name']). '.' . end($array);
    unlink($uploadDirectory . $product['image']);
    rename($image['tmp_name'], $uploadDirectory . $imageNameNw);
  }
  else {
    $imageNameNw = $product['image'];
  }


  // galleries image
  if (!empty($galleries_image)){
    $galleriesNameNw = [];
    foreach ($galleries_image['name'] as $item) {
    $array = explode('.', $item);
    $galleriesNameNw[] = hash('md5', $item). '.' . end($array);
    }
    for ($i = 0; $i < count($galleries_image['tmp_name']); $i++) {
      rename($galleries_image['tmp_name'][$i], $uploadDirectory . $galleriesNameNw[$i]);
    }
    foreach ($galleriesNameNw as $gallery_image){
      array_push($newArrayNameImage,$gallery_image);
    }
  }
$newArrayNameImage = array_merge($newArrayNameImage,$images);
$productModels->update($name, $brand, $price, $desc, $imageNameNw,$newArrayNameImage,$sizesID,$colorsID,$quantities,$categoriesID,$id);
header("location: index.php");
} 



