<?php

class User extends Database
{
    // public function login($username, $password)
    // {
    //     // Find user account
    //     $userStmt = parent::$connection->prepare("SELECT * FROM users WHERE username = ?");
    //     $userStmt->bind_param("s", $username);
    //     $result = parent::select($userStmt);

    //     // Check password 
    //     if (password_verify($password, $result[0]["password"])) {
    //         // Set cookies 
    //         $data = json_encode($result);
    //         $encrypted_data = encrypt_cookie($data, "secret_key");
    //         setcookie("access_token", $encrypted_data, time() + 3600, "/");
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public function register($username, $password, $email, $fullname, $role = 0)
    // {
    //     return parent::insert("users", array(
    //         "username" => $username,
    //         "password" => password_hash($password, PASSWORD_DEFAULT),
    //         "email" => $email,
    //         "fullname" => $fullname,
    //         "role" => $role
    //     ));
    // }




    //select on
    public function getAllUsers()
    {
        $sql = parent::$connection->prepare("select * from users");
        return parent::select($sql);
    }

    //destroy
    public function destroy($id)
    {
        $sql = parent::$connection->prepare("delete from users where id=?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }

    //store
    public function store($username, $email, $password, $fullname, $role)
    {

        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = parent::$connection->prepare("insert into users (username,email,password,fullname,role) values(?,?,?,?,?)");
        $sql->bind_param("ssssi", $username, $email, $password, $fullname, $role);
        return $sql->execute();
    }


    //select user by id
    public function getUserById($id)
    {
        $sql = parent::$connection->prepare("select * from users where id=?");
        $sql->bind_param("i", $id);
        return parent::select($sql)[0];
    }


    //update
    public function update($username, $email, $password, $fullname, $role, $id)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = parent::$connection->prepare("update users set username=?,email=?,password=?,fullname=?,role=? where id=?");
        $sql->bind_param("ssssii", $username, $email, $password, $fullname, $role, $id);
        return $sql->execute();
    }
}
