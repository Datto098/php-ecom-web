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


//prosessing

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




// Đường dẫn thư mục uploads
$uploadDirectory = BASE_URL . 'public/img/products/' . date('Y-m-d') . '/';
// Tạo thư mục theo ngày nếu chưa tồn tại
if (!file_exists($uploadDirectory)) {
  mkdir($uploadDirectory, 0777, true);

}

move_uploaded_file($image['tmp_name'], $uploadDirectory . $image['name']);
for ($i = 0; $i < count($galleries_image['tmp_name']); $i++) {
  move_uploaded_file($galleries_image['tmp_name'][$i], $uploadDirectory . $galleries_image['name'][$i]);
}


if ($productModels->store($name, $brand, $price, $desc, $image['name'], $sizesID, $colorsID, $quantities, $galleries_image['name'], $categoriesID)) {
  $_SESSION['notify'] = "Update product success";
  $_SESSION["alert"] = "alert-success";
} else {
  $_SESSION['notify'] = "Update product fail";
  $_SESSION["alert"] = "alert-danger";

}

header("location: index.php");














