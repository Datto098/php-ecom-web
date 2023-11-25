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
  'title' => 'Edit',
  'slot' => $template->render('edit_account', []),
];

$template->view('layout_admin', $data);