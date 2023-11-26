<?php

class Product extends Database
{
   

    

    //get product by id
    public function getProductById($id) {
        

        $sql = parent::$connection->prepare("select products.* ,
        GROUP_CONCAT(product_details.product_color,'-',product_details.product_size,'-',product_details.product_quantity) as 'list_attributes', 
        (select GROUP_CONCAT(product_images.id,'~',product_images.href_value) from product_images WHERE product_images.product_id = products.id) as 'images' from products
        inner join product_details on product_details.product_id = products.id WHERE products.id = ?");
        $sql->bind_param("i", $id); // it nhat la 2 tham so
        return parent::select($sql)[0];

    }

    



    public static function getAllProducts()
    {
        $sql = parent::$connection->prepare("select * from products");
        return parent::select($sql);
    }


    //insert product
    public function addProduct($image,$desc,$brand,$name,$price,$category_id)
    {
        $sql = parent::$connection->prepare("INSERT INTO `products`(`product_img`, 
        `product_desc`, `product_brand`, `product_name`, `product_price`, `category_id`) VALUES (?,?,?,?,?,?)");
        $sql->bind_param("ssssii",$image,$desc,$brand,$name,$price,$category_id);
        $insertedProduct = parent::$connection->insert_id;

        if ($sql->execute())
        {
            return $insertedProduct;
        }
        return -1;
    }

    //insert product details and images

    
}
