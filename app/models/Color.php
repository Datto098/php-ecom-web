<?php 
class Color extends Database
{

    public function getAllColors()
    {
        $sql = parent::$connection->prepare("select * from colors where id != -1");
        return parent::select($sql);
    }

    public function store($name){
        $sql = parent::$connection->prepare("insert into colors (name) value (?)");
        $sql->bind_param("s", $name);
        $sql->execute();
    }

    public function update($name,$id){
        $sql = parent::$connection->prepare("update colors set name = ? where id =?");
        $sql->bind_param("si", $name,$id);
        $sql->execute();
    }


}