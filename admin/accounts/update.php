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

if (isset($_POST['id']))
{
    $id = $_POST['id'];
}


//lay thong tin user cu
$userModels = new User();
$user = $userModels->getUserById($id);

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['fullname']) && isset($_POST['role_id']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $role = $_POST['role_id'];
    //prosessing update
    if ($userModels->update($username,$email,$password,$fullname,$role,$id)){
      header('location: index.php');
    }
}






