<?php 
class Size extends Database
{

    public function getSizeBySizeModelsId($id)
    {
        $sql = parent::$connection->prepare("select * from sizes where size_models_id = ?");
        $sql->bind_param("i", $id); 
        return parent::select($sql);
    }


    

}