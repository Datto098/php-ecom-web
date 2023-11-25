<div class="container-fluid">
    <div class="main row mt-4">
        <div class="overlay"></div>
        <div class="manager">
            <div class="w-100 d-flex justify-content-between align-items-center py-4">
                <form class="search" action="" method="get">
                    <div class="row py-1 px-1">
                        <div class="col-10">
                            <input type="text" name="search" id="search" placeholder="Search" class="border-0 form-control" />
                        </div>
                        <div class="col-2 d-flex aligns-item-center justify-content-center cursor-pointer">
                            <button class="bg-white border-0" type="submit">
                                <svg style="width: 30px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
                <div>
                    <button class="button btn btn_add_category text-white btn-primary" onclick="clickButtonToOn()">
                        Add new category
                    </button>
                </div>
            </div>
        </div>
        <div class="p-3 w-100">
            <table class="w-100">
                <thead class="bg-dark text-white">
                    <th>Category Id</th>
                    <th>Category Name</th>
                    <th>Parent Id</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    if (isset($category_data)) {
                        foreach ($category_data as $key =>
                            $category) { ?>
                            <tr>
                                <td class="py-2"><?= $category["category_id"] ?></td>
                                <td class="py-2"><?= $category["category_name"] ?></td>
                                <td class="py-2"><?= $category["parent_id"] != null ? $category["parent_id"] : "Supper Category" ?></td>
                                <td>
                                    <div class="">
                                        <button class="btn btn-primary" data-edit="<?= $category["category_id"] ?>">Edit</button>
                                        <a class="btn btn-danger" href="./delete.php?id=<?= $category["category_id"] ?>" onclick="return deleteCommit();">Delete</a>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="form-edit">
            <button class="btn_close_form">
                <ion-icon name="close-outline"></ion-icon>
            </button>
            <form method="post" action="./edit.php">
                <h3 class="text-center mb-3">Edit category</h3>
                <input type="text" class="form-control" id="category_id" name="category_id" hidden>
                <div class="mb-3">
                    <label for="category_name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name">
                </div>
                <div class="mb-3">
                    <label for="parent_id" class="form-label">Parent Category Id</label>
                    <input type="text" class="form-control" id="parent_id" name="parent_id">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>

        <div class="form-create">
            <button class="btn_close_form">
                <ion-icon name="close-outline"></ion-icon>
            </button>
            <form method="post" action="./create.php">
                <h3 class="text-center mb-3">Create category</h3>
                <div class="mb-3">
                    <label for="category_name" class="form-label">*Category Name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name">
                </div>
                <input type="text" class="form-control" id="parent_id" name="parent_id" hidden>
                <label class="mb-2">*Select Parent Category</label>
                <div class="select_category">
                    <?php
                    foreach ($category_data as $key => $category) { ?>
                        <label for="input_category_id_<?= $category['category_id'] ?>">
                            <input type="radio" name="parent_id" id="input_category_id_<?= $category['category_id'] ?>" value="<?= $category['category_id'] ?>">
                            <?= $category['category_name'] ?>
                        </label>
                    <?php
                    }
                    ?>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Create</button>
            </form>
        </div>
    </div>
</div>

<script>
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

    const formEdit = document.querySelector(".form-edit");
    const overlay = document.querySelector(".overlay");
    const inputCategoryId = document.querySelector("#category_id");
    const inputCategoryName = document.querySelector("#category_name");
    const inputParentId = document.querySelector("#parent_id");
    const btnEditCategory = document.querySelectorAll("[data-edit]");
    const apiUrl = './get-category.php';
    const btnCloseForm = document.querySelectorAll(".btn_close_form")
    const label = document.querySelector(`label[for="${inputParentId.id}"]`);
    const btnAddCategory = document.querySelector(".btn_add_category");
    const formCreate = document.querySelector(".form-create");

    btnAddCategory.addEventListener("click", (e) => {
        e.preventDefault();
        overlay.classList.add("active");
        formCreate.classList.add("active");
    })

    btnEditCategory.forEach((btn, index) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            const idEdit = btn.getAttribute("data-edit");
            fetchData(apiUrl + "?id=" + idEdit, "GET")
                .then(data => {
                    const category = data[0];
                    inputCategoryId.value = category.category_id;
                    inputCategoryName.value = category.category_name;
                    if (category.parent_id != null) {
                        inputParentId.value = category.parent_id;
                        inputParentId.removeAttribute("hidden");
                        label.style.display = 'block';

                    } else {
                        label.style.display = 'none';
                        inputParentId.setAttribute("hidden", true);
                    }
                    overlay.classList.add("active");
                    formEdit.classList.add("active");
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        })
    })

    btnCloseForm.forEach(btn => {
        btn.addEventListener("click", (e) => {
            overlay.classList.remove("active");
            btn.parentElement.classList.remove("active");
        })
    })
</script>