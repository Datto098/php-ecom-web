<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
  require_once BASE_URL . 'app/models/' . $class . '.php';
});


//khai bao bien
$name;
$brand;
$price;
$categoriesID;
$colorsID;
$sizesID;
$quantities;
$image;
$galleries_image;
$desc;
$productModels = new Product();


$name = (isset($_POST['name'])) ? $_POST['name'] : '';
$brand = (isset($_POST['brand'])) ? $_POST['brand'] : '';
$price = (isset($_POST['price'])) ? $_POST['price'] : 0;
if (isset($_POST['categoriesID'])) {
  $categoriesID = $_POST['categoriesID'];
} else {
  $categoriesID = [];
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


$image = isset($_FILES['image']) ? $_FILES['image'] : '';
if (isset($_FILES['galleries'])) {
  $galleries_image = $_FILES['galleries'];
}
$desc = (isset($_POST['desc'])) ? $_POST['desc'] : 0;
$uploadDirectory = BASE_URL . 'public/storage/';

$array = explode('.', $image['name']);
$imageNameNw = hash('md5', $image['name']). '.' . end($array);
$galleriesNameNw = [];
foreach ($galleries_image['name'] as $item) {
  $array = explode('.', $item);
  $galleriesNameNw[] = hash('md5', $item). '.' . end($array);
}

rename($image['tmp_name'], $uploadDirectory . $imageNameNw);
for ($i = 0; $i < count($galleries_image['tmp_name']); $i++) {
  rename($galleries_image['tmp_name'][$i], $uploadDirectory . $galleriesNameNw[$i]);
}
$productModels->store($name, $brand, $price, $desc, $imageNameNw, $sizesID, $colorsID, $quantities, $galleriesNameNw, $categoriesID);
header("location: index.php");














