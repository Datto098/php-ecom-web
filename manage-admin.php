<?php
require_once "./config/database.php";
require_once "./config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
  require_once './app/models/' . $class . '.php';
});

$conn = new Database();
$template = new Template();

$data = [
  'title' => 'Manage Ecom',
//   'slot' => $template->render('layout_admin', []),
];

$template->view('layout_admin', $data);
