<?php


class Category extends Database
{
    public static function addCategory($categoryName, $parentId = NULL)
    {
        if ($parentId === NULL) {
            parent::insert("categories", array("category_name" => $categoryName));
        } else {
            parent::insert("categories", array("category_name" => $categoryName, "parent_id" => $parentId));
        }
    }

    public static function getAllCategories()
    {
        $categoryStmt = parent::$connection->prepare("SELECT * FROM categories ORDER BY parent_id");
        $categories = parent::select($categoryStmt);

        foreach ($categories as $key => $category) {
            $result = self::getChildCategories($categories, $category['category_id']);
            $categories[$key]["child_category"] = $result;
        }

        foreach ($categories as $key => $category) {
            if ($category["parent_id"]) {
                unset($categories[$key]);
            }
        }

        return $categories;
    }

    public static function getChildCategories($categories, $parent_id = 0)
    {
        $result = array();
        foreach ($categories as $key => $item) {
            if ($item['parent_id'] == $parent_id) {
                $item['child_category'] = self::getChildCategories($categories, $item['category_id']);
                array_push($result, $item);
            }
        }
        return $result;
    }

    public static function getParentCategoryId()
    {
        $categoryStmt = parent::$connection->prepare("SELECT category_name ,category_id FROM categories WHERE parent_id IS NULL");
        return parent::select($categoryStmt);
    }



    public static function getAmountProductInCategory($categoryId)
    {
        $categoryStmt = parent::$connection->prepare("SELECT COUNT(*) as amount_product FROM products WHERE category_id IN (SELECT category_id FROM categories WHERE parent_id IN (SELECT category_id FROM categories WHERE parent_id = ?))");
        $categoryStmt->bind_param("i", $categoryId);
        return parent::select($categoryStmt);
    }


    public static function deleteCategoryById($categoryId)
    {
        $sql = "DELETE FROM categories WHERE category_id = ?";
        $stmt = parent::$connection->prepare($sql);
        $stmt->bind_param("i", $categoryId);
        return $stmt->execute();
    }

    public static function updateCategoryById($categoryId, $categoryName)
    {
        $sql = "UPDATE categories SET category_name = ? WHERE category_id = ?";
        $stmt = parent::$connection->prepare($sql);
        $stmt->bind_param("si", $categoryName, $categoryId);
        return $stmt->execute();
    }

    public static function generateMenuHtml($categories, $indent = 0)
    {
        $html = '';
        foreach ($categories as $category) {
            $html .= str_repeat(' ', $indent * 4) . '<li class="category_selected" data-category-id="' . $category['category_id'] . '">' . $category['category_name'];
            if (!empty($category['child_category'])) {
                $html .= '<ul class="col">';
                $html .= self::generateMenuHtml($category['child_category'], $indent + 1);
                $html .= '</ul>';
            }
            $html .= '</li>';
        }
        return $html;
    }
}
