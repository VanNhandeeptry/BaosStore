<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <a class="breadcrumb-item text-dark" href="#">Shopping Cart</a>
                <span class="breadcrumb-item active">Bill Detail</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Cart Start -->
<div class="container-fluid">
        <div class="row px-xl-5">
            <!-- <div class="col-lg-12 table-responsive mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cảm ơn quý khách đã đặt hàng</span></h5>
                <p>Đơn hàng đã được xác nhận và đang chờ xử lý. Vui lòng kiểm tra email</p>
            </div> -->
            <?php
                if(isset($bill)&&(is_array($bill))){
                    extract($bill);
                    $pttt=get_pttt($bill['bill_pttt']);
                }
            ?>
            <div class="col-lg-12 table-responsive mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thông tin đơn hàng</span></h5>
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <?php
                        if(isset($bill)&&(is_array($bill))){
                            extract($bill);
                            $pttt=get_pttt($bill['bill_pttt']);
                            echo '
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Tổng giá trị đơn hàng</th>
                                        <th>Phương thức thanh toán</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td class="align-middle">'.$bill['id'].'</td>
                                    <td class="align-middle">'.$bill['ngaydathang'].'</td>
                                    <td class="align-middle">$'.$bill['total'].'</td>
                                    <td class="align-middle">'.$pttt.'</td>
                                </tr>
                            ';
                        }
                    ?>
                </table>
            </div>
            <!-- <div class="col-lg-12 table-responsive mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thông tin người đặt hàng</span></h5>
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <tr>
                        <td>Người đặt hàng:</td>
                        <td><?=$bill['bill_name'];?></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại:</td>
                        <td><?=$bill['bill_tel'];?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?=$bill['bill_email'];?></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ:</td>
                        <td><?=$bill['bill_address'];?></td>
                    </tr>
                </table>
            </div> -->
            <div class="col-lg-12 table-responsive mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Chi tiết đơn hàng </span></h5>
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <?php
                        bill_chitiet($billct);
                    ?>
                </table>
            </div>
            <!-- <div class="col-lg-12">
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
                        <input type="submit" class="btn btn-block btn-success font-weight-bold my-3 py-3" value="Đồng ý đặt hàng" name="dongydathang">
                    </div>
                </div>
            </div> -->
            
        </div>
    
    
</div>

<!-- Cart End -->