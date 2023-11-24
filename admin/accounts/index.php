<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
  require_once BASE_URL .'app/models/' . $class . '.php';
});

$conn = new Database();
$template = new Template();

$data = [
  'title' => 'Manage Ecom',
  'slot' => $template->render('list_account', []),
];

$template->view('layout_admin', $data);
