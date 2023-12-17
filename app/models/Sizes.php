<?php 
class Sizes extends Database
{

    //lay size by model_size_id
    public function getSizeBySizeModelsId($id)
    {

        $sql = parent::$connection->prepare("select * from sizes where size_models_id = ?");
        $sql->bind_param("i", $id); // it nhat la 2 tham so
        return parent::select($sql);

    }

    

}