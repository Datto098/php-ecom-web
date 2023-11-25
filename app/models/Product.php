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
            $productStmt = parent::$connection->prepare("SELECT * FROM products ORDER BY product_id DESC LIMIT 1");
            $product = parent::select($productStmt);
            $productId =  $product[0]['product_id'];

            $createProductDetailResult = parent::insert("product_details", array(
                "product_color" => $product_color,
                "product_size" => $product_size,
                "product_quantity" => $product_quantity,
                "product_id" => $productId
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
            "product_id" => $productId,
            "href_value" => $hrefValue
        ));
    }

    public static function getProductById($productId)
    {
        $productStmt = parent::$connection->prepare("SELECT * FROM products WHERE product_id = ?");
        $productStmt->bind_param("i", $productId);
        $product = parent::select($productStmt);

        if ($product) {
            $imageStmt = parent::$connection->prepare("SELECT * FROM product_images WHERE product_id = ?");
            $imageStmt->bind_param("i", $productId);

            $rateStmt = parent::$connection->prepare("SELECT * FROM rates WHERE product_id = ?");
            $rateStmt->bind_param("i", $productId);

            $detailStmt = parent::$connection->prepare("SELECT * FROM product_details WHERE product_id = ?");
            $detailStmt->bind_param("i", $productId);

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

                    $rates = self::getProductRate($product["product_id"]);
                    $details = self::getProductDetail($product["product_id"]);

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

                    $rates = self::getProductRate($product["product_id"]);
                    $details = self::getProductDetail($product["product_id"]);

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


    public static function getAllProducts()
    {
        $productStmt = parent::$connection->prepare("SELECT * FROM products");
        $products = parent::select($productStmt);

        foreach ($products as $key => $product) {
            if ($product) {

                $rates = self::getProductRate($product["product_id"]);
                $details = self::getProductDetail($product["product_id"]);

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

    public static function getProductDetail($productId)
    {
        $detailStmt = parent::$connection->prepare("SELECT * FROM product_details WHERE product_id = ?");
        $detailStmt->bind_param("i", $productId);
        return parent::select($detailStmt);
    }

    public static function addRate($productId, $rateValue)
    {
        return parent::insert("rates", array(
            "product_id" => $productId,
            "rate_value" => $rateValue
        ));
    }

    public static function addProductDetail($productId, $productColor, $productSize, $productQuantity)
    {
        return parent::insert("product_details", array(
            "product_id" => $productId,
            "product_color" => $productColor,
            "product_size" => $productSize,
            "product_quantity" => $productQuantity,
        ));
    }

    public static function getProductRate($productId)
    {
        $rateStmt = parent::$connection->prepare("SELECT AVG(rate_value) AS average_rate FROM rates WHERE product_id = ?");
        $rateStmt->bind_param("i", $productId);
        return parent::select($rateStmt);
    }

    public static function getAllProductBrands()
    {
        $brandStmt = parent::$connection->prepare("SELECT product_brand as brand_name FROM products GROUP BY product_brand");
        return parent::select($brandStmt);
    }

    public static function getProductByPriceRange($minPrice, $maxPrice, $categoryId = null)
    {
        $products = array();
        if ($categoryId != null) {
            $productStmt = parent::$connection->prepare("SELECT * FROM products WHERE product_price >=? AND product_price <=? AND category_id = ?");
            $productStmt->bind_param("iii", $minPrice, $maxPrice, $categoryId);
            $products = parent::select($productStmt);
        } else {
            $productStmt = parent::$connection->prepare("SELECT * FROM products WHERE product_price >=? AND product_price <=?");
            $productStmt->bind_param("ii", $minPrice, $maxPrice);
            $products = parent::select($productStmt);
        }

        foreach ($products as $key => $product) {
            if ($product) {

                $rates = self::getProductRate($product["product_id"]);
                $details = self::getProductDetail($product["product_id"]);

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
        $productStmt = parent::$connection->prepare("SELECT products.*, sales.sale_percent FROM products JOIN sales WHERE products.product_id = sales.product_id GROUP BY product_id");
        $products = parent::select($productStmt);

        foreach ($products as $key => $product) {
            if ($product) {

                $rates = self::getProductRate($product["product_id"]);
                $details = self::getProductDetail($product["product_id"]);

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
