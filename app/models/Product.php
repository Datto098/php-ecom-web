<?php

class Product extends Database
{




    //get product by id
    public function getProductById($id)
    {


        $sql = parent::$connection->prepare("
        SELECT 
        products.*, 
        GROUP_CONCAT(DISTINCT CONCAT(sizes.id, ':', sizes.name, '~', colors.id, ':', colors.name, '~', product_details.quantity) SEPARATOR ';') AS product_details,
        GROUP_CONCAT(DISTINCT category_product.category_id) AS categoriesID,
        GROUP_CONCAT(DISTINCT CONCAT(product_images.href_value) SEPARATOR '~') AS galleries_image
        FROM 
        products
        LEFT JOIN 
        product_details ON product_details.product_id = products.id
        LEFT JOIN 
        category_product ON category_product.product_id = products.id
        LEFT JOIN 
        product_images ON product_images.product_id = products.id
        LEFT JOIN 
        sizes ON sizes.id = product_details.size_id
        LEFT JOIN 
        colors ON colors.id = product_details.color_id
        where products.id =?
        GROUP BY 
        products.id;");
        $sql->bind_param("i", $id); // it nhat la 2 tham so
        return parent::select($sql)[0];

    }


    //update
    public function update($name, $brand, $price, $desc, $image, $galleries_image,$sizesID,$colorsID,$quantities,$categoriesID,$id)
    {

        //update product
        $sql = parent::$connection->prepare("
    UPDATE `products` SET `name`=?,`brand`=?,`price`=?,`desc`=?,`image`=?,`updated_at`=? WHERE id = ?
    ");
        $updated_at = date('Y-m-d H:i:s', strtotime("now"));

        $sql->bind_param("ssisssi", $name, $brand, $price, $desc, $image, $updated_at, $id);
        $sql->execute();


        //UPDATE IMAGES
        //B1 : Delete all images
        //B2 : Insert


        //->b1  : 
        $sql = parent::$connection->prepare("
        DELETE FROM `product_images` WHERE product_id = ?
        ");
        $sql->bind_param("i", $id);
        $sql->execute();

            //->b2 : 

            if (count($galleries_image) != 0) {
            $insertedImages = [];
            for ($i = 0; $i < count($galleries_image); $i++) {
                array_push($insertedImages, $galleries_image[$i], $id);
            }
            $values = str_repeat("(?,?),", (count($galleries_image) - 1)) . "(?,?)";
            $type = str_repeat("si", count($galleries_image));
            $sql = parent::$connection->prepare("INSERT INTO `product_images`(`href_value`, `product_id`)
            VALUES $values ");
            $sql->bind_param($type, ...$insertedImages);
            $sql->execute();
        }

        //UPDATE
        //-> b1 : delete

        $sql = parent::$connection->prepare("
        DELETE FROM `product_details` WHERE product_id = ?
        ");
        $sql->bind_param("i",$id);
        $sql->execute();
        //b2 -> insert

        if (!empty($colorsID)) {
        $insertedDetails = [];
        for ($i = 0; $i < count($sizesID); $i++) {
            array_push($insertedDetails, $id, $sizesID[$i], $colorsID[$i], $quantities[$i]);
        }

        $values = str_repeat("(?,?,?,?),", (count($sizesID) - 1)) . "(?,?,?,?)";
        $type = str_repeat("iiii", count($sizesID));

        $sql = parent::$connection->prepare("INSERT INTO `product_details`(`product_id`, `size_id`, `color_id`, `quantity`) 
        VALUES $values ");
        $sql->bind_param($type, ...$insertedDetails);
        $sql->execute();
        }


        //insert categoriesID
        //data
        $sql = parent::$connection->prepare("
        DELETE FROM `category_product` WHERE product_id = ?
        ");
        $sql->bind_param("i", $id);
        $sql->execute();

        //insert
        $insertedCategoriesProduct = [];
        // echo  count($categoriesID);

        for ($i = 0; $i < count($categoriesID); $i++) {
            echo "". $categoriesID[$i] ."<br>";
            array_push($insertedCategoriesProduct, $categoriesID[$i],$id);
        }
        $values = str_repeat("(?,?),", (count($categoriesID) - 1)) . "(?,?)";
        $type = str_repeat("ii", count($categoriesID));
        $sql = parent::$connection->prepare("INSERT INTO `category_product`(`category_id`, `product_id`) VALUES $values");
        $sql->bind_param($type, ...$insertedCategoriesProduct);
        return $sql->execute();

    }


    public static function getAllProducts()
    {
        $sql = parent::$connection->prepare("
        SELECT 
    products.*, 
    GROUP_CONCAT(DISTINCT CONCAT(sizes.id, ':', sizes.name, '~', colors.id, ':', colors.name, '~', product_details.quantity) SEPARATOR ';') AS product_details,
    GROUP_CONCAT(DISTINCT category_product.category_id) AS categoriesID,
    GROUP_CONCAT(DISTINCT CONCAT_WS('~', product_images.id, product_images.href_value)) AS galleries_image
    FROM 
    products
    LEFT JOIN 
    product_details ON product_details.product_id = products.id
    LEFT JOIN 
    category_product ON category_product.product_id = products.id
    LEFT JOIN 
    product_images ON product_images.product_id = products.id
    LEFT JOIN 
    sizes ON sizes.id = product_details.size_id
    LEFT JOIN 
    colors ON colors.id = product_details.color_id
    GROUP BY 
    products.id;
        ");
        return parent::select($sql);
    }



    //get parent categori



    //insert product
    public function store($name, $brand, $price, $desc, $image, $sizesID, $colorsID, $quantities, $galleries_image, $categoriesID)
    {
        //insert products
        $image = date('Y-m-d') . '/' . $image;
        $sql = parent::$connection->prepare("INSERT INTO `products`(`name`, `brand`, `price`, `desc`, `image`)
         VALUES (?,?,?,?,?)");
        $sql->bind_param("ssiss", $name, $brand, $price, $desc, $image);
        $sql->execute();



        //insert product_details
        $product_id = parent::$connection->insert_id;

        //insert categoriesID
        //data
        $insertedCategoriesProduct = [];

        for ($i = 0; $i < count($categoriesID); $i++) {
            array_push($insertedCategoriesProduct, $categoriesID[$i], $product_id);
        }

        $values = str_repeat("(?,?),", (count($categoriesID) - 1)) . "(?,?)";
        $type = str_repeat("ii", count($categoriesID));
        $sql = parent::$connection->prepare("INSERT INTO `category_product`(`category_id`, `product_id`) VALUES $values");
        $sql->bind_param($type, ...$insertedCategoriesProduct);
        $sql->execute();




        //insert details product
        //data
        $insertedDetails = [];
        for ($i = 0; $i < count($sizesID); $i++) {
            array_push($insertedDetails, $product_id, $sizesID[$i], $colorsID[$i], $quantities[$i]);
        }

        $values = str_repeat("(?,?,?,?),", (count($sizesID) - 1)) . "(?,?,?,?)";
        $type = str_repeat("iiii", count($sizesID));

        $sql = parent::$connection->prepare("INSERT INTO `product_details`(`product_id`, `size_id`, `color_id`, `quantity`) 
        VALUES $values ");
        $sql->bind_param($type, ...$insertedDetails);
        $sql->execute();



        //insert product_images
        $insertedImages = [];
        for ($i = 0; $i < count($galleries_image); $i++) {
            array_push($insertedImages, ($galleries_image[$i] != null ? date('Y-m-d') . '/' . $galleries_image[$i] : ''), $product_id);
        }

        $values = str_repeat("(?,?),", (count($galleries_image) - 1)) . "(?,?)";
        $type = str_repeat("si", count($galleries_image));
        $sql = parent::$connection->prepare("INSERT INTO `product_images`(`href_value`, `product_id`)
        VALUES $values ");
        $sql->bind_param($type, ...$insertedImages);
        return $sql->execute();

    }



    //destroy
    public function destroy($id)
    {

        //delete product_images first
        $sql = parent::$connection->prepare("DELETE FROM product_images WHERE product_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();

        //delete product_details next
        $sql = parent::$connection->prepare("DELETE FROM product_details WHERE product_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();

        //delete category_product next
        $sql = parent::$connection->prepare("DELETE FROM category_product WHERE product_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();

        //delete products last
        $sql = parent::$connection->prepare("DELETE FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }



}
