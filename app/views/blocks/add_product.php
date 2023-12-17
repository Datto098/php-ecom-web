<div class="container" style="display: flex; justify-content: center;">
    <div class="main-content">
        <form id="product-form" method="POST" action="store.php" enctype="multipart/form-data">
            <input type="submit" title="Lưu sản phẩm" value="" />
            <div class="clear-both"></div>
            <div class="wrap-field">
                <label>Name</label>
                <input type="text" name="name" />
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Brand</label>
                <input type="text" name="brand" value="<?= (!empty($product) ? $product['brand'] : "") ?>" />
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Price</label>
                <input type="text" name="price"
                    value="<?= (!empty($product) ? number_format($product['price'], 0, ",", ".") : "") ?>" />
                <div class="clear-both"></div>
            </div>



            <div class="wrap-field">
                <label>Categories</label>
                <div class="row ">
                    <div class="row select">
                        <div class="col-4">
                        <div class="box-select">
                            <?php foreach ($parentCategories as $parentCategory): ?>
                                <div class="option w-100 form-check">
                                    <label for="" class="form-check-label">
                                        <?php echo $parentCategory['category_name'] ?>
                                    </label>
                                    <input class="input-category-id-parent form-check-input" name="categoriesID[]"
                                        type="checkbox" value="<?php echo $parentCategory['id'] ?>">
                                </div>
                            <?php endforeach ?>
                        </div>
                        </div>
                    </div>
                </div>


                <div class="clear-both"></div>
            </div>


            <div class="wrap-field my-3">
                <label>Details</label>
                <div class="row">


                    <!-- MOdels size -->
                    <div class="col-3">
                        <div class="dropdown-model-size">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Models size
                                </button>
                                <ul class="dropdown-menu mt-3">
                                    <div class="select-model-size d-flex justify-content-center flex-column">
                                        <div class="w-100">
                                            <?php foreach ($sizeModels as $sizeModel): ?>
                                                <div class="model-size-item d-flex">
                                                    <label for="">
                                                        <?php echo $sizeModel['name'] ?>
                                                    </label>
                                                    <input class="input-model-size" type="radio"
                                                        value="<?php echo $sizeModel['id'] ?>" class="px-3"
                                                        name="modelSize">
                                                </div>
                                            <?php endforeach ?>


                                            <div class="form-add-size-models mt-4 pt-4" style="border: 1px solid #eee;">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" name="size-model-name"
                                                            placeholder="Name size model" class="input-size-model-name">
                                                    </div>
                                                    <div class="col">
                                                        <span
                                                            class=" px-2 py-2 bg-dark rounded text-white btn-size-model-name"
                                                            style="cursor: pointer;">Them
                                                            moi</span>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="col-7 box-details ">





                        <div class="row ">
                            <div class="col-4">
                                <div class="dropdown-model-size">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Size
                                        </button>
                                        <ul class="dropdown-menu">
                                            <div class="select-model-size d-flex flex-column">
                                                <div class="w-100 input-sizes">

                                                </div>
                                                <span style="cursor: pointer;">Them moi</span>
                                            </div>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                            <div class="col-4">
                                <div class="dropdown-model-size">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Color
                                        </button>
                                        <ul class="dropdown-menu">
                                            <div class="select-model-size d-flex flex-column">
                                                <div class="w-100">
                                                    <?php foreach ($colors as $color): ?>
                                                        <div class="model-size-item d-flex">
                                                            <label for="">
                                                                <?php echo $color['name'] ?>
                                                            </label>
                                                            <input type="checkbox" class="px-3 input-color"
                                                                value="<?php echo $color['id'] ?>">
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>
                                                <span>Them moi</span>
                                            </div>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                            <div class="col-4">
                                <div class="d-flex" style="align-items: center;">
                                    <label class="fs-6">Quantity</label>
                                    <input type="text" class="quantity" style="width: 60px; height: 25px;" value="" />
                                    <div class="clear-both"></div>
                                </div>
                            </div>
                        </div>


                        <!-- data -->
                        <div class="row">
                            <div class="noti-add">

                            </div>
                            <div class="col details-list">
                            </div>
                        </div>

                    </div>

                    <div class="col-2">
                        <div class="func">
                            <div class="fun-item">
                                <button type="button" class="btn btn-primary btn-create-product-details">create</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="clear-both"></div>
            </div>

            <div class="wrap-field">
                <label>Image main : </label>
                <div class="right-wrap-field">
                    <img class="imageMain"
                        src="https://cdn.vectorstock.com/i/preview-1x/65/30/default-image-icon-missing-picture-page-vector-40546530.jpg" /><br />
                    <!-- <input type="hidden" name="image" /> -->
                    <input type="file" name="image" class="input-image" />
                </div>

                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Image details </label>
                <div class="right-wrap-field">
                    <div class="list-image">
                        <div class="row">
                            
                        </div>
                    </div>
                    <!-- <input type="hidden" name="gallery_image[]" /> -->
                    <input multiple="" type="file" name="galleries[]" class="input-gallery" />
                </div>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Description</label>
                <textarea id="product-content" name="desc"></textarea>
                <div class="clear-both"></div>
            </div>


            <button class="btn btn-primary my-5 btnAdd" style="margin-left: 142px;">Add</button>
        </form>
        <div class="clear-both"></div>
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('product-content');
        </script>
    </div>
</div>
</div>

<script>




    //delete item details
    const listDeleteDetails =document.querySelectorAll('.logo-delete');
    console.log(listDeleteDetails)

    //check image

    const imageFileRegex = /\.(jpg|jpeg|png|gif|bmp)$/i;
    const inputImage = document.querySelector('.input-image');
    const imageMain = document.querySelector('.imageMain')
    const inputGalleries = document.querySelectorAll('.input-gallery');

    inputImage.addEventListener('change', function () {
        const file = this.files[0]; // Lấy tệp tin được chọn
        if (file) {
            const fileName = file.name;
            if (imageFileRegex.test(fileName)) {

                //set image when up success
                const imageUrl = URL.createObjectURL(file);
                imageMain.setAttribute('src', imageUrl);
            } else {
                inputImage.value = '';
                alert("File image invalid")
                imageMain.setAttribute('src', 'https://cdn.vectorstock.com/i/preview-1x/65/30/default-image-icon-missing-picture-page-vector-40546530.jpg');
            }
        }
    })



    let notifyNameInvalid = '';
    let dem = 0;
    const listImage =document.querySelector('.list-image > :first-child');
    inputGalleries.forEach(function (inputGallery) {
        inputGallery.addEventListener('change', function (event) {
            const files = event.target.files; // Lấy danh sách các tệp tin được chọn
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const fileName = file.name;
                if (!imageFileRegex.test(fileName)) {
                    notifyNameInvalid += fileName + ","
                    this.value = ""; // Xóa giá trị của input để xóa file không hợp lệ
                    dem++;
                }
                else{
                    listImage.insertAdjacentHTML('beforeend',
                    ` <div class="item-image col-4 mb-3 position-relative">
                            <img src="${URL.createObjectURL(file)}" alt="">
                    </div>`
                    )
                }
            }
        });
    });

    if (dem > 0) {
        alert("File not type image: " + notifyNameInvalid);
        dem = 0;
    }





    const select = document.querySelector('.select');
    function createDataBox(data) {
        data = Array.from(new Set(data.map(JSON.stringify))).map(JSON.parse);
        const box = document.createElement('div');
        box.classList.add('col-4');
        data.forEach(item => {
            let htmlCategoriesBox = `
            <div class="box-select">
                <div class="option w-100 form-check">
                <label for="" class="form-check-label">
                          ${item.category_name}            
                </label>
                <input class="input-category-id form-check-input" name="categoriesID[]" type="checkbox" value="${item.id}">
                </div>
            </div>
            `;
            box.insertAdjacentHTML('beforeend', htmlCategoriesBox);
        });

        // Thêm sự kiện change cho các phần tử input-category-id trong dataBox
        const inputCategoryId = box.querySelectorAll(".input-category-id");
        inputCategoryId.forEach(input => {
            input.addEventListener("change", () => {
                const categoryId = input.value;
                fetchData("./get-category-child.php?id=" + categoryId, "GET").then(data => {

                    if (input.checked) {
                        const dataBox = createDataBox(data);
                        select.appendChild(dataBox);

                    }


                    //delete box-select
                    const formCheckInput = document.querySelectorAll('.form-check-input');
                    formCheckInput.forEach(element => {

                        //addevent
                        element.addEventListener('click', function () {

                            //Lay khoi chua cac input
                            let elementToStartFrom = element.parentNode.parentNode.parentNode
                            console.log(elementToStartFrom)
                            let nextElements = [];

                            // // Lặp qua các phần tử cùng cấp sau elementToStartFrom và đưa vào mảng nextElements
                            while (elementToStartFrom.nextElementSibling) {
                                nextElements.push(elementToStartFrom.nextElementSibling);
                                elementToStartFrom = elementToStartFrom.nextElementSibling;
                            }

                            // Xóa các phần tử trong mảng nextElements
                            // console.log(nextElements)
                            nextElements.forEach(element => {
                                element.remove();
                            });
                        })



                    });
                });
            });
        });

        return box;
    }




    function fetchData(apiUrl, method = 'GET', data = null) {
        const requestOptions = {
            method: method,
            headers: {
                'Content-Type': 'application/json',
            },
            body: data ? JSON.stringify(data) : null,
        };

        return fetch(apiUrl, requestOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Error: ${response.status}`);
                }
                return response.json();
            })
            .catch(error => {
                console.error('Fetch error:', error);
                throw error;
            });
    }

    const inputCategoryId = document.querySelectorAll(".input-category-id-parent");
    inputCategoryId.forEach(input => {
        input.addEventListener("change", () => {
            const categoryId = input.value;
            fetchData("./get-category-child.php?id=" + categoryId, "GET").then(data => {
                const dataBox = createDataBox(data);
                select.appendChild(dataBox);
            })
        })
    });











    //data
    let listDetails = [];
    //create data html product_details
    const btnCreateProductDetails = document.querySelector('.btn-create-product-details');
    btnCreateProductDetails.addEventListener('click', function () {
        const listInputSize = document.querySelectorAll('.input-size');
        const listInputColor = document.querySelectorAll('.input-color');
        const quantity = document.querySelector('.quantity');
        const sizes = [];
        const colors = [];
        listInputSize.forEach(element => {
            if (element.checked) {
                sizes.push({
                    id: element.value,
                    name: element.previousElementSibling.textContent.trim()
                });
            }
        });

        listInputColor.forEach(element => {
            if (element.checked) {
                colors.push({
                    id: element.value,
                    name: element.previousElementSibling.textContent.trim()
                });
            }
        });



        if (sizes.length != 0 && colors.length != 0) {
            for (let i = 0; i < sizes.length; i++) {
                for (let j = 0; j < colors.length; j++) {
                    let product_details = {
                        size: sizes[i],
                        color: colors[j],
                        quantity: quantity.value
                    }
                    listDetails.push(product_details);
                }
            }
        }
        else if (sizes.length == 0 && colors.length != 0) {
            for (let i = 0; i < colors.length; i++) {
                let product_details = {
                    color: colors[i],
                    quantity: quantity.value
                }
                listDetails.push(product_details);
            }
        }
        else if (colors.length == 0 && sizes.length != 0) {
            for (let i = 0; i < sizes.length; i++) {
                let product_details = {
                    size: sizes[i],
                    quantity: quantity.value
                }
                listDetails.push(product_details);
            }
        }
        else {

            let product_details = {
                quantity: quantity.value
            }
            listDetails.push(product_details);
        }


        listDetails = Array.from(new Set(listDetails.map(JSON.stringify))).map(JSON.parse);
        const detailsList = document.querySelector('.details-list');
        detailsList.innerHTML = '';
        detailsList.appendChild(createItemDetails(listDetails))


    })



    //xu ly du lieu cho size
    const inputSizes = document.querySelector('.input-sizes');
    let listInputSize;
    document.addEventListener('change', function (event) {
        const inputModelSize = event.target.closest('.input-model-size');
        if (inputModelSize) {
            let id = inputModelSize.value;
            fetchData("../product_details/get-size.php?id=" + id, "GET").then(data => {
                // Xóa checkbox cũ trước khi thêm mới
                inputSizes.innerHTML = '';
                data.forEach(element => {
                    let htmlInputSize = `
                    <div class="model-size-item d-flex">
                    <label for="">${element.name}</label>
                    <input type="checkbox" class="px-3 input-size" name="modelSize[]" value="${element.id}">
                    </div>
                `;
                    inputSizes.insertAdjacentHTML('beforeend', htmlInputSize);
                });
            });

            listInputSize = document.querySelectorAll('.input-size')
        }
    });






    //
    function createItemDetails(data) {
        const box = document.createElement('div');
        box.classList.add('row');
        data.forEach(element => {
            if (element.hasOwnProperty('size') && element.hasOwnProperty('color')) {
                const htmlBoxItemDetails =
                    `<div class="row">
                        <div class="col-10">
                                        <div class="row">
                                            <div class="col-4 " style="margin-top: 21px;">
                                                <div class="input-item w-100">
                                                    <label class="btn btn-secondary w-100" for="">${element.size.name}</label>
                                                    <input type="hidden" class="w-100" name="sizesID[]" value="${element.size.id}">
                                                </div>
                                            </div>

                                            <div class="col-4" style="margin-top: 21px;">
                                                <div class="input-item w-100">
                                                    <label  for="" class="btn btn-secondary w-100" >${element.color.name}</label>
                                                    <input type="hidden" class="w-100" name="colorsID[]" value="${element.color.id}" >
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="input-item w-100">
                                                    <label for="">Quantity</label>
                                                    <input type="text" class="w-100" name="quantities[]" value="${element.quantity}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="input-item w-100 d-flex mt-4">
                                            <svg class="item_details-logo_del" style="width: 20px; color: red; cursor:pointer;" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>`

                box.insertAdjacentHTML('beforeend', htmlBoxItemDetails);
            }
            else if (element.hasOwnProperty('size') && !(element.hasOwnProperty('color'))) {
                const htmlBoxItemDetails =
                    `<div class="row">
                        <div class="col-10">
                                        <div class="row">

                                            

                                            <div class="col-4 " style="margin-top: 21px;">
                                                <div class="input-item w-100">
                                                    <label class="btn btn-secondary w-100" for="">${element.size.name}</label>
                                                    <input type="hidden" class="w-100" name="sizesID[]" value="${element.size.id}">
                                                </div>
                                            </div>

                                            <div class="col-4" style="margin-top: 21px;">
                                                <div class="input-item w-100">
                                                    <input type="hidden" class="w-100" name="colorsID[]" value="-1" >
                                                </div>
                                            </div>


                                            <div class="col-4">
                                                <div class="input-item w-100">
                                                    <label for="">Quantity</label>
                                                    <input type="text" class="w-100" name="quantities[]" value="${element.quantity}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="input-item w-100 d-flex mt-4">
                                            <svg class="item_details-logo_del" style="width: 20px; color: red; cursor:pointer;" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>`

                box.insertAdjacentHTML('beforeend', htmlBoxItemDetails);
            }
            else if (!(element.hasOwnProperty('size')) && element.hasOwnProperty('color')) {
                const htmlBoxItemDetails =
                    `<div class="row">
                        <div class="col-10">
                                        <div class="row">

                                        <div class="col-4 " style="margin-top: 21px;">
                                                <div class="input-item w-100">
                                                    <input type="hidden" class="w-100" name="sizesID[]" value="-1">
                                                </div>
                                            </div>

                                            <div class="col-4" style="margin-top: 21px;">
                                                <div class="input-item w-100">
                                                    <label  for="" class="btn btn-secondary w-100" >${element.color.name}</label>
                                                    <input type="hidden" class="w-100" name="colorsID[]" value="${element.color.id}" >
                                                </div>
                                            </div>

                                            
                                            <div class="col-4">
                                                <div class="input-item w-100">
                                                    <label for="">Quantity</label>
                                                    <input type="text" class="w-100" name="quantities[]" value="${element.quantity}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="input-item w-100 d-flex mt-4">
                                            <svg class="item_details-logo_del" style="width: 20px; color: red; cursor:pointer;" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>`

                box.insertAdjacentHTML('beforeend', htmlBoxItemDetails);
            }
            else {
                const htmlBoxItemDetails =
                    `<div class="row">
                        <div class="col-10">
                                        <div class="row">

                                        <div class="col-4" style="margin-top: 21px;">
                                                <div class="input-item w-100">
                                                    <input type="hidden" class="w-100" name="colorsID[]" value="-1" >
                                                </div>
                                            </div>

                                            <div class="col-4 " style="margin-top: 21px;">
                                                <div class="input-item w-100">
                                                    <input type="hidden" class="w-100" name="sizesID[]" value="-1">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="input-item w-100">
                                                    <label for="">Quantity</label>
                                                    <input type="text" class="w-100" name="quantities[]" value="${element.quantity}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-item w-100 d-flex mt-4">
                                            <svg class="item_details-logo_del" style="width: 20px; color: red; cursor:pointer;" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>`
                box.insertAdjacentHTML('beforeend', htmlBoxItemDetails);
            }
        }


        );

        //delete item
        box.querySelectorAll('.item_details-logo_del').forEach(element => {
            element.addEventListener('click', function () {
                element.closest('.row').remove();
            });
        });

        return box;


    }


</script>