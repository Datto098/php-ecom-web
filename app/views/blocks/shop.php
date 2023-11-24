<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shop</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.php">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search..." />
                            <button type="submit">
                                <span class="icon_search"></span>
                            </button>
                        </form>
                    </div>
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll">
                                                <?php
                                                if (isset($category_parent_data)) {
                                                    foreach ($category_parent_data as $key => $category_parent) { ?>
                                                        <li><a href="#"><?= $category_parent["category_name"] . " ($category_parent[amount_product])" ?></a></li>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__brand">
                                            <ul>
                                                <?php
                                                if (isset($brand_data)) {
                                                    foreach ($brand_data as $key => $brand) { ?>
                                                        <li><a href="#"><?= $brand["brand_name"] ?></a></li>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                </div>
                                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__price">
                                            <ul>
                                                <li><a href="#">100.000đ - 250.000đ</a></li>
                                                <li><a href="#">250.000đ - 500.000đ</a></li>
                                                <li><a href="#">500.000đ - 1.000.000đ</a></li>
                                                <li><a href="#">1.000.000đ +</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                </div>
                                <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__size">
                                            <label for="xs">xs
                                                <input type="radio" id="xs" />
                                            </label>
                                            <label for="sm">s
                                                <input type="radio" id="sm" />
                                            </label>
                                            <label for="md">m
                                                <input type="radio" id="md" />
                                            </label>
                                            <label for="xl">xl
                                                <input type="radio" id="xl" />
                                            </label>
                                            <label for="2xl">2xl
                                                <input type="radio" id="2xl" />
                                            </label>
                                            <label for="xxl">xxl
                                                <input type="radio" id="xxl" />
                                            </label>
                                            <label for="3xl">3xl
                                                <input type="radio" id="3xl" />
                                            </label>
                                            <label for="4xl">4xl
                                                <input type="radio" id="4xl" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseFive">Colors</a>
                                </div>
                                <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__color">
                                            <label class="c-1" for="sp-1">
                                                <input type="radio" id="sp-1" />
                                            </label>
                                            <label class="c-2" for="sp-2">
                                                <input type="radio" id="sp-2" />
                                            </label>
                                            <label class="c-3" for="sp-3">
                                                <input type="radio" id="sp-3" />
                                            </label>
                                            <label class="c-4" for="sp-4">
                                                <input type="radio" id="sp-4" />
                                            </label>
                                            <label class="c-5" for="sp-5">
                                                <input type="radio" id="sp-5" />
                                            </label>
                                            <label class="c-6" for="sp-6">
                                                <input type="radio" id="sp-6" />
                                            </label>
                                            <label class="c-7" for="sp-7">
                                                <input type="radio" id="sp-7" />
                                            </label>
                                            <label class="c-8" for="sp-8">
                                                <input type="radio" id="sp-8" />
                                            </label>
                                            <label class="c-9" for="sp-9">
                                                <input type="radio" id="sp-9" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseSix">Tags</a>
                                </div>
                                <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__tags">
                                            <a href="#">Product</a>
                                            <a href="#">Bags</a>
                                            <a href="#">Shoes</a>
                                            <a href="#">Fashio</a>
                                            <a href="#">Clothing</a>
                                            <a href="#">Hats</a>
                                            <a href="#">Accessories</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <p>Showing 1-12 of 126 results</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__right">
                                <p>Sort by Price:</p>
                                <select>
                                    <option value="">Low To High</option>
                                    <option value="">$0 - $55</option>
                                    <option value="">$55 - $100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    if (!empty($product_data)) { ?>

                        <?php foreach ($product_data as $key => $product) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item sale">
                                    <div class="product__item__pic set-bg" data-setbg="uploads/<?= $product['product_img'] ?>">
                                        <span class="label">Sale</span>
                                        <ul class="product__hover">
                                            <li>
                                                <a href="#"><img src="img/icon/heart.png" alt="" /></a>
                                            </li>
                                            <li>
                                                <a href="#"><img src="img/icon/compare.png" alt="" />
                                                    <span>Compare</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><img src="img/icon/search.png" alt="" /></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><?= $product['product_name'] ?></h6>
                                        <a href="#" class="add-cart">+ Add To Cart</a>

                                        <?php
                                        $averageRate = $product["rates"]["average_rate"];

                                        if ($averageRate != null) {
                                            // Chuyển đổi giá trị trung bình thành số sao
                                            $numStars = round($averageRate);


                                            // Tạo chuỗi HTML dựa trên số sao
                                            $htmlStars = '<div class="rating">';
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $numStars) {
                                                    $htmlStars .= '<i class="fa fa-star"></i>';
                                                } else {
                                                    $htmlStars .= '<i class="fa fa-star-o"></i>';
                                                }
                                            }
                                        } else {
                                            $htmlStars = '<div class="rating">';
                                            for ($i = 1; $i <= 5; $i++) {
                                                $htmlStars .= '<i class="fa fa-star-o"></i>';
                                            }
                                        }

                                        $htmlStars .= '</div>';
                                        // In chuỗi HTML
                                        echo $htmlStars;
                                        ?>
                                        <h5><?= number_format($product['product_price'], 0, ',', '.') . "đ" ?></h5>
                                        <div class="product__color__select">
                                            <label for="pc-7">
                                                <input type="radio" id="pc-7" />
                                            </label>
                                            <label class="active black" for="pc-8">
                                                <input type="radio" id="pc-8" />
                                            </label>
                                            <label class="grey" for="pc-9">
                                                <input type="radio" id="pc-9" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } ?>
                    <?php
                    }
                    ?>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__pagination">
                            <a class="active" href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <span>...</span>
                            <a href="#">21</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->