<?php
require_once "../../config/database.php";
require_once "../../config/baseurl.php";

// Autoload 
spl_autoload_register(function ($class) {
    require_once BASE_URL . 'app/models/' . $class . '.php';
});

// Get data from request
$request = '_' . $_SERVER['REQUEST_METHOD'];
foreach ($$request as $key => $value) {
    $$key = $value;
}

$conn = new Database();
$category = new Category();
$category_data = $category->getAllCategories();
$template = new Template();



// Thư mục lưu trữ ảnh
$targetDir =  $_SERVER['DOCUMENT_ROOT'] . "/ecom_web_dashboard/uploads/";
echo $targetDir;

var_dump($_FILES);
echo "<br>";
var_dump($_POST);

// Kiểm tra xem thư mục đã tồn tại chưa
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0755, true); // Tạo thư mục nếu chưa tồn tại
}

if (
    !empty($_FILES['product_details_img']['name'][0])
    && !empty($_FILES['product_image'])
    && isset($product_name)
    && isset($product_price)
    && isset($product_brand)
    && isset($product_description)
    && isset($product_color)
    && isset($product_size)
    && isset($product_quantity)
    && isset($category_id)
) {
    echo "Here";
    $product = new Product();

    // Kiểm tra xem có file nào được chọn không
    if (!empty($_FILES['product_image']['name'])) {
        $targetFile = $targetDir . basename($_FILES['product_image']['name']);
        $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);

        // Kiểm tra định dạng ảnh
        if (in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) {
            // Upload file
            move_uploaded_file($_FILES['product_image']['tmp_name'], $targetFile);
            // $product->addProductImage($result, $name);
            echo "File " . $_FILES['product_image']['name'] . "đã được upload thành công.<br>";
        } else {
            echo "File" . $_FILES['product_image']['name'] . "không phải là ảnh hợp lệ.<br>";
        }
    } else {
        echo "Vui lòng chọn ít nhất một file để upload.";
    }


    $result = $product->addProduct(
        $_FILES['product_image']['name'],
        $product_description,
        $product_brand,
        $product_name,
        $product_color,
        $product_size,
        $product_price,
        $product_quantity,
        $category_id
    );

    echo $result;

    // Kiểm tra xem có file nào được chọn không
    if (!empty($_FILES['product_details_img']['name'][0])) {
        // Loop qua từng file
        foreach ($_FILES['product_details_img']['name'] as $key => $name) {
            $targetFile = $targetDir . basename($name);
            $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);

            // Kiểm tra định dạng ảnh
            if (in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) {
                // Upload file
                move_uploaded_file($_FILES['product_details_img']['tmp_name'][$key], $targetFile);
                $product->addProductImage($result, $name);
                echo "File $name đã được upload thành công.<br>";
            } else {
                echo "File $name không phải là ảnh hợp lệ.<br>";
            }
        }
    } else {
        echo "Vui lòng chọn ít nhất một file để upload.";
    }

    if ($result) {
        header('location: ./');
    } else {
        echo "<script>alert('Xảy ra lỗi trong quá trình thực thi , vui lòng thử lại sau');</script>";
    }
}



$data = [
    'title' => 'Thêm sản phẩm mới',
    'slot' => $template->render('blocks/add_product', ['category_data' => $category_data, 'category_menu' => $category->generateMenuHtml($category_data)])
];


$template->view("layout_admin", $data);
