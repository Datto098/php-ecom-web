<?php 
class Colors extends Database
{

    public function getAllColors()
    {
        $sql = parent::$connection->prepare("select * from colors where id != -1");
        return parent::select($sql);
    }
}