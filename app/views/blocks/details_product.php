<div class="container mt-5">
    <div class="row">
                <div class="col-4">
                    <h5 class="name my-4 text-center">
                        <?php echo $product['product_name'] ?>
                    </h5>
                    <p class="desc border-box-radius">
                        <span class="fw-bold">Description : </span>
                        <?php echo $product['product_desc'] ?>
                    </p>
                    <div class="border-box-radius w-50">
                        <div class="brand">
                            <span class="fw-bold">Brand : </span>
                            <span>
                                <?php echo $product['product_brand'] ?>
                            </span>
                        </div>
                        <div class="price">
                            <span class="fw-bold">Price : </span>
                            <span>
                                <?php echo $product['product_price'] ?>
                            </span>
                        </div>
                        <div class="category_id">
                            <span class="fw-bold">Category : </span>
                            <div class="categories-box">
                            <?php $categories = explode(",",$product['categories']) ?>
                            <?php foreach ($categories as $category): ?>
                            <div class="option w-100 form-check" >
                               <span class="d-block"><?php echo explode("-",$category)[1] ?></span>
                            </div>
                        <?php endforeach ?>
                            </div>
                        </div>
                    </div>


                    <div class="line"></div>
                </div>

                <div class="col-8">
                <div class="row mt-4">
                    <h5 class="title">Attributes</h5>
                    <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success"> <?php echo $_SESSION['success']; unset($_SESSION['success']) ?></div>
                    <?php endif ?>
                    <?php
                    foreach ($attributes as $attribute):
                        ?>
                        <div class="col-6">
                            <div class="attributes d-flex border-box-radius">
                                <div class="color">
                                    <span class="fw-bold">Color : </span>
                                    <span>
                                        <?php echo $attribute['product_color'] ?>
                                    </span>
                                </div>
                                <div class="size">
                                    <span class="fw-bold">Size : </span>
                                    <span>
                                        <?php echo $attribute['product_size'] ?>
                                    </span>
                                </div>
                                <div class="quality">
                                    <span class="fw-bold">Quantily</span>
                                    <span>
                                        <?php echo $attribute['product_quantity'] ?>
                                    </span>
                                </div>

                                <div class="row">
                                    <?php $images = explode(",", $attribute['images']);
                                    foreach ($images as $image): ?>
                                        <div class="col-6 mb-5">
                                            <div class="image">
                                                <img class="rounded img-fluid w-100" style="height: 100px; object-fit: cover;"
                                                    src="../../public/img/products/<?php echo explode("~", $image)[1] ?>" alt="">
                                            </div>

                                        </div>

                                    <?php endforeach ?>

                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>

                    <div class="col-6">
                        <form action="../attributes/create.php" method="post">
                            <button type="submit" value="<?php echo $product['id'] ?>" name="product_id" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
                </div>


    </div>