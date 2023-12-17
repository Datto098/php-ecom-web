<?php 
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
    require_once BASE_URL .'app/models/' . $class . '.php';
  });

$username;
$email;
$password;
$fullname;
$role;
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['fullname']) && isset($_POST['role']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $role = $_POST['role'];
    $userModels = new User();
    $userModels->store($username,$email,$password,$fullname,$role);
    
}



header('location: index.php');

