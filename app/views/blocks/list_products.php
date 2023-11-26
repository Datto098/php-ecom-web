<div class="container-fluid">
        <div class="main row mt-4">
                <div class="manager">
                        <div class="w-100 d-flex justify-content-between align-items-center py-4">
                                <form class="search" action="FindCategory" method="get">
                                        <div class="row py-1 px-1">
                                                <div class="col-10 ">
                                                        <input type="text" name="name" id="search" placeholder="Search"
                                                                class="border-0 form-control">
                                                </div>
                                                <div class="col-2">
                                                        <button class="bg-white border-0" type="submit">
                                                                <svg style="width: 30px;"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor" class="w-6 h-6">
                                                                        <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                                                </svg>
                                                        </button>
                                                </div>
                                        </div>
                                </form>
                                <div>
                                        <a class="button btn btn-user-add" style="background-color: #9055fd;"
                                                href="create.php">Add
                                                Product</a>
                                </div>
                        </div>
                </div>



                <div class="table w-100">
                <table class="w-100">
                        <thead class="bg-light text-dark ">
                                <th>id</th>
                                <th>description</th>
                                <th>brand</th>
                                <th>name</th>
                                <th>price</th>
                                <th>category_id</th>
                                <th>action</th>
                        </thead>
                        <tbody>

                                <?php foreach($products as $product): ?>
                                <tr>
                                        <td class="py-2 px-2"><?php echo $product['id'] ?></td>
                                        
                                        <td class="py-2 px-2" >
                                        <div style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; width: 150px;">
                                        <?php echo $product['product_desc'] ?>
                                        </div>
                                    </td>
                                        <td class="py-2 px-2"><?php echo $product['product_brand'] ?></td>
                                        <td class="py-2 px-2"><?php echo $product['product_name'] ?></td>
                                        <td class="py-2 px-2"><?php echo $product['product_price'] ?></td>
                                        <td class="py-2 px-2"><?php echo $product['category_id'] ?></td>
                                       

                                        <td>
                                                <div class="d-flex">
                                                        <a class="btn btn-primary me-3" href="edit.php?id=<?php echo $user['id'] ?>">Edit</a>
                                                        <a class="btn btn-danger me-3" href="destroy.php?id=<?php echo $user['id'] ?>"
                                                                onclick="return deleteCommit();">Delete</a>
                                                        <a class="btn btn-secondary me-3" href="show.php?id=<?php echo $product['id'] ?>"
                                                                >Details</a>
                                                </div>
                                        </td>

                                </tr>
                                <?php endforeach ?>

                        </tbody>
                </table>
                </div>

        </div>