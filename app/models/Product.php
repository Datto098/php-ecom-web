<?php

class Product extends Database
{
    public static function addProduct(
        $product_img,
        $product_desc,
        $product_brand,
        $product_name,
        $product_color,
        $product_size,
        $product_price,
        $product_quantity,
        $category_id
    ) {
        $createProductResult = parent::insert("products", array(
            "product_name" => $product_name,
            "product_img" => $product_img,
            "product_brand" => $product_brand,
            "product_price" => $product_price,
            "product_desc" => $product_desc,
            "category_id" => $category_id
        ));

        if ($createProductResult) {
            $productStmt = parent::$connection->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 1");
            $product = parent::select($productStmt);
            $productId =  $product[0]['id'];

            $createProductDetailResult = parent::insert("product_details", array(
                "product_color" => $product_color,
                "product_size" => $product_size,
                "product_quantity" => $product_quantity,
                "id" => $productId
            ));

            $producDetailstStmt = parent::$connection->prepare("SELECT * FROM product_details ORDER BY detail_id DESC LIMIT 1");
            $productDetail = parent::select($producDetailstStmt);
            $detailId =  $productDetail[0]['detail_id'];

            if ($createProductDetailResult) {
                return $detailId;
            } else {
                return $createProductDetailResult;
            }
        }

        return $createProductResult;
    }

    public static function addProductImage($productId, $hrefValue)
    {
        parent::insert("product_images", array(
            "id" => $productId,
            "href_value" => $hrefValue
        ));
    }

    public static function getProductById($productId)
    {
        $productStmt = parent::$connection->prepare("SELECT * FROM products WHERE id = ?");
        $productStmt->bind_param("i", $productId);
        $product = parent::select($productStmt);

        if ($product) {
            $imageStmt = parent::$connection->prepare("SELECT * FROM product_images WHERE product_id = ?");
            $imageStmt->bind_param("i", $productId);

            $rateStmt = parent::$connection->prepare("SELECT * FROM rates WHERE product_id = ?");
            $rateStmt->bind_param("i", $productId);

            $detailStmt = parent::$connection->prepare("SELECT * FROM product_details WHERE product_id = ?");
            $detailStmt->bind_param("i", $productId);

        $sql = parent::$connection->prepare("select products.* ,
        GROUP_CONCAT(product_details.product_color,'-',product_details.product_size,'-',product_details.product_quantity) as 'list_attributes', 
        (select GROUP_CONCAT(product_images.id,'~',product_images.href_value) from product_images WHERE product_images.product_id = products.id) as 'images' from products
        inner join product_details on product_details.product_id = products.id WHERE products.id = ?");
        $sql->bind_param("i", $id); // it nhat la 2 tham so
        return parent::select($sql)[0];
            $images = parent::select($imageStmt);
            $rates = parent::select($rateStmt);
            $details = parent::select($detailStmt);

            $product[0]["product_images"] = $images;
            $product[0]["rates"] = $rates;
            $product[0]["details"] = $details;
        }
        return $product[0];
    }


    public static function getProductByCategoryId($categoryId)
    {
        $productStmt = parent::$connection->prepare("SELECT * FROM products WHERE category_id = ?");
        $productStmt->bind_param("i", $categoryId);
        $products = parent::select($productStmt);

        if ($products) {
            foreach ($products as $key => $product) {
                if ($product) {

                    $rates = self::getProductRate($product["id"]);
                    $details = self::getProductDetail($product["id"]);

                    foreach ($details as $index => $detail) {
                        $imageStmt = parent::$connection->prepare("SELECT * FROM product_images WHERE product_id = ?");
                        $imageStmt->bind_param("i", $detail["detail_id"]);
                        $images = parent::select($imageStmt);
                        $products[$key]["details"] = $detail;
                        $products[$key]["details"]["product_detail_image"] = $images;
                    }

                    $products[$key]["rates"] = $rates[0];
                }
            }
            return $products;
        }
    }

    public static function getProductByMainCategoryId($categoryId)
    {
        $categoryStmt = parent::$connection->prepare("SELECT * FROM products WHERE category_id IN (SELECT category_id FROM categories WHERE parent_id IN (SELECT category_id FROM categories WHERE parent_id = ?))");
        $categoryStmt->bind_param("i", $categoryId);
        $products =  parent::select($categoryStmt);

        if ($products) {
            foreach ($products as $key => $product) {
                if ($product) {

                    $rates = self::getProductRate($product["id"]);
                    $details = self::getProductDetail($product["id"]);

                    foreach ($details as $index => $detail) {
                        $imageStmt = parent::$connection->prepare("SELECT * FROM product_images WHERE id = ?");
                        $imageStmt->bind_param("i", $detail["detail_id"]);
                        $images = parent::select($imageStmt);
                        $products[$key]["details"] = $detail;
                        $products[$key]["details"]["product_detail_image"] = $images;
                    }

                    $products[$key]["rates"] = $rates[0];
                }
            }
            return $products;
        }
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
        foreach ($products as $key => $product) {
            if ($product) {

                $rates = self::getProductRate($product["id"]);
                $details = self::getProductDetail($product["id"]);

                foreach ($details as $index => $detail) {
                    $imageStmt = parent::$connection->prepare("SELECT * FROM product_images WHERE product_id = ?");
                    $imageStmt->bind_param("i", $detail["detail_id"]);
                    $images = parent::select($imageStmt);
                    $products[$key]["details"] = $detail;
                    $products[$key]["details"]["product_detail_image"] = $images;
                }

                $products[$key]["rates"] = $rates[0];
            }
        }

        return $products;
    }

    public static function getProductSales()
    {
        $productStmt = parent::$connection->prepare("SELECT products.*, sales.sale_percent FROM products JOIN sales WHERE products.id = sales.id GROUP BY id");
        $products = parent::select($productStmt);

        foreach ($products as $key => $product) {
            if ($product) {

                $rates = self::getProductRate($product["id"]);
                $details = self::getProductDetail($product["id"]);

                foreach ($details as $index => $detail) {
                    $imageStmt = parent::$connection->prepare("SELECT * FROM product_images WHERE product_id = ?");
                    $imageStmt->bind_param("i", $detail["detail_id"]);
                    $images = parent::select($imageStmt);
                    $products[$key]["details"] = $detail;
                    $products[$key]["details"]["product_detail_image"] = $images;
                }

                $products[$key]["rates"] = $rates[0];
            }
      }
}
