<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
    require_once BASE_URL . 'app/models/' . $class . '.php';
});

// // Get data from request
// $request = '_' . $_SERVER['REQUEST_METHOD'];
// foreach ($$request as $key => $value) {
//     $$key = $value;
// }
$template = new Template();

$data = [
    'title' => 'Edit',
    'slot' => $template->render('edit_product', []),
  ];
  
  $template->view('layout_admin', $data);