<?php 
class ProductDetails extends Database
{



    public function store($name,$brand,$price,$desc,$image,$sizesID,$colorsID,$quantities,$gallery_image)
    {
        //insert products
        $sql = parent::$connection->prepare("INSERT INTO `products`(`name`, `brand`, `price`, `desc`, `image`)
         VALUES (?,?,?,?,?)");
        $sql->bind_param("ssiss",$name,$brand,$price,$desc,$image);
        $sql->execute();


        //insert product_details
        $product_id = parent::$connection->insert_id;
        

        //data
        $insertedDetails = [];

        for ($i = 0; $i < count($sizesID); $i++) {
            array_push($insertedDetails,$product_id,$sizesID[$i],$colorsID[$i],$quantities[$i]);
        }

        $values = str_repeat("(?,?,?,?),", (count($sizesID) -1)) . "(?,?,?,?)";
        $type = str_repeat("iiii",count($sizesID));

        $sql = parent::$connection->prepare("INSERT INTO `product_details`(`product_id`, `size_id`, `color_id`, `quantity`) 
        VALUES $values ");
        $sql->bind_param($type, ... $insertedDetails);
        $sql->execute();



        //insert product_images
        $insertedImages = [];
        for ($i = 0; $i < count($gallery_image); $i++) {
            array_push($insertedImages,$gallery_image[$i],$product_id);
        }

        $values = str_repeat("(?,?),", (count($gallery_image) -1)) . "(?,?,?,?)";
        $type = str_repeat("si",count($gallery_image));
        $sql = parent::$connection->prepare("INSERT INTO `product_images`(`href_value`, `product_id`)
        VALUES $values ");
        $sql->bind_param($type, ... $insertedImages);
        return $sql->execute();

    }


    //get

}