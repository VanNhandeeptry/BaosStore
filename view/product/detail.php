   <style>
    .tvgh{
        margin-top: 10px;
    }
   </style> 
    <?php
    $sql = "select * from product where id <>" . $_GET['idsp'] . " and id_cate ='.$id_cate.' LIMIT 4";
    $spcungloais = pdo_query($sql);



    ?>

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <?php
                extract($onesp); //gọi thẳng tên trường field trong database
                $hinh = $img_path . $image;
                echo '
                        <div id="product-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner border">
                                <div class="carousel-item active">
                                    <img class="w-100 h-100" src="' . $hinh . '" alt="Image">
                                </div>
                            </div>
                        </div>
                    ';
                ?>
                <!-- <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="img/product-1.jpg" alt="Image">
                        </div>
                    </div>
                </div> -->
            </div>
            <?php
            extract($onesp); //gọi thẳng tên trường field trong database
            echo '
                    <div class="col-lg-7 pb-5">
                        <h3 class="font-weight-semi-bold">' . $name . '</h3>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star-half-alt"></small>
                                <small class="far fa-star"></small>
                            </div>
                            <small class="pt-1">(50 Reviews)</small>
                        </div>
                        <h3 class="font-weight-semi-bold mb-4">$' . $price . '</h3>
                        <p class="mb-4">' . $chatlieu . '</p>
                        <div class="d-flex mb-3">
                            <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                            <form>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-1" name="size">
                                    <label class="custom-control-label" for="size-1">36</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-2" name="size">
                                    <label class="custom-control-label" for="size-2">37</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-3" name="size">
                                    <label class="custom-control-label" for="size-3">38</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-4" name="size">
                                    <label class="custom-control-label" for="size-4">39</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-5" name="size">
                                    <label class="custom-control-label" for="size-5">40</label>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex mb-4">
                            <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                            <form>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-1" name="color">
                                    <label class="custom-control-label" for="color-1">Black</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-2" name="color">
                                    <label class="custom-control-label" for="color-2">White</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-3" name="color">
                                    <label class="custom-control-label" for="color-3">Red</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-4" name="color">
                                    <label class="custom-control-label" for="color-4">Blue</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-5" name="color">
                                    <label class="custom-control-label" for="color-5">Green</label>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex align-items-center mb-4 pt-2">
                        <form action="index.php?act=addtocart" method="post">
                            <div class="input-group quantity mr-3" style="width: 130px;">
                                <div class="input-group-btn">
                                    <button  type="button" class="btn btn-primary btn-minus" >
                                    <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" name="quanlity" class="form-control bg-secondary text-center" value="1">
                                <div class="input-group-btn">
                                    <button  type="button" class="btn btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        
                            <div>
                                <input type="hidden" name="id" value="' . $id . '">
                                <input type="hidden" name="name" value="' . $name . '">
                                <input type="hidden" name="img" value="' . $image . '">
                                <input type="hidden" name="price" value="' . $price . '">
                                <input type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="btn btn-primary px-3 tvgh">
                            </div>
                        </form>
                           
                        </div>
                        <div class="d-flex pt-2">
                            <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                            <div class="d-inline-flex">
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                ';
            ?>
            <!-- <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">Colorful Stylish Shirt</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">$150.00</h3>
                <p class="mb-4">Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.</p>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-1" name="size">
                            <label class="custom-control-label" for="size-1">XS</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-2" name="size">
                            <label class="custom-control-label" for="size-2">S</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-3" name="size">
                            <label class="custom-control-label" for="size-3">M</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-4" name="size">
                            <label class="custom-control-label" for="size-4">L</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-5" name="size">
                            <label class="custom-control-label" for="size-5">XL</label>
                        </div>
                    </form>
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-1" name="color">
                            <label class="custom-control-label" for="color-1">Black</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-2" name="color">
                            <label class="custom-control-label" for="color-2">White</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-3" name="color">
                            <label class="custom-control-label" for="color-3">Red</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-4" name="color">
                            <label class="custom-control-label" for="color-4">Blue</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-5" name="color">
                            <label class="custom-control-label" for="color-5">Green</label>
                        </div>
                    </form>
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <!-- <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a> -->
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <?php
                        extract($onesp); //gọi thẳng tên trường field trong database
                        echo '
                            <h4 class="mb-3">Chi tiết sản phẩm ' . $name . '</h4>
                            <p>' . $description . '</p>
                            ';
                        ?>
                        <!-- <h4 class="mb-3">Chi tiết sản phẩm</h4>
                        <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                        <p>Dolore magna est eirmod sanctus dolor, amet diam et eirmod et ipsum. Amet dolore tempor consetetur sed lorem dolor sit lorem tempor. Gubergren amet amet labore sadipscing clita clita diam clita. Sea amet et sed ipsum lorem elitr et, amet et labore voluptua sit rebum. Ea erat sed et diam takimata sed justo. Magna takimata justo et amet magna et.</p> -->
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Additional Information</h4>
                        <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                                <div class="media mb-4">
                                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>

                                        <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <form>
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <!-- show comment -->
    <div class="container-fluid py-5">
        <h2 class="text-center">Bình Luận</h2>
        <div class="col-md-12 d-flex border border-primary rounded border-4">

            <div class="col-md-6 p-3">
                <?php
                $showcomment = showcomment($id);
                if (!empty($showcomment)) :

                    foreach ($showcomment as $comment) :

                ?>
                        <div class="col-md-5 bo">
                            <div class="media-body mb-4 border-bottom border-danger">
                                <h6><?= $comment[13] ?></h6>
                                <small><?= $comment['date_comment'] ?></small>
                                <p><?= $comment['noi_dung'] ?></p>
                            </div>

                        </div>
                        <?php
                        $showprofile = getprofile($comment['id']);
                        if (!empty($showprofile)) :
                            foreach ($showprofile as $profile) :
                                if (isset($_SESSION['user'])) {
                                    if ($_SESSION['user']['id'] == $profile['id']) {
                                        echo '<a class="xoa_btn btn btn-danger mb-3" href="index.php?act=deletecmt&idproduct=' . $comment['id_bl'] . '&idprofile=' . $comment['id_product'] . '"> Xóa</a>';
                                    }
                                }
                        ?>
                        <?php endforeach;
                        endif ?>

                <?php endforeach;
                endif ?>
            </div>
            <!-- bình luận -->
            <div class="col-md-6 p-3">
                <form action="index.php?act=comment&id=<?= $id ?>" method="post">
                    <h4>Để Lại Bình Luận Của Bạn</h4>
                    <div>
                        <textarea name="comment" id="" cols="60" rows="10"></textarea>
                    </div>
                    <br>
                    <input name="sentcomment" type="submit" value="Bình Luận">
                </form>
            </div>
        </div>
    </div>

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <!-- <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div> -->
        <div class="row px-xl-5 ">
            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class=" pr-3">Sản phẩm cùng loại</span></h2>
            <div class="col d-flex justify-content-between">
                <?php
                // sử dụng foreach duyệt qua từng phần tử của mảng($sp_cungloais)
                foreach ($sp_cungloais as $sp_cungloai) {
                    $linksp = "index.php?act=sanphamct&idsp=" . $sp_cungloai['id']; // link đường dẫn
                    $hinh = $img_path . $sp_cungloai['image'];
                    echo '
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="' . $hinh . '" alt="Card image cap">
                                    <div class="card-body">
                                    <a href="' . $linksp . '"><h5 class="card-title">' . $sp_cungloai['name'] . '</h5></a>
                                    <h6>$' . $sp_cungloai['price'] . '</h6>
                                    </div>
                                </div>
                                ';
                }
                ?>
                <!-- <div class="owl-carousel related-carousel">
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Products End -->