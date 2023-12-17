<?php 
class SizeModels extends Database
{

    public function getAllSizeModels()
    {
        $sql = parent::$connection->prepare("select * from size_models");
        return parent::select($sql);
    }

    //store
    public function store($name) {
        $sql = parent::$connection->prepare("INSERT INTO `size_models`(`name`) VALUES (?)");
        $sql->bind_param("s",$name);
        return $sql->execute();
    }
}