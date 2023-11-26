<div class="container mt-5">
    <div class="row">
        <div class="col-4">

            <div class="border-box-radius mt-5">
                <img class="w-100 mb-5 rounded" style=""
                    src="https://goode.vn/images/stories/virtuemart/product/quan-ao-bong-da.jpg" alt="">
            </div>


            <div class="line"></div>
            <button class="btn btn-primary">Edit details</button>
        </div>




        <div class="col-8">


            <div class="images w-75 d-flex px-3">

                <div class="details">
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
                            <span>
                                <?php echo $product['category_id'] ?>
                            </span>
                        </div>
                    </div>


                    <div class="line"></div>






                </div>

                <div class="row mt-4">
                    <h5 class="title">Attributes</h5>
                    <?php $list_attributes = explode(",", $product['list_attributes']);
                    foreach ($list_attributes as $attributes):

                        ?>
                        <div class="col-6">
                            <div class="attributes d-flex border-box-radius">
                                <div class="color">
                                    <span class="fw-bold">Color : </span>
                                    <span>
                                        <?php echo explode("-", $attributes)[0] ?>
                                    </span>
                                </div>
                                <div class="size">
                                    <span class="fw-bold">Size : </span>
                                    <span>
                                        <?php echo explode("-", $attributes)[1] ?>
                                    </span>
                                </div>
                                <div class="quality">
                                    <span class="fw-bold">Quality</span>
                                    <span>
                                        <?php echo explode("-", $attributes)[2] ?>
                                    </span>
                                </div>

                                <div class="row">

                                    <?php $images = explode(",", $product['images']);
                                    foreach ($images as $image): ?>
                                        <div class="col-6 mb-5">
                                            <div class="image">
                                                <img class="rounded img-fluid w-100" style="height: 100px; object-fit: cover;"
                                                    src="<?php echo explode("~", $image)[1] ?>" alt="">
                                            </div>

                                        </div>

                                    <?php endforeach ?>

                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>

                    <div class="col-6">
                        <button class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>


        </div>
    </div>