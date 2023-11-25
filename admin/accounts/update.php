<?php 
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
    require_once BASE_URL .'app/models/' . $class . '.php';
  });

$id;
$username;
$email;
$password;
$fullname;
$role;

if (!empty($_POST['id']))
{
    $id = $_POST['id'];
}


//lay thong tin user cu
$userModels = new User();
$user = $userModels->getUserById($id);


$username = (!empty($_POST['username'])) ? $_POST['username'] : $user['username'];
$email = (!empty($_POST['email'])) ? $_POST['email'] : $user['email'];
$password = (!empty($_POST['password'])) ? $_POST['password'] : $user['password'];
$fullname = (!empty($_POST['fullname'])) ? $_POST['fullname'] : $user['fullname'];
$role = (isset($_POST['role'])) ? $_POST['role'] : $user['role'];




//prosessing update
$userModels->update($username,$email,$password,$fullname,$role,$id);
header('location: index.php');


