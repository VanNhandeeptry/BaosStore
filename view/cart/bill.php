<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <a class="breadcrumb-item text-dark" href="#">Shopping Cart</a>
                <span class="breadcrumb-item active">Information Bill</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Cart Start -->
<div class="container-fluid">
    <form action="index.php?act=billconfirm" method="post">
        <div class="row px-xl-5">
            <div class="col-lg-6 table-responsive mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thông tin đặt hàng</span></h5>
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <?php
                        if(isset($_SESSION['user'])) {
                            $name = $_SESSION['user']['name'];
                            $tel = $_SESSION['user']['tel'];
                            $email = $_SESSION['user']['email'];
                            $address = $_SESSION['user']['address'];
                        }else{
                            $name = "";
                            $tel = "";
                            $email = "";
                            $address = "";
                        }
                    ?>
                    <tr>
                        <td class="align-middle table-primary border border-primary">Người đặt hàng:</td>
                        <td class="align-middle table-primary border border-primary"><input type="text" name="name" value="<?=$name?>" class="rounded border border-light"></td>
                    </tr>
                    <tr>
                        <td class="align-middle table-primary border border-primary">Số điện thoại:</td>
                        <td class="align-middle table-primary border border-primary"><input type="text" name="tel" value="<?=$tel?>" class="rounded border border-light"></td>
                    </tr>
                    <tr>
                        <td class="align-middle table-primary border border-primary">Email:</td>
                        <td class="align-middle table-primary border border-primary"><input type="text" name="email" value="<?=$email?>" class="rounded border border-light"></td>
                    </tr>
                    <tr>
                        <td class="align-middle table-primary border border-primary">Địa chỉ:</td>
                        <td class="align-middle table-primary border border-primary"><input type="text" name="address" value="<?=$address?>" class="rounded border border-light"></td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-6">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Phương thức thanh toán</span></h5>
                <div class="d-block  bd-highlight mb-3 ">
                    <input type="radio" value="1" name="pttt" checked class="mr-2">Thanh toán khi nhận hàng<br>
                    <input type="radio" value="2" name="pttt" class="mr-2">Chuyển khoản ngân hàng <br>
                    <input type="radio" value="3" name="pttt" class="mr-2">Thanh toán online
                </div>
                <!-- <table class="table table-light table-borderless table-hover text-center mb-0">
                    <tr>
                        <td><input type="radio" value="1" name="pttt" checked>Thanh toán khi nhận hàng</td>
                        <td><input type="radio" value="2" name="pttt">Chuyển khoản ngân hàng</td>
                        <td><input type="radio" value="3" name="pttt">Thanh toán online</td>
                    </tr>
                </table> -->
            </div>
            <div class="col-lg-12 table-responsive mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Giỏ hàng của bạn</span></h5>
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <?php
                        viewcart(0);
                    ?>
                </table>
            </div>
            <div class="col-lg-12">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Your Decision</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="pt-2">
                        <a href="index.php?act=billconfirm"><input type="submit" class="btn btn-block btn-success font-weight-bold my-3 py-3" value="Đồng ý đặt hàng" name="dongydathang"></a>
                        <!-- <a href="index.php?act=delcart"><input type="button" class="btn btn-block btn-primary font-weight-bold my-3 py-3" value="Xóa giỏ hàng"></a> -->
                    </div>
                </div>
            </div>
            
        </div>
    </form>    
</div>

<!-- Cart End -->