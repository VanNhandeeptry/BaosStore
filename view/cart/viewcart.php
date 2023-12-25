<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                <a class="breadcrumb-item text-dark" href="index.php?act=sanpham">Shop</a>
                <span class="breadcrumb-item active">Shopping Cart</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Giỏ hàng của
                    bạn</span></h5>

            <table class="table table-light table-borderless table-hover text-center mb-0">

                <?php
                        viewcart(1);
                    ?>

            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Your
                    Decision</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="pt-2">
                    <?php
                        if(isset($_SESSION['user'])) {
                            echo '
                            <a href="index.php?act=bill"><input type="submit" class="btn btn-block btn-success font-weight-bold my-3 py-3" value="Tiếp tục đặt hàng"></a>
                            <a href="index.php?act=delcart"><input type="button" class="btn btn-block btn-primary font-weight-bold my-3 py-3" value="Xóa giỏ hàng"></a>
                            ';
                        }else{
                            echo'
                            <a href="index.php?act=dangnhap"><input type="submit" class="btn btn-block btn-success font-weight-bold my-3 py-3" value="Đăng nhập"></a>
                            <a href="index.php?act=delcart"><input type="button" class="btn btn-block btn-primary font-weight-bold my-3 py-3" value="Xóa giỏ hàng"></a>
                            ';
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cart End -->