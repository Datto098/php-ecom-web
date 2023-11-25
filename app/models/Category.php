<?php


class Category extends Database
{
    public static function addCategory($categoryName, $parentId = NULL)
    {
        if ($parentId != NULL) {
            return parent::insert("categories", array("category_name" => $categoryName, "parent_id" => $parentId));
        } else {
            return parent::insert("categories", array("category_name" => $categoryName));
        }
    }

    public static function getAllCategories()
    {
        $categoryStmt = parent::$connection->prepare("SELECT * FROM categories ORDER BY parent_id");
        $categories = parent::select($categoryStmt);

        foreach ($categories as $key => $category) {
            $result = self::getChildCategories($categories, $category['id']);
            $categories[$key]["child_category"] = $result;
        }

        foreach ($categories as $key => $category) {
            if ($category["parent_id"]) {
                unset($categories[$key]);
            }
        }

        return $categories;
    }

    public static function getChildCategories($categories, $parentId = 0)
    {
        $result = array();
        foreach ($categories as $key => $item) {
            if ($item['parent_id'] == $parentId) {
                $item['child_category'] = self::getChildCategories($categories, $item['id']);
                array_push($result, $item);
            }
        }
        return $result;
    }

    public static function getParentCategoryId()
    {
        $categoryStmt = parent::$connection->prepare("SELECT category_name ,id FROM categories WHERE parent_id IS NULL");
        return parent::select($categoryStmt);
    }



    public static function getAmountProductInCategory($categoryId)
    {
        $categoryStmt = parent::$connection->prepare("SELECT COUNT(*) as amount_product FROM products WHERE id IN (SELECT id FROM categories WHERE parent_id IN (SELECT id FROM categories WHERE parent_id = ?))");
        $categoryStmt->bind_param("i", $categoryId);
        return parent::select($categoryStmt);
    }


    public static function deleteCategoryById($categoryId)
    {
        $sql = "DELETE FROM categories WHERE id = ?";
        $stmt = parent::$connection->prepare($sql);
        $stmt->bind_param("i", $categoryId);
        return $stmt->execute();
    }

    public static function deleteCategoryAndSubcategories($categoryId)
    {
        $subcategoriesStmt = parent::$connection->prepare("SELECT id FROM categories WHERE parent_id = ?");
        $subcategoriesStmt->bind_param("i", $categoryId);
        $subcategoriesStmt->execute();
        $subcategoriesResult = $subcategoriesStmt->get_result();

        $deleteStmt = parent::$connection->prepare("DELETE FROM categories WHERE parent_id = ?");
        $deleteStmt->bind_param("i", $categoryId);
        $successParentDelete = $deleteStmt->execute();

        $deleteStmt = parent::$connection->prepare("DELETE FROM categories WHERE id = ?");
        $deleteStmt->bind_param("i", $categoryId);
        $successCategoryDelete = $deleteStmt->execute();

        while ($row = $subcategoriesResult->fetch_assoc()) {
            $successSubcategoryDelete = self::deleteCategoryAndSubcategories($row['id']);
            if (!$successSubcategoryDelete) {
                return false;
            }
        }

        $subcategoriesStmt->close();
        $deleteStmt->close();

        return $successParentDelete && $successCategoryDelete;
    }



    public static function updateCategoryById($categoryId, $categoryName, $parentId = null)
    {
        if ($parentId != null) {
            $sql = "UPDATE categories SET category_name = ?, parent_id= ? WHERE id = ?";
            $stmt = parent::$connection->prepare($sql);
            $stmt->bind_param("sii", $categoryName, $parentId, $categoryId);
            return $stmt->execute();
        } else {
            $sql = "UPDATE categories SET category_name = ? WHERE id = ?";
            $stmt = parent::$connection->prepare($sql);
            $stmt->bind_param("si", $categoryName, $categoryId);
            return $stmt->execute();
        }
    }

    public static function generateMenuHtml($categories, $indent = 0)
    {
        $html = '';
        foreach ($categories as $category) {
            $html .= str_repeat(' ', $indent * 4) . '<li class="category_selected" data-category-id="' . $category['id'] . '">' . $category['category_name'];
            if (!empty($category['child_category'])) {
                $html .= '<ul class="col">';
                $html .= self::generateMenuHtml($category['child_category'], $indent + 1);
                $html .= '</ul>';
            }
            $html .= '</li>';
        }
        return $html;
    }

    public static function getCategories()
    {
        $categoryStmt = parent::$connection->prepare("SELECT * FROM categories");
        return parent::select($categoryStmt);
    }

    public static function findCategory($valueSearch)
    {
        if (is_numeric($valueSearch)) {
            $categoryStmt = parent::$connection->prepare("SELECT * FROM categories WHERE id = ?");
            $categoryStmt->bind_param("i", $valueSearch);
        } else {
            $valueSearch = "%" . $valueSearch . "%";
            $categoryStmt = parent::$connection->prepare("SELECT * FROM categories WHERE category_name LIKE ?");
            $categoryStmt->bind_param("s", $valueSearch);
        }

        return parent::select($categoryStmt);
    }

    public static function getCategoryById($categoryId)
    {
        $categoryStmt = parent::$connection->prepare("SELECT * FROM categories WHERE id = ?");
        $categoryStmt->bind_param("i", $categoryId);
        return parent::select($categoryStmt);
    }
}
