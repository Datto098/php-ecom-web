<div class="admin_page p-4 w-100 h-100">

    <div class="header d-flex align-items-center justify-content-between w-100">
        <a class="btn btn-primary" href="#" role="button">quit</a>
        <div class="card">
            <div class="card-body">
                Trang thêm sản phẩm mới
            </div>
        </div>
    </div>

    <form method="post" enctype="multipart/form-data">
        <div class="row gap-3">
            <div class="col">
                <div class="mb-3">
                    <label for="product_name" class="form-label">id</label>
                    <input type="text" class="form-control" id="product_name" name="product_name">
                </div>
                <div class="mb-3">
                    <label for="product_name" class="form-label">product_name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name">
                </div>
                <div class="mb-3">
                    <label for="product_brand" class="form-label">product_brand</label>
                    <input type="text" class="form-control" id="product_brand" name="product_brand">
                </div>
                <div class="mb-3">
                    <label for="product_price" class="form-label">product_price</label>
                    <input type="number" class="form-control" id="product_price" name="product_price">
                </div>
                <div class="form-floating mb-3">
                    <label for="product_description"></label>
                    <textarea class="form-control" id="product_description" name="product_description"
                        style="height: 100px"></textarea>
                </div>
                <div class="box_upload">
                    <label for="product_img">
                        <ion-icon name="cloud-upload-outline"></ion-icon>
                        <span class="py-3 px-2 rounded" style="border: 1px solid #eee;">
                            Ảnh chi tiết của sản phẩm
                        </span>
                        <input name="product_image" type="file" accept="image/*" hidden id="product_img" />
                    </label>
                </div>
            </div>

            <div class="col">
                <div class="row">
                    <div class="col-4 mb-4">
                        <div class="product_attributes">
                            <div class="mb-3">
                                <label for="product_color" class="form-label">Màu sắc</label>
                                <input type="text" class="form-control" id="product_color" name="product_color">
                            </div>
                            <div class="mb-3">
                                <label for="product_size" class="form-label">Kích cỡ</label>
                                <input type="text" class="form-control" id="product_size" name="product_size">
                            </div>
                            <div class="mb-3">
                                <label for="product_quantity" class="form-label">Số lượng</label>
                                <input type="number" class="form-control" id="product_quantity" name="product_quantity">
                            </div>

                            <div class="box_upload">
                                <label for="product_details_img">
                                    <ion-icon name="cloud-upload-outline"></ion-icon>
                                    <span>
                                        Ảnh chi tiết của sản phẩm
                                    </span>
                                    <input name="product_details_img[]" type="file" id="product_details_img" multiple
                                        accept="image/*" hidden />
                                </label>
                            </div>
                        </div>
                    </div>

                    


                    
                </div>
            </div>
        </div>
        <ul class="mt-3 row">
            <div class="d-flex category_menu_select">
                <input type="text" name="category_id" class="input_category_id" hidden>
                <?php
                if (!empty($category_menu)) {
                    echo $category_menu;
                }
                ?>
            </div>
        </ul>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
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