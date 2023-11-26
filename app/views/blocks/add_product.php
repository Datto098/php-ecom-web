<div class="admin_page p-4 w-100 h-100">

    <div class="header d-flex align-items-center justify-content-between w-100">
        <a class="btn btn-primary" href="#" role="button">Trở về</a>
        <div class="card">
            <div class="card-body">
                Trang thêm sản phẩm mới
            </div>
        </div>
    </div>

    <div class="container">
    <form action="store.php" method="post" enctype="multipart/form-data">
        <div class="row gap-3">
            <div class="col">
                <div class="mb-3">
                    <label for="product_name" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="product_name" name="product_name">
                </div>
                <div class="mb-3">
                    <label for="product_brand" class="form-label">Thương hiệu</label>
                    <input type="text" class="form-control" id="product_brand" name="product_brand">
                </div>
                <div class="mb-3">
                    <label for="product_price" class="form-label">Giá</label>
                    <input type="number" class="form-control" id="product_price" name="product_price">
                </div>
                <div class="form-floating mb-3">
                    <label for="product_description">Mô tả</label>
                    <textarea class="form-control" placeholder="Nhập mô tả sản phẩm" id="product_description" name="product_description" style="height: 100px"></textarea>
                </div>
                <div class="box_upload">
                    <label for="product_img">
                        <ion-icon name="cloud-upload-outline"></ion-icon>
                        <span class="py-3 px-3 rounded mt-3 d-inline-block" style="cursor: pointer; font-weight: bold; border: 1px solid #eee;">
                            Ảnh chi tiết của sản phẩm
                        </span>
                        <input name="product_image" type="file" accept="image/*" hidden id="product_img" />
                    </label>
                </div>
            </div>
        </div>
        <ul class="mt-3 row">
            <div class="d-flex category_menu_select">
            
                <?php foreach($categories as $category) : ?>
               <div class="category_item">
                <label for=""><?php echo $category['category_name'] ?></label>
                <input type="checkbox" value="<?php echo $category['id'] ?>">
               </div>
               <?php endforeach ?>
            </div>
        </ul>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
    </div>
</div>

<script>
    const inputCategoryId = document.querySelector(".input_category_id");
    const categories = document.querySelectorAll("[data-category-id]");
    let prev;
    categories.forEach(e => {
        e.addEventListener("click", (event) => {
            event.stopPropagation();
            if (prev) {
                prev.classList.remove("category_select");
            }
            prev = e;
            e.classList.add("category_select")
            inputCategoryId.value = e.getAttribute("data-category-id");
            console.log(inputCategoryId.value);
        })
    })
</script>