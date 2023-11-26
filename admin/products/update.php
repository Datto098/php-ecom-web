<?php 
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
    require_once BASE_URL .'app/models/' . $class . '.php';
  });

$images = $_FILES['images'];

foreach ($images['name'] as $image) {
    if ($image != null) {
        
    }
}

